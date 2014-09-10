 
    //const MEDIAWIKI =true;
    
    /*
    
    
    * action=login (lg) *
    Log in and get the authentication tokens.
    In the event of a successful log-in, a cookie will be attached to your session.
    In the event of a failed log-in, you will not be able to attempt another log-in
    through this method for 5 seconds. This is to prevent password guessing by
    automated password crackers.
    https://www.mediawiki.org/wiki/API:Login
    
    This module only accepts POST requests
    Parameters:
    lgname              - User Name
    lgpassword          - Password
    lgdomain            - Domain (optional)
    lgtoken             - Login token obtained in first request
    Example:
    api.php?action=login&lgname=user&lgpassword=password
    
    * action=logout *
    Log out and clear session data.
    https://www.mediawiki.org/wiki/API:Logout
    Example:
    Log the current user out:
    api.php?action=logout
        
    
    
    
    
    require_once "wiki/includes/exception/MWException.php";
    require_once "wiki/includes/Hooks.php";
    require_once "wiki/includes/WebRequest.php";
    require_once "wiki/includes/GlobalFunctions.php";
    require_once "wiki/includes/profiler/Profiler.php";
    require_once "wiki/includes/profiler/ProfilerStub.php";
    
    //require_once "wiki/includes/utils/MWFunction.php";
    
    
    require_once "wiki/includes/User.php";
    
    
    
    */
    //$user-> setCookies();
    //    $user->load();
    //    $user->setToken(); // init token
    /*        
    if ( isset( $params['options'] ) ) {
    $user->mOptions = $params['options'] + (array)$user->mOptions;
    unset( $params['options'] );
    }
    
    
    
    //$_u=new User();//$_u = User::newFromId( '0' );
    
    if ( !$user->getId() ) 
    {$_id= "notloged";
    }
    else {echo "lgd";
    $_id=$user->idFromName("tuxun");
    }
    */
    //$_u->newFromSession();
    
    //$_u=User::newFromSession();
    





 
    /**
     * Lightweight constructor for an anonymous user.
     * Use the User::newFrom* factory functions for other kinds of users.
     *
     * @see newFromName()
     * @see newFromId()
    
    
    
    
    
    
     $user = new User();
     $webreq=new WebRequest();
    
     $user = User::newFromId( '1' );
     $user ->load();
     $user ->setCookies();
    
    
    
     if ($user->isLoggedIn())
     {echo "_u good,".$_id;$_SESSION['__lgd']=true;}
     else {echo "_u bad,".$_id;$_SESSION['__lgd']=false;}
    
     if ($_SESSION['__lgd']==false) {?>
     <form name="wkf__" action= "wiki/api.php?action=login&lgname=user&lgpassword=password" method="post"> 
     <label id='luguser_'>nom:</label><input type='text' name='luguser_' size='20' value='' />
     <label id='lugpwd_'>pass:</label><input type='text' name='lugpwd_' size='20' value='' />
     <input type="button" value="connexion" onclick="return checkscript()"></form><div id="wikiform"></div>
    
     <?php }
    
     else { echo "connecté";} 
    
     */






