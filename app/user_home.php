<? include "session/session.php"; ?>


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
	<? include "session/session_info.php"; ?>
	
    <div class="well">
    	test user homepage, successfully logged in with FB.
    </div>
    
    
	<? include "inc/footer.php"; ?>
    
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>
