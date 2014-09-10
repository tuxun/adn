<?php

namespace Adeti\BlogBundle\Controller;





use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;
use Adeti\TaskBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

try {
class DiscuterController extends Controller
{
 public function validerAction($token)
    {
//session_start();
$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();

 return $this->render('AdetiBlogBundle:Blog:validation.html.twig', array('siteparts'=>get_articles('siteparts') ,'form' => $form, 'comments' => get_msgs(), 'articles'=>$articles,'validation'=> $form['validation_retour']));
    }  



  public function repondreAction($a_ce_commentaire)
{$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();
    $form = form();
    $articles=get_articles('site_parts');

        return $this->render('AdetiBlogBundle:Discuter:repondre.html.twig', array('siteparts'=>get_articles('siteparts') ,'form' => $form, 'comments' => get_msgs($a_ce_commentaire), 'articles'=>$articles,'validation'=> $form['validation_retour']));

}
 public function repondreaQuoiAction()
{$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();
    $form = form();
    $articles=get_articles('site_parts');

        return $this->render('AdetiBlogBundle:Discuter:repondreQuoi.html.twig', array('siteparts'=>get_articles('siteparts') ,'form' => $form, 'comments' => get_msgs('*'), 'articles'=>$articles,'validation'=> $form['validation_retour']));

}
  public function parlerAction()
    {$name='';
$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();
    $form = form();
    $articles=get_articles('site_parts');

        return $this->render('AdetiBlogBundle:Discuter:parler.html.twig', array('siteparts'=>get_articles('siteparts') ,'form' => $form,'comments' => get_msgs('*'),  'articles'=>$articles));
    }


public function voirtousAction()
    {
$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();
    $form = form();
   // $articles=get_articles('site_parts');

  return $this->render('AdetiBlogBundle:Discuter:voirtous.html.twig', array('siteparts'=>get_articles('siteparts') ,'comments' => get_msgs('*')));
   }

  
}}
    catch(Exception $e)
    {
    echo 'Erreur : '.$e->getMessage().'<br/>';
    echo 'N° : '.$e->getCode();

    
}
?>
