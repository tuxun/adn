 <?php
function get_db(){
//St5u7xIuTxvt1ucxduUn W/O tuxun
$PARAM_hote        = 'localhost'; // le chemin vers le serveur
    $PARAM_port        = '3306';
    $PARAM_nom_bd      = 'tuxun'; // le nom de votre base de données
    $PARAM_utilisateur = 'tuxun'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe   = 'tuxun'; // mot de passe de l'utilisateur pour se connecter
   
 $connexion = new PDO('mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
return $connexion;
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    ?>
