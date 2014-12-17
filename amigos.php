<?php include "cabecera.php"; ?>

	<?php
		include_once "modelos/usuario.php"	
	?>
	
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amigos</title>

 
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="style/style.css" rel="stylesheet" />

 
</head>
<body>
  <?php cabeceraPantallaPrincipal(); ?>
  <div class="row top-margin">
  <div class="col-md-3"> </div>
          <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel panel-heading">Mis amigos</div>
					<div class="panel panel-body"> 
						<div class="form-group">
						<table class="table table-striped">
							<tr><td class="col-md-1"><img src="img/default_user.png" width="50px"/></td>
								<td class="col-md-4">Nombre Amigo<br/>Correo Amigo</td>
								<td class="col-md-1"><a href="#" class="btn btn-info">Eliminar</a></td>
							</tr>
							<tr><td class="col-md-1"><img src="img/default_user.png" width="50px"/></td>
								<td class="col-md-4">Nombre Amigo<br/>Correo Amigo</td>
								<td class="col-md-1"><a href="#" class="btn btn-info">Eliminar</a></td>
							</tr>
							<tr><td class="col-md-1"><img src="img/default_user.png" width="50px"/></td>
								<td class="col-md-4">Nombre Amigo<br/>Correo Amigo</td>
								<td class="col-md-1"><a href="#" class="btn btn-info">Eliminar</a></td>
							</tr>
						</table>						
						</div>					
					</div>				
				</div>
		  </div> </div>
          
  <div class="col-md-3"> </div> 
  
  </div>   
      <footer>
     <section class="container" style="padding:10px">
      <div class="btn-group dropup pull-rigth ">
        <button type="button" class="btn btn-default">Idioma</button>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          &nbsp
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
          &nbsp
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Gallego</a></li>
          <li><a href="#">Inglés</a></li>
          <li class="divider"></li>
          <li><a href="#">Español</a></li>
        </ul>
      </div>
    </section>
    </footer>
      
</body>


  
  
  
<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
