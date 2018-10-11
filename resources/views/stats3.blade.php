
@extends('layouts.app')
@section('header')

<link rel="stylesheet" href="css/mapa.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/fh-3.1.4/r-2.2.2/sc-1.5.0/datatables.min.css"/>
<style>
@import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');

h2{float:left; width:100%; color:#fff; margin-bottom:40px; font-size: 14px; position:relartive; z-index:3; margin-top:30px}
h2 span{font-family: 'Libre Baskerville', serif; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px; font-weight:700}
h2 a{color:#fff; font-weight:bold;}

body{background: rgb(246,248,249);  /* fallback for old browsers */
background: -webkit-linear-gradient(top, rgba(246,248,249,1) 0%,rgba(229,235,238,1) 50%,rgba(215,222,227,1) 51%,rgba(245,247,249,1) 100%);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, rgba(246,248,249,1) 0%,rgba(229,235,238,1) 50%,rgba(215,222,227,1) 51%,rgba(245,247,249,1) 100%); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.head{float:left;width:100%;}
.search-box{width:90%; margin:0 auto 40px; box-shadow:10px 13px 0 rgba(0,0,0,0.2);}
.listing-block{background:#fff; padding-top:20px; overflow-y:scroll;}
.slimScrollDiv{width:41%!important;}
.media {background:#fff; position:relative; margin-bottom:15px;}
.media img{width:200px;margin:0; height:136px;}
.media-body{border:1px solid #bcbcbc; border-left:0; height:136px;}
.media .price{float:left; width:100%; font-size:30px;font-weight:600; color:#4765AB;}
.media .stats{float:left; width:100%; margin-top:10px;}
.media .stats span{float:left; margin-right:10px; font-size:15px;}
.media .stats span i{margin-right:7px; color:#4765AB;}


</style>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/fh-3.1.4/r-2.2.2/sc-1.5.0/datatables.min.js" defer></script>
<script type="text/javascript" src={{ asset('js/ammap.js') }}></script>
<script type="text/javascript" src={{ asset('js/ElSalvador.js') }}></script>
<script type="text/javascript" src={{ asset('js/mapa.js') }}></script>
@endsection
@section('content')
<section class="head">
    <h2 class="text-center"><span>Panel de estadisticas</span></h2>
</section>
<div class="clearfix"></div>
<section class="search-box">
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-5 listing-block">
    <div class="panel-body">
        <table id='users' class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th >Nombres</th>
                    <th>Apellidos</th>
                    <th>telefono</th>
                    <th>e-mail</th>
                    <th>municipio</th>   
                </tr>
            </thead>
        </table>
    </div>

		</div>
		<div id="map" class="col-md-7 map-box mx-0 px-0"></div>
	</div>
</div>
</section>
@endsection