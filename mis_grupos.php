<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="style/style.css" rel="stylesheet" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>
    <body>
     <?php
     include "cabecera.php";
     cabeceraGrupos();
     ?>
     <div class="row top-margin">
      <div class="col-sm-6">
       <div class="panel panel-default">
         <div class="panel-heading">Nuevo Grupo</div>
         <div class="panel-body">


          <form role="form">
            <div class="form-group">
              <label for="nombre_grupo">Nombre del Grupo</label>
              <input type="email" class="form-control" id="nombre_grupo"
              placeholder="Nombre de tu grupo">
            </div>
            <div class="form-group">
              <label for="add_peli">Añadir Película</label>
              
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="buscar_peli" data-toggle="dropdown" aria-expanded="true">
                  Buscar Película
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="buscar_peli">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Peli1</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Peli2</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Peli3</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Peli4</a></li>
                </ul>
              </div>
            </div>
            <div class="form-group">
              <label for="add_sesion">Añadir Sesión</label>
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="buscar_ses" data-toggle="dropdown" aria-expanded="true">
                  Buscar Sesión
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="buscar_ses">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ses1</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ses2</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ses3</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ses4</a></li>
                </ul>
              </div>
            </div>
			<label for="add_amigos">Añadir Amigos</label>
            <div class="form-group scrollable-table">
              <table class="table table-striped">
                <tr ><td>Amigo 1</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Añadir&nbsp;</span></td></tr>
                <tr ><td>Amigo 2</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Añadir&nbsp;</span></td></tr>
                <tr ><td>Amigo 3</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Añadir&nbsp;</span></td></tr>
                <tr ><td>Amigo 4</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Añadir&nbsp;</span></td></tr>
                <tr ><td>Amigo 5</td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Añadir&nbsp;</span></td></tr>
              </table>
            </div>
            <button type="submit" class="btn btn-default pull-right">Crear</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">Grupos</div>
        <div class="panel-body">
         <div class="form-group scrollable-table">

          <table class="table table-striped">
          <tr><td>Nombre</td><td>Nº Integrantes</td><td></td><td></td></tr>
            <tr ><td>Grupo 1</td><td>10</td><td><button type="button" class="btn btn-default btn-mini btn-makesmall"> Ver </button></td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Borrar&nbsp;</span></td></tr>
            <tr ><td>Grupo 2</td><td>14</td><td><button type="button" class="btn btn-default btn-mini btn-makesmall"> Ver </button></td><td><input  class="pull-right" type="checkbox"> <span class="pull-right">Borrar&nbsp;</span></td></tr>

          </table>
        </div>
		<button type="submit" class="btn btn-default pull-right">Validar</button>
      </div>
    </div>
  </div>
</div>

</body>	

<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</html>