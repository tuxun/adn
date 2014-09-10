<?php


try {
/*
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://///////////////////////////////////////////////////////////////////////////////////////////////////////
//:::::|||||=====::::::::|||||=====|||||:::::|||||=====::::::
//:::::|||||=====::::::::|||||=====|||||:::::|||||::::====:::
//:::::|||||=====::::::::|||||=====|||||:::::|||||:::::====::
//:::::|||||:::::::::::::|||||:::::|||||:::::|||||=:::====:::
//:::::|||||:::::::::::::|||||:::::|||||:::::|||||\\|||::::::
//:::::|||||===::::::::::|||||:::::|||||:::::|||||:\\\\\:::::
//:::::|||||===::::::::::|||||:::::|||||:::::|||||::\\\\\::::
//:::::|||||:::::::::::::|||||=====|||||:::::|||||:::\\\\\:::
//:::::|||||:::::::::::::|||||=====|||||:::::|||||::::\\\\\::
//:::::|||||:::::::::::::|||||=====|||||:::::|||||:::::\\\\\:
    ///:::::::::::::::::::::::::::::::::::::::::::::::::::://////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

function form(){
 $insite=false;
$validation_retour='';
$validation_retour=valid_msg($_GET);

$ret=array();   $ret['validation_retour'] = process_si_contact_form();
//$ret['validation_retour']=$validation_retour;
//print_r($ret);
$ret['form']='';
$ret['ctform']=array();
$ret['captcha']='';

 if (!empty($_SESSION['ctform']['captcha_error'])) {
            // error html to show in captcha output
            $ret['error_html']  = $_SESSION['ctform']['captcha_error'];
            $ret['code_length'] = (int) 3;
$ret['ctform']['success']=false;
        }else        
 $ret['ctform']['success']=false;




 if(!isset($GLOBALS['siteadetiglobal']))
     {
     $GLOBALS['siteadetiglobal']=true;
     $insite=false;

define("bundlepath",'/var/www/lug');

require_once bundlepath."Blog/Manager/BlogManager.php";       
//on la recup
$BlogManager=BlogManager::getInstance();

//recup le twig chargé
  $template_manager=$BlogManager->get_tmpl_manager('contact');

  //recup le captcha chargé et form
$msg_manager=$BlogManager->get_msg_manager();

//Mailctr!
}

else
{
//on est inclus dans le site, on gere 
//la validation, et l'envoie
//fait dans annivphp->
$BlogManager=Adeti\BlogBundle\AdetiBlogBundle::getInstance();

//recup le twig chargé
  $template_manager=$BlogManager->get_tmpl_manager('contact');
//$msg_manager=MsgManager::get_msgmanager();
$insite=true;//$BlogManager=initBlogManager();
 // $template_manager=$BlogManager->get_tmpl_manager();

if($validation_retour!='')
  { $ret['validation_retour']=$template_manager->render('contact.validation.html', array('result' => $validation_retour));
}



  // $ret = process_si_contact_form(); // Process the form, if it was submitted
//$ret['form'].=$ret1['form'];$ret['ctform']=$ret1['ctform'];;






}



             $stateform = '-1';
        if (isset($_SESSION['ctform']['error']) && $_SESSION['ctform']['error'] == true): /* The last form submission had 1 or more errors */ 
            $stateform = 1;
        elseif (isset($_SESSION['ctform']['success']) && $_SESSION['ctform']['success'] == true): /* form was processed successfully */ 
            $stateform = 0;

        endif;
        

        
       
        // show captcha HTML using Securimage::getCaptchaHtml()
        require_once bundlepath."/Controller/securimage.php";
        $options                 = array();
        $options['input_name']   = 'ct_captcha'; // change name of input element for form post
        $options['image_attributes']['width']  = 600;
             $options['image_attrs']['line_color'] = '#FFFF00';
     $options['image_attrs']['noise_color'] = '#FFFF00';
        $options['use_wordlist'] = true;

        if (!empty($_SESSION['ctform']['captcha_error'])) {
            // error html to show in captcha output
            $ret['error_html']  = $_SESSION['ctform']['captcha_error'];
            $ret['code_length'] = (int) 3;             $stateform = '-1';
        }else $_SESSION['ctform']='ok';
            $stateform = 1;
        $captcha = Securimage::getCaptchaHtml($options) . "<br /><br />
<input type=\"submit\" value=\"Envoyer ou poster ici votre message\" />
</p>
</form>";


		//$ret['ctform']=$_SESSION['ctform'];
		$ret['captcha']=$captcha;
		$ret['stateform']=$stateform;
if(!$insite)
{


if (isset($_GET['add']))
{$ret['form'] .= $template_manager->render('contact.add.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));}

else if (isset($_GET['comment']))
{$ret['form'] .= $template_manager->render('contact.comment.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));}
}
else if (isset($_GET['article']))
{$ret['form'] .= $template_manager->render('contact.article.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));}

if (isset($_GET['mailing']))
{$ret['form'] .= $template_manager->render('contact.add.html', array( 'ctform' => $form['ctform'],'captcha' => $form['captcha'], 'stateform'=>$ret['stateform']));}

if (isset($_GET['message']))
{$ret['form'] .= $template_manager->render('contact.add.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));}




else
$ret['form'] .= $template_manager->render('contact.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));

  

        
        return $ret;
    }
    
}
    catch(Exception $e)
    {
    echo 'Erreur : '.$e->getMessage().'<br/>';
    echo 'N° : '.$e->getCode();

    
}
