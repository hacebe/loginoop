<?php
require_once 'core/init.php';

if(Session::exists('success')){
	echo Session::flash('success');
}
if(Session::exists('home')){
	echo Session::flash('home');
}

//echo Session::get(Config::get('session/session_name')); 
$user = new User();
if($user->isLoggedIn()){
?>
	<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->name); ?></a>!</p>

	<ul>
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Change password</a></li>
		<li><a href="logout.php">Log Out</a></li>
	</ul>
<?php

	if($user->hasPermission('admin')){
		echo "<p>You are an administrator!</p>";
	}

}else{
	echo "<p>You need to <a href='login.php'>log in</a> or <a href='register.php'>register</a></p>";
}
