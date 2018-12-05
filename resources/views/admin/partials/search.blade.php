<link rel="stylesheet"type="text/css"  href="/css/searchtest.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
   <script>
     $( document ).ready(function() {
      $( "#buscar1" ).click(function() {
        $( "#singleSearch").submit();
        });
      });
   </script>
<!-- SEARCH FORM -->

<div class="search-container container justify-content-center">
        <div class="row">
          <div class="col-12">
            <div class="input-group" id="adv-search">
              <form id="singleSearch" action="{{ route('buscar.recurso') }}" method="get">
              <input id="query" name="query" type="search" class="form-control form-control-navbar" placeholder="Buscar recursos" />
            </form>
                <div class="btn-group" role="group">
                  <div class="dropdown dropdown-lg">
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>  
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <form id="advSearch" action="{{ route('buscar.recursos') }}" method="get">
                        <div class="form-group">
                          <label for="Principal" class="text-dark">Tipo</label>
                          <select class="form-control" id="Principal" name="Principal">
                            <option>Categoria</option>
                            <option>Libro</option>
                            <option>Video</option>
                            <option>Audio</option>
                            <option>CD</option>
                            <option>DVD</option>
                            <option>Hemeroteca</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="autor">Autor</label>
                          <input type="text" class="form-control" id="autor" name="autor" placeholder="Escriba el nombre del autor">
                        </div>
                        <div class="form-group">
                          <label for="titulo">Titulo</label>
                          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escriba el titulo del recurso">
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipo" value="Fisico"> Fisico<br>
                            <input type="radio" name="tipo" value="Digital"> Digital<br>
                            <input type="radio" name="tipo" value=""> Todos
                        </div>
                        <div class="form-group">
                          <label>Incluir recursos no disponibles(?)</label><br>
                          <input type="radio" name="tipo" value="1"> Si<br>
                            <input type="radio" name="tipo" value="0"> No<br>
                        </div>
                        <hr>
                        <div class="form-group text-center">
                          <button type="submit"  id="buscar2" class="btn btn-primary">Buscar</button>
                        </div>
                      </form>                            
                    </div>
                  </div>
                  <div>
                  <button type="submit" id="buscar1" method="post" class="btn btn-primary"><span class="fa fa-search" aria-hidden="true"></span></button>
                </div>
                </div>

            </div>
          </div>
        </div>
  </div>