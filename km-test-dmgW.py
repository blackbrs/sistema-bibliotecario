"""
Name: BioArcaneBarrage_DamageDealt
Description: Verifies the damage modifications from Bio-Arcane Barrage
Verifies: less damage to non-lane minions, percentile magic damage, deals normal damage to lane minions
"""
from KogMawAbilityTest import KogMawAbilityTest
from Drivers.LOLGame.LOLGameUtils import Enumerations
import KogMawStats

class BioArcaneBarrage_DamageDealt(KogMawAbilityTest):
    def __init__(self, championAbilities):
        super(BioArcaneBarrage_DamageDealt, self).__init__(championAbilities)
        self.ability = 'Bio-Arcane Barrage'
        self.slot = KogMawStats.W_SLOT
        self.details = 'Kog\'Maw deals reduced base-damage to non-minions with additional percentile damage'

        self.playerLocation = Enumerations.SRULocations.MID_LANE
        self.enemyAnnieLocation = Enumerations.SRULocations.MID_LANE.angularOffsetDegrees(45, 200)
        self.enemyMinionLocation = Enumerations.SRULocations.MID_LANE.angularOffsetDegrees(45, 400)

    def setup(self):
        super(BioArcaneBarrage_DamageDealt, self).setup()
        self.enemyAnnie = self.spawnEnemyAnnie(self.enemyAnnieLocation)
        self.enemyMinion = self.spawnEnemyMinion(self.enemyMinionLocation)
        self.teleport(self.player, self.playerLocation)
        self.issueStopCommand(self.player)

    def execute(self):
        self.takeSnapshot('preCast')

        self.castSpellOnTarget(self.player, self.slot, self.player)
        self.champAttackOnce(self.player, self.enemyAnnie)
        self.takeRecentDeathRecapSnap(self.enemyAnnie, "annieRecap")

        self.resetCooldowns(self.player)
        self.castSpellOnTarget(self.player, self.slot, self.player)
        self.champAttackOnce(self.player, self.enemyMinion)
        self.takeSnapshot('minionRecap')

        self.teleport(self.player, Enumerations.SRULocations.ORDER_FOUNTAIN)

    def verify(self):
        annieAutoDamageEvents = self.getDeathRecapEvents(self.player, "Attack", "annieRecap")
        annieAutoDamage = 0
        for event in annieAutoDamageEvents:
            annieAutoDamage += event.PhysicalDamage

        annieSpellDamageEvents = self.getDeathRecapEvents(self.player, "Spell", "annieRecap", scriptName=KogMawStats.W_MAGIC_DAMAGE_SCRIPT_NAME)

        annieSpellDamage = 0
        for event in annieSpellDamageEvents:
            annieSpellDamage = event.MagicDamage

        AD = self.getStat(self.player, "AttackDamageItem")
        expectedPercentile = (KogMawStats.W_AD_DAMAGE_RATIO * AD)/100
        annieTotalHealth = self.getStat(self.enemyAnnie, "MaxHealth")
        expectedPercentileDamage = self.asPostResistDamage(self.enemyAnnie, expectedPercentile * annieTotalHealth, 'MagicResist', snapshot='preCast')

        self.assertInRange(annieSpellDamage, expectedPercentileDamage, expectedPercentileDamage * .1, "{} magic damage dealt. Expected ~{}".format(annieSpellDamage, expectedPercentileDamage))

        expectedPhysicalDamage = self.asPostResistDamage(self.enemyAnnie, KogMawStats.W_NON_MINION_DAMAGE_RATIO * AD, 'Armor', snapshot='preCast')

        self.assertInRange(annieAutoDamage, expectedPhysicalDamage, expectedPhysicalDamage * .1, "{} physical damage dealt. Expected ~{}".format(annieAutoDamage, expectedPhysicalDamage))

        AD = self.getStat(self.player, "AttackDamageItem")
        minionExpectedPhysicalDamage = self.asPostResistDamage(self.enemyMinion, AD, 'Armor', snapshot='preCast')

        expectedPercentile = (KogMawStats.W_AD_DAMAGE_RATIO * AD)/100
        minionTotalHealth = self.getStat(self.enemyMinion, "MaxHealth")
        minionExpectedMagicDamage = self.asPostResistDamage(self.enemyMinion, expectedPercentile * minionTotalHealth, 'MagicResist', snapshot='preCast')

        expectedDamage = minionExpectedMagicDamage + minionExpectedPhysicalDamage
        actualDamage = self.getDamageTaken(self.enemyMinion, 'preCast', 'minionRecap')

        self.assertInRange(actualDamage, expectedDamage, 1, "{} total physical and magic damage dealt. Expected ~{}".format(annieAutoDamage, expectedDamage))

    def teardown(self):
        self.destroy(self.enemyAnnie)
        self.destroy(self.enemyMinion)