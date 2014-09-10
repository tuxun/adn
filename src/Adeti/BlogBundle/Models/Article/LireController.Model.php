<?php

//namespace Adeti\BlogBundle\Models\Lire;
use Adeti\BlogBundle\Article\Controllers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;


class LireController extends Controller{
function __construct()
{
\Twig_Autoloader::register();
//$BlogManager=initBlogManager();
$loader = new \Twig_Loader_Filesystem('sf2/src/Adeti/BlogBundle/Resources/views/');
$this->tmpl = new \Twig_Environment($loader, array(
    'cache' => $GLOBALS['twig_cache'],
));
$escaper = new \Twig_Extension_Escaper('html');
$this->tmpl->addExtension($escaper);

$this->tmpl->addExtension(new \Twig_Extension_Debug());
           $form = form();




$this->siteparts=get_articles('siteparts');


       //return new Response($this->tmpl->render('menu.html.twig', array("active_page" => "archive")));
     //


//   return new Response($this->tmpl->render('Article/liretout.html.twig', array('siteparts'=>get_articles('siteparts') ,'comments' => get_msgs('*'),'articles'=>$articles)));


$this->footer=$this->tmpl->render("Blog/commons/footer.html.twig",array( 'siteparts'=> $this->siteparts));
$this->header=$this->tmpl->render("Blog/commons/header.html.twig",array('siteparts'=> $this->siteparts));





return $this;
/*$this->get('session')->getFlashBag()->add(
            'notice',
            'Your changes were saved!'
        );  
*/
}
function Lire($article)
{

$this->header.=$this->render->render("menu.html.twig",array("active_page" => "archive") );
$this->content=$this->header.$this->render('AdetiBlogBundle:Article:liretout.html.twig',array(
	 'comments' => get_msgs('*'),'articles'=>  get_articles($article))).$this->footer;


return $this->content;

}
function Liretout()
{

$this->header.=$this->render("Blog/commons/menu.html.twig",array("active_page" => "blog_liretout") );
$this->header.=$this->tmpl->render("Blog/menu.html.twig",array("active_page" => "archive") );
$this->content=$this->header.$this->tmpl->render('Article/liretout.html.twig',array(
	 'comments' => get_msgs('*'),'articles'=>  get_articles('*'))).$this->footer;


return $this->content;

}
protected $content;

 public function render($templateName, array $parameters = array(),Symfony\Component\HttpFoundation\Response $response = NULL)
  {
      // ....
      // do stuff to render your template
      // we have the HTML output in the $templateOutput variable
      // ...

      $finder     = new Symfony\Component\Finder\Finder();
      $templates  = array();
$templateOutput="";
//$loader = new \Twig_Loader_Filesystem('sf2/src/Adeti/BlogBundle/Resources/views/');
      foreach ($finder->in('sf2/src/Adeti/BlogBundle/Resources/views') as $file) {
          if (!$file->isDir()) {
              $templates[$file->getRelativePathName()] = $file->getContents();
          }
      }

      $loader = new Twig_Loader_Array($templates);
        $loader->setTemplate('__MAIN__', $templateOutput);

      $twig = new Twig_Environment($loader, array(
          'autoescape' => false,
      ));
$this->twig=$twig;
      try {
          return $this->twig->render($templateName);
      } catch (Twig_Error_Loader $e) {
          return $this->twig->render("__MAIN__");
      }
  }

}

