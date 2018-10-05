import csv

with open('dep.csv', encoding='latin-1') as csvfile:
     with open("departamentoSeed.txt", mode= "w", encoding='utf-8') as txtfile:
        mun = csv.reader(csvfile, delimiter= ';')
        lines = 0
        for row in csvfile:
            line = row.split(';')
            #line[2]=line[2].rstrip('\n')
            line[1] = line[1].rstrip('\n')
            if lines==0:
                print(f'Nombre de columnas {",".join(line)}')
            else:
               # txtfile.write(f'Municipio::create([\n\t\'dep_id\' => \'{line[2]}\',\n\t\'nMunicipio\' => \'{line[1]}\'\n\t]);\n')
               txtfile.write(f'Departamento::create([\n\t\'id\' => \'{line[1]}\',\n\t\'nDepartamento\' => \'{line[0]}\'\n\t]);\n')

            lines+=1

