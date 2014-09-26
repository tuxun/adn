<?php 
// Report all PHP errors (see changelog)
 #require_once __DIR__.'/../../BlogManager.php';
    $GLOBALS['DEBUG_MODE'] = 0;
    // CHANGE TO 0 TO TURN OFF DEBUG MODE
    // IN DEBUG MODE, ONLY THE CAPTCHA CODE IS VALIDATED, AND NO EMAIL IS SENT

$GLOBALS['twig_cache']=false;
//$GLOBALS['twig_cache']='compilation_cache';
//global dep
/*
function get_tmplmanager(){
require_once 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => $GLOBALS['twig_cache'],
));

$escaper = new Twig_Extension_Escaper('html');
$twig->addExtension($escaper);

$twig->addExtension(new Twig_Extension_Debug());


return $twig;
}*/

//retourne les articles, un article ou bien les parties de site head et foot si param vides

function get_articles($typeorid){
if(!isset($connexion))
 $connexion = get_db();
if ($typeorid=='*')
   { 
//echo "get*article";
$req = "select id,articles_postd, commentable,titre, userpostr, datepost from blog_articles WHERE `blog_articles`.`user_valide_this` = 'CONFIRMED' AND `blog_articles`.`root_valide_this` = 'CONFIRMED' ORDER BY datepost DESC";

$resultats=$connexion->query($req);
         $resultats->setFetchMode(PDO::FETCH_OBJ);return $resultats->fetchAll(); // on dit qu'on veut que le résultat soit
}


else if (ctype_digit($typeorid))
{ 
//echo "getonearticle$typeorid";
$req = "select id,articles_postd, commentable,titre, userpostr, datepost from blog_articles WHERE `blog_articles`.`id` = ? ORDER BY datepost DESC";
//$resultats=$connexion->query($req);
$resultats=$connexion->prepare($req);
$resultats->bindParam(1,$typeorid,PDO::PARAM_STR,2);

$resultats->execute();

 $resultats->setFetchMode(PDO::FETCH_OBJ);
//var_dump($resultats);
//var_dump($r->fetch());
return $resultats->fetchAll(); }


else if ($typeorid=='siteparts'){//echo "getsiteparts";
$req = "select id,articles_postd, commentable,titre, userpostr, datepost from blog_articles WHERE `blog_articles`.`user_valide_this` = 'CONFIRMED' AND `blog_articles`.`root_valide_this` = 'CONFIRMED' AND `blog_articles`.`titre` = 'foot' OR `blog_articles`.`titre` = 'head' ORDER BY datepost DESC";
$resultats=$connexion->query($req);
    $resultats->setFetchMode(PDO::FETCH_OBJ);return $resultats->fetchAll(); }
}




function initBlogManager(){

return Adeti\BlogBundle\AdetiBlogBundle::getInstance();
}





//181:mail!!
class MsgManager{
static function get_msg_manager(){
        require_once "msg.php"; 


    
    $GLOBALS['ct_recipient']   = 'tuxunpro@gmail.com';// 'ca@adeti.org';
    $GLOBALS['ct_msg_subject'] = 'Un message de lug.adeti.org';
       //require_once "Controler/MailController.php";
}



    }
?>
