 <?php
try {
    function process_si_contact_form() {
$retsess=array();
$retsess['ctform']=array();
        $formhtm="";
        $confmessage="";
       $ret=array();
        // re-initialize the form session data
        if(isset($_SERVER)){
	if(@$_SERVER['REQUEST_METHOD']=='POST'&& @$_POST['do']=='contact') {
            // if the form has been submitted
            // echo "post!";// POST
            /*           foreach ($_POST as $key => $value) {
             
            if (!is_array($key)) {
                                // sanitize the input data
                                if ($key != 'ct_message')
                                    $value = strip_tags($value);
                                $_POST[$key] = htmlspecialchars(stripslashes(trim($value)));
                            }
                        }
            
             foreach ($_POST as $key => $value) {
                       
            if (!is_array($key)) {
                                // sanitize the input data
                                $_POST[$key] = utf8_encode($value);
                            }
                        }
                       */

$typemsg=@$_POST['typemsg'];
            $name=@$_POST['ct_name'];
echo "**$name**<br/>\n";
            // name from the form
            $email=@$_POST['ct_email'];
            // email from the form
            $URL=@$_POST['ct_URL'];
            // url from the form
            $message=@$_POST['ct_message'];
            // the message from the form
            $captcha=@$_POST['ct_captcha'];
            // the user's entry for the captcha code
            $name=substr($name,0,64);
            // limit name to 64 characters
            $errors=array();
            // initialize empty error array
            if(strlen($typemsg)<3) {
                // name too short, add error
                                   trigger_error("The use_sqlite_db option is deprecated, use 'use_database' instead", E_USER_NOTICE);$errors['typemsg_error']="choisissez entre poster un commentaire ou nous envoyer un mail ";
            }
            if(strlen($name)<3) {
                // name too short, add error
                $errors['name_error']='Votre nom, ou un pseudo, est nécessaire:'.$name;
            }
            if(strlen($email)==0) {
                // no email address given
                $errors['email_error']='Entrez votre addresse mail:'.$email;
            }
            elseif(!preg_match('/^(?:[\w\d-]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i',$email)) {
                // preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i'
                // invalid email format
                $errors['email_error']='Votre addresse email est invalide:'.$email;
            }
            if(strlen($message)<10) {
                // message length too short
                $errors['message_error']='Votre message doit faire plus de 10 caractères:'.$message;
            }
            // Only try to validate the captcha if the form has no errors
            // This is especially important for ajax calls
            if(sizeof($errors)==0) {
                require_once dirname(__FILE__).'/securimage.php';
                $securimage=new Securimage();  


  if(!$securimage->check($captcha)) {
 $errors['captcha_error']='Le captcha est faux'.$captcha.$securimage->getCode(false,true);
                }
            }
            if(sizeof($errors)==0) {
                // no errors, send the form
                //let's build these mails!
                setlocale(LC_TIME,"fr_FR");
                $time=strftime("%c");
                $time=substr($time,0,-4);
                ///////////////////////////////////////////**************ajout facon blog********************///////////////////////////////:
                if($typemsg=='postcomm') {
                    $_f=$_v=$_uv=$_uf=0;
                    $_v=uniqid('auva',true);
                    $_f=uniqid('auvd',true);
                    $_uv=uniqid('vuvm',true);
                    $_uf=uniqid('vuvn',true);
                    //le message pour l'admin
                    $mailmessage="<p>$time:Nouveau message posté sur ".$_SERVER['HTTP_HOST']." de la part de $name.<br>";
                    $mailmessage.="<a href='http://lug.adeti.org/anniv.php?prt=".$_v."'>autoriser ce message!</a> ";
                    $mailmessage.="<a href='http://lug.adeti.org/anniv.php?prt=".$_f."'>supprimer ce message!</a><br>";
                    $mailmessage.="<pre>".utf8_decode($message)."</pre><br />Autre info:<em>IP Address:</em> ".$_SERVER['REMOTE_ADDR']."<br />"."<em>Browser:</em> ".$_SERVER['HTTP_USER_AGENT']."</p>";
                    $mailmessage=wordwrap($mailmessage,70);
                    //user
                    $umailmessage="<p>$time:Nouveau message posté sur ".$_SERVER['HTTP_HOST']." de votre part ($name).<br>";
                    $umailmessage.="<a href='http://lug.adeti.org/anniv.php?prt=".$_uv."'>valider votre addresse mail</a> ";
                    $umailmessage.="<a href='http://lug.adeti.org/anniv.php?prt=".$_uf."'>vous n'avez pas écrit ce message!</a><br>";
                    $umailmessage.="<pre>".utf8_decode($message)."</pre><br />Merci $name</p>";
                    $umailmessage=wordwrap($umailmessage,70);
                    /* add a validation link or refuse pour 
                     */
                    $PARAM_hote='localhost';
                    // le chemin vers le serveur
                    $PARAM_port='3306';
                    $PARAM_nom_bd='c2micka';
                    // le nom de votre base de données
                    $PARAM_utilisateur='c2micka';
                    // nom d'utilisateur pour se connecter
                    $PARAM_mot_passe='S57ITv1cdU';
                    // mot de passe de l'utilisateur pour se connecter
                    $connexion=new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.";charset=UTF8",$PARAM_utilisateur,$PARAM_mot_passe,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
                    if($connexion==false) {
                        echo "connexion bdd loupé";
                    }
                    else {
                        $req=$connexion->prepare("INSERT INTO `c2micka`.`blog_comments` (`usermail`, `msgpostd`, `userpostr`, `datepost`, `root_nukethis_uid`, `root_valide_this`, `user_nukethis_uid`, `user_valide_this`)
VALUES (?, ?,?,?,?,?,?,?);");
                        if($req==false) {
                            //throw echo "cook failed";
                        }
                        else {
                            //throw info echo "pdo is cooking";
                            $req->bindParam(1,$email,PDO::PARAM_STR,20);
                            $req->bindParam(2,$message,PDO::PARAM_STR,100);
                            $req->bindParam(3,$name,PDO::PARAM_STR,20);
                            $req->bindParam(4,$time,PDO::PARAM_STR,20);
                            $req->bindParam(5,$_f,PDO::PARAM_STR,40);
                            $req->bindParam(6,$_v,PDO::PARAM_STR,40);
                            $req->bindParam(7,$_uf,PDO::PARAM_STR,40);
                            $req->bindParam(8,$_uv,PDO::PARAM_STR,40);
                            // throw DEBUG echo $req->queryString;
                            $resultats=$req->execute();
                            // on va chercher tous les membres de la table qu'on trie par ordre croissant
                            if($resultats==false) {
                                // throw DEBUG $arr = $req->errorInfo();
                                // throw DEBUG print_r($arr);
                                // throw info/error echo "exe failed";
                            }
                        }
                        /*
                        validé le post dans la bdd*/
                        //message de confirmation d'envoi s'affichant sur la page
                        $confmessage="<p>post bien envoyé pour modération à  ".$GLOBALS['ct_recipient']."<br /><br />"."<em>Nom: $name</em><br />";
                        $confmessage.="<em>Email de réponse: $email</em><br />"."<em>Message:</em><br />"."<pre>".utf8_decode($message)."</pre>";
                        $confmessage.=" veuillez valider votre message dans votre boite mail</p>";

                        $confmessage=wordwrap($confmessage,70);
                        if(isset($GLOBALS['DEBUG_MODE'])&&$GLOBALS['DEBUG_MODE']==false) {
                            // dabord la confirm, puis le mail a l'admin
                            $sub="lug.adeti.org: message posté de votre part, $name";
                            if(mail($email,$sub,$umailmessage,"From: {$GLOBALS['ct_recipient']}\r\nReply-To: {$GLOBALS['ct_recipient']}\r\nContent-type: text/html; charset=UTF-8\r\nMIME-Version: 1.0")) 
                                $formhtm.="confirmation Ok:$confmessage<br>";
                            else 
                                $formhtm.="error in msgpost confirm()";;
                            // adm*/
                            $sub="lug.adeti.org: message de $name a modérer";
                            if(mail($GLOBALS['ct_recipient'],$sub,$mailmessage,"From: {$email}\r\nReply-To: {$email}\r\nContent-type: text/html; charset=UTF-8\r\nMIME-Version: 1.0")) {
                                $formhtm .= "envoi du mail a adeti: ok";
                            }
                            else 
                                $formhtm.="error in msgpost()";;
                        }
                    }
                }
                ////////////////////////////////////////////////////////////////////*****************Inscription a un evenement*///////////////////////////////////////
                elseif($typemsg=='eventsign') {
                    $mailmessage="<p>Nouveau commentaire privés sur ".$_SERVER['HTTP_HOST']." de la part de $name.<br>"."<pre>$message</pre><br>Autre info:<em>IP Address:</em>".$_SERVER['REMOTE_ADDR']."<br />"."<em>Browser:</em> ".$_SERVER['HTTP_USER_AGENT']."<br />vous pouvez repondre directement ci dessous</p>";
                    $mailmessage=wordwrap($mailmessage,70);
                    $confmessage="<p>Inscription bien envoyé à  ".$GLOBALS['ct_recipient']."<br /><br />"."<em>Nom: $name</em><br />"."<em>Email de réponse: $email</em><br />"."<em>Message:</em><br />"."<pre>$message</pre>"."<br />vous pouvez recommencer en repondant simplement ci dessous, par exemple si vous avez oublié  de préciser que vous ramenez aussi des chips</p>";
                    $confmessage=wordwrap($confmessage,70);
                    if(isset($GLOBALS['DEBUG_MODE'])&&$GLOBALS['DEBUG_MODE']==false) {
                        // send the message with mail()
                        $formhtm.="<span><p>Vous venez de vous inscrire et d'envoyer à notre mailing list: ".$message."</p></span>";
                        //mail the inscription or log the posts!
                        // /*
                        if(mail($GLOBALS['ct_recipient'],$name." sur ".$_SERVER['HTTP_HOST'].":".$GLOBALS['ct_msg_subject'],$mailmessage,"From: {$email}\r\nReply-To: {$email}\r\nContent-type: text/html; charset=UTF-8\r\nMIME-Version: 1.0")) 
                            $formhtm.="envoi du mail:ok<br>";
                        else 
                            $formhtm.="error in mail()";
                        //envoyer un msg de confirmation
                        if(mail($email,"confirmation d'envoi: ".$GLOBALS['ct_msg_subject'],$confmessage,"From: {$GLOBALS['ct_recipient']}\r\nReply-To: {$GLOBALS['ct_recipient']}\r\nContent-type: text/html; charset=UTF-8\r\nMIME-Version: 1.0")) 
                            $formhtm.="confirmation:ok<br>";
                        else 
                            $formhtm.="error in mailconfirm()";;
                        // */
                    }
                }
                ////////////////////////////////////////////////////////////////////*****************message mailing liste*///////////////////////////////////////
                elseif($typemsg=='lugmsg') {
                    $message=wordwrap($message,70);
                    $mailmessage="<p>Nouveau message privé sur ".$_SERVER['HTTP_HOST']." de la part de $name.<br>"."<pre>$message</pre><br>Autre info:<em>IP Address:</em>".$_SERVER['REMOTE_ADDR']."<br />"."<em>Browser:</em> ".$_SERVER['HTTP_USER_AGENT']."<br /><br />vous pouvez recommencer en repondant simplement ci dessous, par exemple si vous avez oublié  de préciser que vous ramenez aussi des chips</p>";
                    $mailmessage=wordwrap($mailmessage,70);
                    $confmessage="<p>mail bien envoyé à  ".$GLOBALS['ct_recipient']."<br /><br />"."<em>Nom: $name</em><br />"."<em>Email de rÃ©ponse: $email</em><br />"."<em>Message:</em><br />"."<pre>$message</pre>";
                    $confmessage=wordwrap($confmessage,70);
                    if(isset($GLOBALS['DEBUG_MODE'])&&$GLOBALS['DEBUG_MODE']==false) {
                        // send the message with mail()
                        $formhtm.="<span><p>Vous venez de nous envoyer ".$message."</p></span>";
                        //mail the inscription or log the posts!
                        // /*
                        if(mail($GLOBALS['ct_recipient'],$name." sur ".$_SERVER['HTTP_HOST'].":".$GLOBALS['ct_msg_subject'],$mailmessage,"From: {$email}\r\nReply-To: {$email}\r\nContent-type: text/html; charset=UTF-8\r\nMIME-Version: 1.0")) 
                            {$formhtm.="envoi du mail a l'admin:ok<br>";
$ret['ctform']['error']=false;
                // no error with form
                $ret['ctform']['success']=true;
}
                        else 
                            $formhtm.="error in mail()";
                        //envoyer un msg de confirmation
                        if(mail($email,"confirmation d'envoi: ".$GLOBALS['ct_msg_subject'],$confmessage,"From: {$GLOBALS['ct_recipient']}\r\nReply-To: {$GLOBALS['ct_recipient']}\r\nContent-type: text/html; charset=UTF-8\r\nMIME-Version: 1.0")) 
                            $formhtm.="confirmation:ok<br>";
                        else 
                            $formhtm.="error in mailconfirm()";;
                        // */
                    }
                }
                else {
                    echo "msgtype >3 mais pas bon (action non implementé)".$typemsg;$_SESSION['ctform']['error']=true;
                    exit;
                }
                $_SESSION['ctform']['timetosolve']=$securimage->getTimeToSolve();
                $_SESSION['ctform']['error']=false;
                // no error with form
                $_SESSION['ctform']['success']=true;
                // message sent
            }
            else {
                // save the entries, this is to re-populate the form

                $retsess['ctform']['ct_name']=$name;
                // save name from the form submission
                $retsess['ctform']['ct_email']=$email;
                // save email
                $retsess['ctform']['ct_URL']=$URL;
                // save URL
                $retsess['ctform']['ct_message']=$message;
                // save message
                $retsess['typemsg']=$typemsg;
                // save message
                foreach($errors as $key=>$error) {
                    // set up error messages to display with each field
                    $retsess['ctform'][$key]="<span class=\"error\">$error</span>";
$ret['ctform'][$key]=$retsess['ctform'][$key];
//echo "dump doform[ctform][$key] return: ".$ret['ctform'][$key].'<br />';
  
              }
foreach($retsess['ctform'] as $key=>$tr) {
                    // set up error messages to display with each field
                  //    $_SESSION['ctform'][$key]="<span class=\"error\">$error</span>";
$ret['ctform'][$key]=
$tr;
//echo "dump doform[ctform][$key] return: ".$tr.'<br />';
  
              }

                $_ret['ctform']['error']=true;
                // set error floag
            }
//echo var_dump($errors);
        }




}


        $ret['ctform']['success']=false;
        // clear success value after running
        //echo "loaded!";// POST

//$ret['ctform']=$_SESSION['ctform'];
$ret['form']=$formhtm;



        return $ret;
        //.$message
    }
}
catch(\ Exception$e) {
    echo $e->getMessage()." catch out\n";
    error_log($error,3,"../doform.php.log");
}

