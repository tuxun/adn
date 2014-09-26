<?php
namespace Adeti\RecaptchaBundle\Controller;

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
define("bundlepath",'/var/www/html/lug/symfony2SE/src/Adeti/RecaptchaBundle');

function valid_msg(array $_options,$debug=false )
{
$vstr='';

 if (isset($_options['prt'])) {

$pos = strpos($_options['prt'], 'uv'); // $pos =2
$_action=substr($_options['prt'],$pos+2,1);
$rq=false;
$sql = "UPDATE `c2micka`.`testup` SET `root_nukethis_uid` = \'CONFIRMED\' WHERE `testup`.`root_nukethis_uid` = \'auvd53b48a5e8b8e22.37162694\' LIMIT 1 ;";
switch($_action){

case 'n':
$vstr="suppression par l'utilisateur... il ne reste qu'a delete l'entrée dans la bdd";
$rq="UPDATE `c2micka`.`blog_comments` SET `user_nukethis_uid` = \"NUKED\" WHERE `blogtes`.`user_nukethis_uid` = ? ";

break;

case 'm':
$rq="UPDATE `c2micka`.`blog_comments` SET `user_valide_this` = \"CONFIRMED\" WHERE `blogtes`.`user_valide_this` = ? ";
$vstr="validation utilisateur... l'admin doit encore valider votre message";


break;

case 'a':
$rq="UPDATE `c2micka`.`blog_comments` SET `root_valide_this` = \"CONFIRMED\" WHERE `blogtes`.`root_valide_this` = ? ";
$vstr="validation admin... l'utilisateur doit aussi avoir enregistré son addresse mail ";
break;

case 'd':
$rq="UPDATE `c2micka`.`blog_comments` SET `root_nukethis_uid` = \"NUKED\" WHERE  `blogtes`.`root_nukethis_uid` = ? ";
$vstr="suppression par l'admin... il ne reste qu'a delete l'entrée dans la bdd";
break;

default:

$vstr= "validcode trop vicié";$rq='';
//echo "\"".$_action."\"";
break;



}
if($rq!=''){
if(!isset($connexion))
 $connexion = get_db();
//$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $connexion->beginTransaction();
  $req = $connexion->prepare($rq);
                            $req->bindParam(1, $_options['prt'], PDO::PARAM_STR, 40);
                        if ($req == false) {
//echo "cook error";
                        } else {


                      $resultats = $req->execute(); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  $connexion->commit();
if ($req->rowCount()) {$vstr.="ok";}
else {$vstr.= " <br/>mail deja validé ou bien id invalide";}
}

    /*

http://pad.comptoir.net/p/LUG37le_futur_site_web
http://pad.comptoir.net/p/LUG37chartegraphique10ans

*/
}
return $vstr;
    }
else return ;

}

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




//Mailctr!
}

else
{
//on est inclus dans le site, on gere 
//la validation, et l'envoie
//fait dans annivphp->
//$BlogManager=Adeti\BlogBundle\AdetiBlogBundle::getInstance();

//recup le twig chargé
  //$template_manager=$BlogManager->get_tmpl_manager('contact');
//$msg_manager=MsgManager::get_msgmanager();
$insite=true;//$BlogManager=initBlogManager();
 // $template_manager=$BlogManager->get_tmpl_manager();

if($validation_retour!='')
  { $ret['validation_retour']=$this->render('contact.validation.html', array('result' => $validation_retour));
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
        $captcha = \Securimage::getCaptchaHtml($options) . "<br /><br />
<input type=\"submit\" value=\"Envoyer ou poster ici votre message\" />
</p>
</form>";


		//$ret['ctform']=$_SESSION['ctform'];
		$ret['captcha']=$captcha;
		$ret['stateform']=$stateform;
if(!$insite)
{

/*
if (isset($_GET['add']))
{$ret['form'] .= $this->render('contact.add.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));}

else if (isset($_GET['comment']))
{$ret['form'] .= $this->render('contact.comment.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));}
}
else if (isset($_GET['article']))
{$ret['form'] .= $this->render('contact.article.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));}

if (isset($_GET['mailing']))
{$ret['form'] .= $this->render('contact.add.html', array( 'ctform' => $form['ctform'],'captcha' => $form['captcha'], 'stateform'=>$ret['stateform']));}

if (isset($_GET['message']))
{$ret['form'] .= $this->render('contact.add.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));
*/
}




else
$ret['form'] .= 'rendertwigform';
//$this->render('contact.html', array( 'ctform' => $ret['ctform'],'captcha' => $ret['captcha'], 'stateform'=>$ret['stateform']));

        return $ret;
   } 
    
}
    catch(Exception $e)
    {
    echo 'Erreur : '.$e->getMessage().'<br/>';
    echo 'N° : '.$e->getCode();

    
}
