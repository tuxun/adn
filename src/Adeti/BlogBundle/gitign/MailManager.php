<?php
namespace  Adeti\MailManager;
/* Notez que le nom de la constante est entre guillemets. Cet exemple vérifie
 * si la chaîne 'TEST' est le nom de la constante nommée TEST */
if (!defined('bundlepath')) {
define("bundlepath",__DIR__.'/'); 
}  
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
try {
 
   
   

//181:mail!!
class AdetiMailManager extends Controller{
static function get_msg_manager(){
        require_once bundlepath.'Controller/msg.php'; 


    
    $GLOBALS['ct_recipient']   = 'tuxunpro@gmail.com';// 'ca@adeti.org';
    $GLOBALS['ct_msg_subject'] = 'Un message de lug.adeti.org';
 require_once bundlepath."/../CaptchaBundle/Controller/doformfunction.php";
   require_once bundlepath."/../CaptchaBundle/Controller/formfunction.php";

}

    } 


}
    catch(Exception $e)
    {
    echo 'Erreur : '.$e->getMessage().'<br/>';
    echo 'N° : '.$e->getCode();

    
}?>
