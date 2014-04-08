<? session_start();
require_once('login/inc/facebook-php-sdk-master/src/facebook.php');

$config = array();
$config['appId'] = '';							//your app id 
$config['secret'] = '';		//your app secret 

$facebook = new Facebook($config);

$user_id = $facebook->getUser();

$params = array(
  'scope' => 'email',
  'redirect_uri' => 'http://dev.thestoll.com/fb/php_login/app/'			//set the root of the app folder here for the facebook callback
);
//$loginUrl = $facebook->getLoginUrl($params);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FB Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/site.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>



    <div class="container">
	<? include "inc/nav.php"; ?>    
    
    <div class="hero-unit">

<?
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['name'];
		$user_picture = 'http://graph.facebook.com/'.$user_profile['username'].'/picture';
		echo "<img src='".$user_picture."'>";
		echo $user_profile['email'];
		echo $user_profile['username'];	
		echo $user_profile['id'];
		
		//*************************Session Info***********************
		
		$_SESSION['name']=$user_profile['name'];
		$_SESSION['username']=$user_profile['username'];
		$_SESSION['user_picture']=$user_picture;
		$_SESSION['email']=$user_profile['email'];
		$_SESSION['uid']=$user_profile['id'];
		
		
		//*************************Session Info***********************
		
		
		//*************************Log Info***********************
		include "inc/db_con.php";
		
		$fb_id = $user_profile['id'];
		$fb_username = $user_profile['username'];
		$fb_email = $user_profile['email'];
		$fb_name = $user_profile['name'];
		$fb_pic = $user_picture;
		
		$find_user = mysql_query("select * from users where fb_id = '$fb_id'");
		$rows = mysql_num_rows($find_user);
		
		echo "<br>".$rows;
		
		if($rows > 0){
		}
		else{
			$create_user = mysql_query("
			INSERT INTO users (fb_id, fb_username, fb_email, fb_name, fb_pic)
			VALUES ('$fb_id', '$fb_username', '$fb_email', '$fb_name', '$fb_pic')
			");
		}
		//*************************Log Info***********************
		
		//*************************Redirect***********************
		echo "<script type='text/javascript'> window.location = 'user_home.php'</script> ";
		//*************************Redirect***********************
		
		

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl($params); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl($params);
      //echo 'Please <a href="' . $login_url . '">login.</a>';
	echo "<center>Please Login<br><br></center>";
	echo "<center><a href='".$login_url."'><img src='../img/851558_153968161448238_508278025_n.png' width='500px'></a></center>";
    }

  ?>
  
  	</div><!--/hero-->
  
  	<? include "inc/footer.php"; ?>
    
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  

</body>
</html>