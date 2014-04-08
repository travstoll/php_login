<?php
if ($_SESSION['email']){
	echo "<div id='session' class='gradientV'><h4>Welcome ".$_SESSION['name']."!";
	echo "<br><img src='".$_SESSION['user_picture']."'>";
	echo "<br><a href='session/logout.php'>Logout</a></h4></div>";
}
else
{ 
	echo "You are not logged in";
	die ("<meta http-equiv='refresh' content='2; URL=index.php'>");
}
?>
