<?php
namespace Adeti\BlogBundle;

define("bundlepath",__DIR__.'/');   

use Symfony\Component\HttpFoundation\Response;

#require_once bundlepath.'MailManager.php';
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;


require_once bundlepath.'Resources/config/Blog.conf.php';   


 function get_msg_manager(){
        require_once bundlepath.'Controller/msg.php'; 


    
    $GLOBALS['ct_recipient']   = 'tuxunpro@gmail.com';// 'ca@adeti.org';
    $GLOBALS['ct_msg_subject'] = 'Un message de lug.adeti.org';
 require_once bundlepath."/Controller/doformfunction.php";
   require_once bundlepath."/Controller/formfunction.php";

}


// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/*use YourLibrary\FolderName\ClassName;Bundle
  */ 


class AdetiBlogBundle extends Bundle
{
private static $instance;

private $twig;
private $msg_manager;
public function __construct(){

 error_reporting(E_ALL);
    ini_set('display_errors', 1); // uncomment this line for debugging
    
$this->twig['contact']=self::set_tmpl_manager('contact',$cache=false);
$this->twig['Blog']=self::set_tmpl_manager('Blog',$cache=false);



$this->msg_manager=get_msg_manager();

}/*
public  function getName() {return 'BlogManager';

}
  */ 
public static function getInstance(){
if(!self::$instance)
{
self::$instance=new self();


}
return self::$instance;

}




public  function set_tmpl_manager($dir='',$cache=false){
//require_once 'lib/Twig/Autoloader.php';
\Twig_Autoloader::register();
if ($dir == '')
{$loader = new \Twig_Loader_Filesystem(bundlepath.'templates');$this->twig = new \Twig_Environment($loader, array(
    'cache' => $cache,
));


$escaper = new \Twig_Extension_Escaper('html');
$this->twig->addExtension($escaper);

$this->twig->addExtension(new \Twig_Extension_Debug());
return $this->twig;
}
else {$loader = new \Twig_Loader_Filesystem(bundlepath.'Resources/views/'.$dir);
$this->twig[$dir] = new \Twig_Environment($loader, array(
    'cache' => $cache,
));

$escaper = new \Twig_Extension_Escaper('html');
$this->twig[$dir]->addExtension($escaper);

$this->twig[$dir]->addExtension(new \Twig_Extension_Debug());
return $this->twig[$dir];
}}

public function get_tmpl_manager($context=''){
if ($context!='')
	return $this->twig[$context];
else
return $this->twig;
}
public function get_msg_manager(){
   // include bundlepath.'Blog/Controler/contact.php';       
return $this->msg_manager;
}

private function add_comment(){}
private function validate_thing(){}
private function nuke_thing(){}
private function add_article(){}
private function get_comment(){}
private function get_discussion(){}

}
