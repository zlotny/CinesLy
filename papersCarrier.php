<li><span data-toggle="modal" data-target="#idioma"class="glyphicon glyphicon-list-alt"></span></li>

<div id="idioma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Seleccionar idioma</h3>
			</div>
			<div class="modal-body">
				<form action="CambioIdioma.php" method="get">
   					<?php echo $textosc[3]; ?>
    				<select name="idioma" onChange='this.form.submit()'>
    					<option value="ENGLISH">........</option>
   						<option value="ENGLISH">ENGLISH</option>
  						<option value="ESPANHOL">ESPANHOL</option>
    					<option value="GALEGO">GALEGO</option>
    				</select>
				</form>
			</div>
		</div>
	</div>
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