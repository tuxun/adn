<?php

namespace Adeti\BlogBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Adeti\BlogBundle\Entity\Article;
class BlogController extends Controller
{
/**
 * @Route("/discussions", defaults={"id" = "tous"},name="blog_home")
 * @Route("/discussions/{id}", defaults={"id" = "tous"},name="blog_article")
 */
    public function discussionsAction($id)
    {
if($id=='tous')
{$comments=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Commentaire')->findAll();


}
else {
$comments=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Commentaire')
				   ->find($id)
//->getArticle()
;

 $comments =  $this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Commentaire')
                  ->findOneBy( array( 'idArticle' => $id ) );
}
 if (!$article) {
        throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
    }

else {
$head=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Article')
                  ->findOneBy( array( 'titre' => 'HEAD' ) )
					->getArticle();

$foot=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Article')
                  ->findOneBy( array( 'titre' => 'FOOT' ) )
					->getArticle();

return  $this->render('AdetiBlogBundle:Blog:publiez.html.twig',array('comments' => $comments,
'form' => '','head'=>$head,'foot'=>$foot,));
} 
   }




/**
 * @Route("/", defaults={"id" = "tous"},name="blog_home")
 * @Route("/blog", defaults={"id" = "tous"},name="blog_home")
 * @Route("/blog/articles", defaults={"id" = "tous"},name="blog_home")
 * @Route("/blog/articles/{id}", defaults={"id" = "tous"},name="blog_article")
 */
    public function articlesAction($id)
    {
if($id=='tous')
{$article=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Article')->findAll();
$comments=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Commentaire')->findAll();
}
else {
$article=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Article')
				   ->find($id);
 $comments =  $this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Commentaire')
                  ->findOneBy( array( 'idArticle' => $id ) );
}
 if (!$article) {
        throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
    }

else {
$head=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Article')
                  ->findOneBy( array( 'titre' => 'HEAD' ) )
					->getArticle();

$foot=$this->getDoctrine()
                   ->getRepository('AdetiBlogBundle:Article')
                  ->findOneBy( array( 'titre' => 'FOOT' ) )
					->getArticle();

return  $this->render('AdetiBlogBundle:Blog:publiez.html.twig',array('comments' => $comments,
'form' => '','articles'=>  $article ,'head'=>$head,'foot'=>$foot,));
} 
   }
}
