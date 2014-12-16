
 <?php
// CambioIdioma.php
// Esta pagina es invocada por los enlaces de cambio de idioma
// Trae el idioma nuevo a poner en la aplicacion en la variable $idioma

// Recogemos la variable de idioma
$idioma = $_REQUEST['idioma'];

// iniciamos la sesiÃ³n
session_start();
// Sustituimos la variable de sesion de idioma por el nuevo valor
$_SESSION['idioma'] = $idioma;

// obtenemos el nombre de la pagina que llamo a esta 
// guardamos en $salto el string con el nombre de la pagina desde el ultimo /
$salto = strrchr($_SERVER['HTTP_REFERER'],'/');
// eliminamos el / del nombre de la pagina
$salto = str_replace('/','',$salto);

// invocamos la pagina desde donde se llamo a esta
header("location: ".$salto." "); 

?> 