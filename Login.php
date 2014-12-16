<?php
include "FuncionIdioma.php"
//include "Cabecera.php";
echo "string";

$textos = idioma(1,"ESPANHOL");

?>

<!--table class="formularios"-->
<form name="login" action="Autenticar.php" method="get" onSubmit="return (LogValido(this.login.value) &&  NoVacio(this.pass.value));";>
<tr>
<td><?php echo $textos[1]; ?> :</td><td><input type="text" name="login"><br></td>
</tr>
<tr>
<td><?php echo $textos[2]; ?> :</td><td><input type="password" name="pass"><br></td>
</tr>
<tr>
<td colspan=2><center><input type="submit" name="accion" value="<?php echo $textos[3]; ?>">
<input type="reset" name="accion" value="<?php echo $textos[4]; ?>"></center></td>
</tr>
</form>
<!--/table-->

<?php
include "Pie.php";
?>
