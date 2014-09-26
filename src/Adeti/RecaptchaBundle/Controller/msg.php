<?php
require_once "db.php";
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


function get_msgs($msgtoget){

if(!isset($connexion))
 $connexion = get_db();
if ($msgtoget=='*')
   { 
    $req = "select * from blog_comments WHERE `blog_comments`.`user_valide_this` = 'CONFIRMED' AND `blog_comments`.`root_valide_this` = 'CONFIRMED' ORDER BY datepost ASC";

$resultats=$connexion->query($req);
         $resultats->setFetchMode(PDO::FETCH_OBJ);return $resultats->fetchAll(); 
}

else if (ctype_digit($msgtoget))
{   $req = "select * from blog_comments WHERE `blog_comments`.`user_valide_this` = 'CONFIRMED' AND `blog_comments`.`root_valide_this` = 'CONFIRMED'  AND `blog_comments`.`index_comments` = '?' OR `blog_comments`.`reponseto` = '?' ORDER BY datepost ASC";
//$resultats=$connexion->query($req);
$resultats=$connexion->prepare($req);
$resultats->bindParam(1,$msgtoget,PDO::PARAM_STR,2);
$resultats->bindParam(2,$msgtoget,PDO::PARAM_STR,2);
$resultats->execute();

 $resultats->setFetchMode(PDO::FETCH_OBJ);
//var_dump($resultats);
//var_dump($r->fetch());
return $resultats->fetchAll(); }






    $resultats = $connexion->query($req); // on va chercher tous les membres de la table qu'on trie par ordre croissant
             
    $resultats->setFetchMode(PDO::FETCH_OBJ); return $resultats->fetchAll();; /*// on dit qu'on veut que le résultat soit récupérable sous forme d'objet
    $i      = 0;
    $retstr = '';
	///////
    while ($ligne = $resultats->fetch()) // on récupère la liste des membres
        {
        $i += 1;
        	
							$retstr .="<p class='scontenu'>". $ligne->datepost . "; " . $ligne->userpostr . " a posté:<br/>" .  $ligne->msgpostd . '<hr />'."</p>"; // on affiche les membres
					      
			}
	/////////////
    $resultats->closeCursor(); // on ferme le curseur des résultats
    if ($i > 0)
		{ return "<h4>Discussion:</h4>".$retstr;
    	}
	 else
		{
        return "Pas encore de commentaires...";
	    }  
	    */
}



?>
