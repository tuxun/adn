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
use Symfony\Component\HttpFoundation\Response;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

try {
class BlogController extends Controller
{
public function menuAction(){



//require_once bundlepath.'../../../vendor/twig/twig/lib/Twig/Autoloader.php';
\Twig_Autoloader::register();

$loader = new \Twig_Loader_Filesystem('sf2/src/Adeti/BlogBundle/Resources/views/Blog');
$template_manager = new \Twig_Environment($loader, array(
    'cache' => $GLOBALS['twig_cache'],
));
$escaper = new \Twig_Extension_Escaper('html');
$template_manager->addExtension($escaper);

$template_manager->addExtension(new \Twig_Extension_Debug());
//return $template_manager->render('AdetiBlogBundle:Blog:menu.html.twig', array("active_page" => "archive"));

        return new Response($template_manager->render('menu.html.twig', array("active_page" => "archive")));
//})->bind('archive');
/*



$app = initBlogManager();
$this->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/templates'
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->get('/', function() use ($app){
    return $app['twig']->render('layout.twig');
})->bind('index');

$app->get('/blog', function() use ($app){
    return $app['twig']->render('blog.twig');
})->bind('blog');

$app->get('/archive', function() use ($app){
    return $app['twig']->render('AdetiBlogBundle:Blog:menu.html.twig', array("active_page" => "archive"));
})->bind('archive');

return $app;
*/







}
 public function accueilAction()
    {
//session_start();
$BlogManager=initBlogManager();

//recup le twig chargé
   $template_manager=$BlogManager->get_tmpl_manager('Blog');
  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();

//    return $this->redirect($this->generateUrl('homepage'));
        return new Response('<html><body>Hello '.$name.'!</body></html>');
/*
$response = $this->forward('AcmeHelloBundle:Hello:fancy', array(
        'name'  => $name,
        'color' => 'green',
    ));


$content = $this->renderView(
    'AcmeHelloBundle:Hello:index.html.twig',
    array('name' => $name)
);

return new Response($content);
$this->get('session')->getFlashBag()->add(
            'notice',
            'Your changes were saved!'
        );

{% for flashMessage in app.session.flashbag.get('notice') %}
    <div class="flash-notice">
        {{ flashMessage }}
    </div>
{% endfor %}
*/

// create a simple Response with a 200 status code (the default)
$response = new Response('Hello '.$name, Response::HTTP_OK);

// create a JSON-response with a 200 status code
$response = new Response(json_encode(array('name' => $name)));
$response->headers->set('Content-Type', 'application/json');


 $request->isXmlHttpRequest(); // is it an Ajax request?

    $request->getPreferredLanguage(array('en', 'fr'));

    $request->query->get('page'); // get a $_GET parameter

    $request->request->get('page'); // get a $_POST parameter
$d = $response->headers->makeDisposition(
    ResponseHeaderBag::DISPOSITION_ATTACHMENT,
    'foo.pdf'
);

$response->headers->set('Content-Disposition', $d);






//<h4>Venez découvrir le monde du logiciel libre à ADETI!</h4>
    $articles=get_articles('*');
        $form = form();
//echo var_dump($form['validation_retour']);



//affiche le template avec:
//$form=captcha
//$disq=getcomment??,
//$art=getarticle
//$validation_ret=si une validation a été tenté...;

 return $this->render('AdetiBlogBundle:Blog:index.html.twig', array('siteparts'=>get_articles('siteparts'),'form' => $form,'comments' => get_msgs('*'), 'articles'=>$articles,'validation'=> $form['validation_retour']));
    }  

public function formtestAction(Request $request)
    {
        // crée une tâche et lui donne quelques données par défaut pour cet exemple
        $defaultData = array(
'article' => 'tapez votre article ici',
'titre' => "titre de l'article",
'posteur'=>'Votre nom ou pseudo',
'posteur_email'=>'Votre nom ou pseudo',


);
    $form = $this->createFormBuilder($defaultData)
        ->add('posteur', 'text' ,array('constraints' => array(
           new NotBlank(),
           new Length(array('min' => 3)),
       ),))
		->add('titre', 'text' ,array('constraints' => array(
           new NotBlank(),
           new Length(array('min' => 3)),
       ),))
        ->add('posteur_email', 'email', array(
       'constraints' => array(
           new NotBlank(),
           new Length(array('min' => 3)),
       ),))
        ->add('article', 'textarea', array(
       'constraints' => array(
           new NotBlank(),
           new Length(array('min' => 3)),
       ),))
            ->add('save', 'submit')
        ->getForm();


 $form->handleRequest($request);

    if ($form->isValid()) {
        // fait quelque chose comme sauvegarder la tâche dans la bdd
echo "goodform";
       // return $this->redirect($this->generateUrl('task_success'));
        return $this->render('AdetiBlogBundle:Blog:test.html.twig', array(
            'form' => $form->createView(),
        )); 
}else

{echo "wrongform";
        return $this->render('AdetiBlogBundle:Blog:test.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}

public function adminAction()
    {
        return $this->render('AdetiBlogBundle:Blog:header.html.twig', array('siteparts'=>get_articles('siteparts'),));
    }


  public function indexNameAction($name)
    {
        return $this->render('AdetiBlogBundle:Blog:header.html.twig', array('siteparts'=>get_articles('siteparts'),));
    }
}}
    catch(Exception $e)
    {
    echo 'Erreur : '.$e->getMessage().'<br/>';
    echo 'N° : '.$e->getCode();

    
}
?>
