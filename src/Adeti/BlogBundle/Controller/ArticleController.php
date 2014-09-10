<?php

namespace Adeti\BlogBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Adeti\BlogBundle\Article\Models;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
try {
class ArticleController extends Controller
{
//chaque controleur a son tmpl?
protected $tmpl;
public function __construct ()
{//echo "articlectrl const";


$this->siteparts=get_articles('siteparts');


       //return new Response($this->tmpl->render('menu.html.twig', array("active_page" => "archive")));
     //


//   return new Response($this->tmpl->render('Article/liretout.html.twig', array('siteparts'=>get_articles('siteparts') ,'comments' => get_msgs('*'),'articles'=>$articles)));
/*

$this->footer=$this->render("Blog/commons/footer.html.twig",array( 'siteparts'=> $this->siteparts));
$this->header=$this->render("Blog/commons/header.html.twig",array('siteparts'=> $this->siteparts));
*/





}
 public function validerAction($token)
    {
//session_start();
$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();
    $form = form();
    $articles=get_articles();

 return $this->render('AdetiBlogBundle:Blog:validation.html.twig', array('siteparts'=>get_articles('siteparts') ,'form' => $form, 'comments' => get_msgs('*'), 'articles'=>$articles,'validation'=> $form['validation_retour']));
    }  



  public function commenterAction($article_a_commenter)
{
$BlogManager=initBlogManager();
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
$msg_manager=$BlogManager->get_msg_manager();



    $form = form();
    $articles=get_articles($article_a_commenter);
//var_dump($articles);
 return $this->render('AdetiBlogBundle:Article:commentez.html.twig', array('siteparts'=>get_articles('siteparts') , 'form' => $form,'comments' => get_msgs('*'), 'articles'=>$articles,'validation'=> $form['validation_retour']));


}
public function commenterQuoiAction()
{
$BlogManager=initBlogManager();
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
$msg_manager=$BlogManager->get_msg_manager();



    $form = form();
    $articles=get_articles('*');
//var_dump($articles);
 return $this->render('AdetiBlogBundle:Article:commentezQuoi.html.twig', array('siteparts'=>get_articles('siteparts') , 'form' => $form,'comments' => get_msgs('*'), 'articles'=>$articles,'validation'=> $form['validation_retour']));


}
  public function publierAction()
    {$name='';//{% include  "AdetiBlogBundle:Blog:contactform.html.twig" %}
/*
$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();
*/
    $form = form();
    $articles=get_articles('site_parts');
/*
$this->render("AdetiBlogBundle:Blog:commons/footer.html.twig",array( 'siteparts'=> $this->siteparts));
$this->render("AdetiBlogBundle:Blog:commons/header.html.twig",array('siteparts'=> $this->siteparts));


$this->render("AdetiBlogBundle:Blog:commons/menu.html.twig",array("active_page" => "archive") );
*/

//$twig->loadTemplate('template.twig')->display(array('template' => $template));

return  $this->render('AdetiBlogBundle:Article:publiez.html.twig',array('comments' => get_msgs('*'),'form' => $form,'articles'=>  get_articles('*'),'siteparts'=>get_articles('site_parts'),));


    }
#testtemplate:ok
public function liretoutAction()
    {

return $this->Liretout();
}




public function lireAction($article)
    {//print_r($this->get('twig'));
return new Response($this->Lire($article));
    }
function Lire($article)
{


$this->content=$this->render('AdetiBlogBundle:Article:liretout.html.twig',array(
	 'comments' => get_msgs('*'),'articles'=>  get_articles($article)));


return $this->content->get();

}
function Liretout()
{

//$this->header.=$this->render("AdetiBlogBundle:Blog:commons/menu.html.twig",array("active_page" => "blog_liretout") );
//$this->header.=$this->render("Blog/menu.html.twig",array("active_page" => "archive") );
//$this->content=$this->header.$this->render('AdetiBlogBundle:Article:liretout.html.twig',array(
	// 'comments' => get_msgs('*'),'articles'=>  get_articles('*'))).$this->footer;
return $this->render('AdetiBlogBundle:Article:liretout.html.twig',array(
	 'comments' => get_msgs('*'),'articles'=>  get_articles('*')));

return $this->content;

}
protected $content;
protected $footer;
protected $header;
protected $siteparts;
protected $articles;
protected $article;

}}
    catch(Exception $e)
    {
    echo 'Erreur : '.$e->getMessage().'<br/>';
    echo 'N° : '.$e->getCode();

    
}
?>
