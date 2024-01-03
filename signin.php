<?php
	$servername="localhost";
	$user="root";
	$password="";
	$db="oc";

	global$submit;
	if(isset($_POST['submitt']))
	{
		$id=$_POST['idno'];
		$uname=$_POST['uname'];
		$gender=$_POST['gender'];
		$pwd=$_POST['pwd'];
		$cpwd=$_POST['cpwd'];
		$class=$_POST['class'];
		$submit=$_POST['submitt'];
	}

	/*Registration code goes here*/
	$con=new mysqli($servername,$user,$password,$db);
	if($con->connect_error)
		die("connection failed ".$con->connect_error);
	if($con)
	{
		if($submit)
		{
			$sql="insert into users(idno,uname,gender,pwd,class) values('$id','$uname','$gender','$pwd','$class')";
			if($con->query($sql)==TRUE)
				echo '
					<div class="ui tiny modal">
						<i class="green circle close icon"></i>
						<div class="content"><b>Successfully registered....</b></div>
					</div>
				';
			else
				echo '
					<div class="ui tiny modal">
						<i class="red circle close icon"></i>
						<div class="content"><b>SORRY</b></div>
						<div class="content"><p>You are using ID which is already registered</p></div>
					</div>
				';
		}
	}
	/*registration code ends here*/

	/*login code starts here*/
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
				$_SESSION['id']=$id;
				header("location: index.php");
			}
			else
			{
				$error="Username or Password is invalid";
				echo '
					<div class="ui tiny modal">
						<i class="red circle close icon"></i>
						<div class="content"><b>'.$error.'</b></div>
					</div>
				';
			}
		}
	}
	/*login code ends here*/
	$con->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script type="text/javascript" src="./js/semantic.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<meta name="viewport" content="width=device-width, initial-scale">
</head>
<body style="background-image: url(./images/bgg.jpg);background-size: cover;background-repeat: no-repeat;"><br>
	<button class="ui blue circular button" onclick="history.back(-1);"><i class="left arrow icon"></i>Back</button>
	<div class="ui stackable container"><br><br>
		<div class="ui blue raised segment" style="width: 35%;margin-left: 32%;">
			<div class="ui top attached stackable tabular menu">
				<a class="active item" data-tab="first"><h2 class="ui blue header">Login</h2></a>
				<a class="item" data-tab="second"><h2 class="ui blue header">Register</h2></a>
			</div>
			<div class="ui bottom attached active tab segment" data-tab="first">
				<div>
					<form class="ui form" action="signin.php" method="post">
						<div class="ui field">
							<label>Username</label>
							<div class="ui left icon input">
								<i class="user icon"></i>
								<input type="text" name="uname" placeholder="enter Username" required>
							</div>
						</div>
						<div class="ui field">
							<label>Password</label>
							<div class="ui left icon input">
								<i class="lock icon"></i>
								<input type="Password" name="pwd" placeholder="enter Password" required>
							</div>
						</div>
						<div class="ui field">
							<input type="submit" name="submit" value="Login" class="ui blue button" style="margin-left: 40%;">
						</div>
					</form>
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="second">
				<div>
					<form class="ui form" action="signin.php" method="post">
						<div class="ui field">
							<label>Id number</label>
							<input type="text" name="idno" minlength='7' pattern='[B].{5,}[0-9]' maxlength='7' placeholder="enter id no." required>
						</div>
						<div class="ui field">
							<label>Username</label>
							<input type="text" name="uname" placeholder="enter username" required>
						</div>
						<div class="grouped fields">
							<label>Gender</label>
							<div class="ui field" style="margin-left: 10%;">
								<div class="ui radio checkbox">
									<input type="radio" name="gender" value="Male">
									<label>Male</label>
								</div>
							</div>
							<div class="ui field" style="margin-left: 32%;margin-top: -8.3%;">
								<div class="ui radio checkbox">
									<input type="radio" name="gender" value="Female">
									<label>Female</label>
								</div>
							</div>
						</div>
						<div class="ui field">
							<label>Password</label>
							<input type="Password" name="pwd" placeholder="create password" required>
						</div>
						<div class="ui field">
							<label>Confirm password</label>
							<input type="password" name="cpwd" placeholder="confirm password">
						</div>			
						<div class="ui field">
							<label>Class name/no</label>
							<textarea cols="40" rows="3" name="class" placeholder="Class name/no......."></textarea>
						</div>	
						<div class="ui field">
							<input type="submit" name="submitt" value="sign up" class="ui blue button" style="margin-left: 40%;">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script>
	$('.menu .item')
		.tab();
	$('.tiny.modal').modal('show');
</script>
<br><br><br>
</body>
</html>