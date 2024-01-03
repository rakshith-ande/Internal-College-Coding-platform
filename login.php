<?php
	session_start();
	$error='';
	if(isset($_POST['submit']))
	{
		if(empty($_POST['uname'])||empty($_POST['pwd']))
		{
			$error="Username or Password is invalid";
			echo '
				<div class="ui tiny modal">
					<i class="red circle close icon"></i>
					<div class="content"><b>'.$error.'</b></div>
				</div>
			';
		}
		else
		{
			$username=$_POST['uname'];
			$password=$_POST['pwd'];
			$con=new mysqli("localhost","root","","oc");
			$sql="select * from users where uname='".$username."' and pwd='".$password."'";
			$result=$con->query($sql);
			$rows=mysqli_num_rows($result);
			if($rows==1)
			{
				$_SESSION['login_user']=$username;
				header("location: index.html");
			}
			else
			{
				echo '
				<div class="ui tiny modal">
					<i class="red circle close icon"></i>
					<div class="content"><b>'.$error.'</b></div>
				</div>
			';
			}
		}
	}
?>