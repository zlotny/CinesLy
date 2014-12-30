<html>
	<head>
		<?php
		include_once "sesion_segura.php";
		
		include_once "cabecera.php";

		?>
		<title>Mi Perfil - CinesLy</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">	
		<link rel="stylesheet" href="js/alertify/themes/alertify.core.css" />
		<link rel="stylesheet" href="js/alertify/themes/alertify.default.css" />
		<link rel="stylesheet" href="style/style.css">
		<script src="js/alertify/lib/alertify.min.js"> </script>
		<script src="js/general.js"> </script>

			



	</head>
	<body>
		<?php

			cabeceraPantallaPrincipal();

			if($_REQUEST["update"] == "bad"){
				echo "<script>alertify.error('Ha ocurrido un error en el cambio de perfil. Comprueba que los campos son correctos. Recuerda que tanto el nombre de usuario como la contraseña deben tener al menos 6 caracteres');</script>";
			}
			if($_REQUEST["update"] == "good"){
				echo "<script>alertify.success('Su perfil se ha actualizado correctamente');</script>";
			}

			$cant_reg = 3; 
			$num_pag = $_GET['pagina']; 
			if ($num_pag<1) { 
				$comienzo = 0; 
				$num_pag = 1; 
			} else { 
				$comienzo = ($num_pag-1)  * $cant_reg; 
			}

		?>
		
		<h1 class="tackle-right"><?php echo $text["h1Perfil"];?> <?php echo $_SESSION['usuario']->nombreUsuario; ?></h1>
		<p class="tackle-right"><?php echo $text["p1Perfil"];?></p>
				
		<div class="col-md-3" >
			<div class="panel panel-default " >
				<div class="panel-heading "><?php echo $text["perfil"];?></div>
				<div class="panel-body">
					<?php
					
						if (isset($_SESSION['usuario']->foto)){
					
					?>
						<img src="<?php echo $_SESSION['usuario']->foto; ?>" onmouseover="src='img/logo_foto.png'"  onmouseout="src='<?php echo $_SESSION['usuario']->foto; ?>'"  height='150px' width='150px' class='center-block img-circle fotoUsr' data-toggle='modal' data-target='#upload'>
					<?php

						}else{
							echo "<img src='img/default_user.png' onmouseover='javascript:this.src='img/yo.jpg';' height='150px' width='150px' class='center-block img-circle fotoUsr' data-toggle='modal' data-target='#upload'>";
						}

					?>
					<!-- Ventana modal #upload -->
					<div id="upload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4>Subir foto de perfil</h4>
								</div>
								<div class="modal-body">									
									<form action="controladoras/subirFoto.php" method="post" enctype="multipart/form-data">
										<label for="file">Sube un archivo:</label>
    									<input type="file" name="archivo" id="archivo">
    									<input type="submit" name="boton" value="Subir">
									</form>
									<div class="clearfix"></div>
								</div>
								<div class="modal-footer"></div>
							</div>
						</div>
					</div>  
					<!-- Fin ventana modal #upload -->

					<h5><?php echo $text["nomUsu"];?></h5>
					<small><?php echo $_SESSION['usuario']->nombreUsuario; ?></small>
					
					<h5><?php echo $text["email"];?></h5>
					<small><?php echo $_SESSION['usuario']->email; ?></small>
					
					<h5><?php echo $text["biografia"];?></h5>
					<form id="bio-form" action="controladoras/actualizaBio.php" method="post">
						<textarea class="form-control eslogan border-radius-publi" name="eslogan" onblur="document.getElementById('bio-form').submit()"><?php echo $_SESSION['usuario']->eslogan; ?></textarea>
					</form>
				</div>

				<div class="panel-footer">
					<input type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modificarPerfil" value="Editar perfil">       
					<div id="modificarPerfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<form id="form-edit-perfil" action="controladoras/actualizarPerfil.php" method="POST">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4><?php echo $text["editarCuenta"];?></h4>
									</div>
									<div class="modal-body">
										<label for="nombreUsuario" class=""><?php echo $text["cambNomUsu"];?></label>
										<input type="text" name="newName" class="form-control form-pers" value="<?php echo $_SESSION['usuario']->nombreUsuario;?>"><br/>      
										<label for="pass1" class=""><?php echo $text["newPass"];?></label>
										<input type="password" name="pass1" class="form-control form-pers" placeholder="Introduzca su nueva contraseña" value="<?php echo $_SESSION['usuario']->pass; ?>"> <br/>
										<label for="pass1" class=""><?php echo $text["repNewPass"];?></label>
										<input type="password" name="pass2" class="form-control form-pers" placeholder="Repita su nueva contraseña" value="<?php echo $_SESSION['usuario']->pass; ?>"> <br/>

										<input type="button" id="eliminar-boton" class="btn btn-danger btn-xs pull-right" value="Eliminar mi cuenta" onclick="eliminarPerfil('<?php echo $_SESSION['usuario']->email; ?>');" ></input>  
										<div class="clearfix"></div>
									</div>
									<div class="modal-footer">
										<input type="submit" name="accion" class="btn btn-success" value="Guardar cambios">
										<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $text["cerrar"];?></button>
									</div>
								</div>
							</div>
						</form>
					</div>  
					<div class="clearfix"></div>
				</div>	
			</div>			
		</div>

		<div class="col-md-5" >
			<div class="panel panel-default" style="text-align:center;" >
				<ul class="media-list">
					<?php 

						$total_registros = $_SESSION['usuario']->numPublicaciones();
						$total_paginas = ceil($total_registros/$cant_reg);
						$publicaciones=$_SESSION['usuario']->paginadorPublicacionesPerfil($comienzo,$cant_reg); 

						while($row = mysql_fetch_array($publicaciones)){
							$usuRow = $row['email'];
							
					?>
					<li class="media" style="margin-top:0px;">
						<div class="well" style="margin-bottom:0px;">
							<form action="controladoras/editarPublicacionPerfil.php?id=<?php echo $row['idPublicacion']; ?>" method="POST">
								<div class="publication-body" >
									<span class="small near-top"><?php echo $row['fecha']; ?></span>
									<textarea name="publi" readonly id= "<?php echo "1".$row['idPublicacion']; ?>" class="form-control publi publicacion-text border-radius-publi"  ><?php echo $row['publica']; ?></textarea>
								</div>
								<div class="clearfix">
									<?php

										if($_SESSION["usuario"]->email == $usuRow){ 

									?>							
									<input type='button' onclick='eliminarPublicacionPerfil(<?php echo $row['idPublicacion']; ?>)' class='btn btn-xs btn-danger pull-right little-right' value='Eliminar'/>
									<input type='button' onclick='mostrar(<?php echo $row['idPublicacion'].",1".$row['idPublicacion'].",editar".$row['idPublicacion']; ?>)' id='<?php echo "editar".$row['idPublicacion']; ?>' class='btn btn-xs btn-primary pull-right little-right' value='Editar'/>
									<input type='submit' onclick='ocultar(<?php echo $row['idPublicacion']; ?>)' style='visibility: hidden;'  id='<?php echo $row['idPublicacion']; ?>' class='btn btn-xs btn-success pull-right' value='Guardar'/>
									<?php 

										} 

									?>
								</div>
							</form>
							<hr style="background-color:#E1E1E1;height:1px;">
						</div>
					</li>
					<?php 
					
						} 

					?>
					<hr style="background-color:#1E1E1E;height:1px;">
				</ul>
				<ul class="pagination">
					<?php

						if( $num_pag > 1){ 

					?>
					<li>
						<a accesskey="a" href="perfil.php?pagina=<?php echo ($num_pag-1) ?>"><?php echo $text["prev"];?></a>	
					</li>
					<?php

						} else { 

					?>
					<li class="disabled" >
						<a href="perfil.php?pagina=<?php echo ($num_pag) ?>"><?php echo $text["prev"];?></a>	
					</li>
					<?php

						}
						if($num_pag<=5){
							for ($i=1; $i<=5; $i++){ 
								if ($num_pag == $i){ 
									?>

									<li class="active">
										<a class="style1"><?php echo $num_pag ?><span class="sr-only">(página actual)</span></a>
									</li> 				
									<?php 
								
								} else { 
									if ($i<=$total_paginas){

									?>
									<li>
										<a href="perfil.php?pagina=<?php echo $i ?>"><?php echo $i; ?></a>
									</li> 
									<?php	

										} else {  

									?>
									<li class="disabled">
										<a><?php echo "&nbsp"; ?></a>
									</li> 											
									<?php 

										}
								} 
							}
						} else {
							for ($i=$num_pag-4; $i<=$num_pag; $i++){ 
								if ($num_pag == $i){ 
									
									?>
									<li class="active">
										<a class="style1"><?php echo $num_pag ?><span class="sr-only">(página actual)</span></a>
									</li> 
									<?php 

								} else { 
									
									?>
									<li>
										<a href="perfil.php?pagina=<?php echo $i ?>"><?php echo $i ?></a>
									</li> 
									<?php
								
								} 
							}

						}
						if(($num_pag+1)<=$total_paginas){

						?>
						<li>
							<a accesskey="s" href="perfil.php?pagina=<?php echo ($num_pag+1) ?>" ><?php echo $text["sig"];?></a>
						</li>
						<?php

						} else { 

						?>

						<li class="disabled" >
							<a href="perfil.php?pagina=<?php echo ($num_pag) ?>"><?php echo $text["sig"];?></a>
						</li>
						<?php
						
						}	
				
						?>	
				</ul>
			</div>
		</div>
		<div class="col-md-4" >
			<div class="events-box">
				<div class="events-box-head">
					<h5><?php echo $text["pel"];?> <span><?php echo $text["top"];?></span></h5>
				</div>
				<div class="scrollable-table-perfilD">
					<ul>
						<?php 

							$topPelis=Pelicula::consultarTopPelis(); $i=1;
							while($row = mysql_fetch_array($topPelis)){
								$valoracion = round($row['valoracion']/$row['cont_valoracion'],2);

						?>
								<li>
									<img src="<?php echo $row['foto']; ?>" style="max-width:110px; height:auto;" alt="" title="">
									<div class="caption" style="cursor:pointer;">
										<div class="text">
											<strong class="date"><?php echo $i; ?></strong>
									 		<strong class="title"><?php echo $row['titulo']."  ( ".$valoracion." )"; ?></strong>
										</div>
									</div>
								</li>
						<?php 

								 $i++; 
							} 

						?>
					</ul>            
				</div>
			</div>
			<div class="events-box">
				<div class="events-box-head">
					<h5><?php echo $text["recomFilm"];?></h5>
				</div>
				<div class="scrollable-table-perfilD">
					<ul>
						<?php 

							$rec=$_SESSION['usuario']->consultarRecomendadas(); 
							for($i=0;$i<sizeof($rec[0]);$i++){
							
						?>
								<li class="xs">
									<img src="<?php echo $rec[1][$i]; ?>" style="max-width:60px; height:auto;" alt="" title="">
									<div class="caption" >
										<div class="text">
											<strong class="datexs"><?php echo $rec[2][$i]; ?></strong>
									 		<strong class="title"> <?php echo $text["recomFrom"];?><?php echo $rec[0][$i]; ?></strong>
										</div>
									</div>
								</li>
						<?php 

							} 

						?>
					</ul>            
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function leftArrowPressed() {
				if(<?php echo $num_pag; ?> > 1) {
					location.replace("perfil.php?pagina=<?php echo ($num_pag-1); ?>");
				}
			}
			function rightArrowPressed() {		
				if((<?php echo $num_pag; ?>+1) <= <?php echo $total_paginas;?>) {
					location.replace("perfil.php?pagina=<?php echo ($num_pag+1); ?>");
				} 	
			}
			document.onkeydown = function(evt) {
				evt = evt || window.event;
				switch (evt.keyCode) {
					case 37:
					leftArrowPressed();
					break;
					case 39:
					rightArrowPressed();
					break;
				}
			};
		</script>

		<?php footer(); ?>

	</body>

	<script src= "js/jquery-2.1.1.min.js"></script>
	<script src= "bootstrap/js/bootstrap.js"></script>

</html>
