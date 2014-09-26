<?php

namespace Adeti\RecaptchaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
require_once dirname(__FILE__) ."/securimage.php";
require_once dirname(__FILE__) ."/doformfunction.php";

require_once dirname(__FILE__) ."/formfunction.php";

class CaptchaController extends Controller
{
  
 public function codeAction()
    {
$str=form();

return  $this->render('AdetiRecaptchaBundle:Captcha:code.html.twig',array('form' =>$str['captcha']));
} 




}
