<?php

namespace Adeti\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
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

 return $this->render('AdetiBlogBundle:Blog:validation.html.twig', array('form' => $form, 'comments' => $form['disq'], 'articles'=>$articles,'validation'=> $form['validation_retour']));
    }  



  public function repondreAction($article_a_commenter)
{
        return $this->render('AdetiBlogBundle:Discutez:repondre.html.twig', array('name' => $name));

}
  public function parlerAction()
    {$name='';
        return $this->render('AdetiBlogBundle:Discutez:parler.html.twig', array('name' => $name));
    }


public function voirAction()
    {$name='';
        return $this->render('AdetiBlogBundle:Discutez:voir.html.twig', array('name' => $name));
    }

 

}}
    catch(Exception $e)
    {
    echo 'Erreur : '.$e->getMessage().'<br/>';
    echo 'N° : '.$e->getCode();

    
}
?>
