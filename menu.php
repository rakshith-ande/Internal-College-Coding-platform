<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/semantic.min.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<style>
		#menu
		{
			background-color: #00695c;
			height: 60px;
		}
		#item
		{
			color: white;
		}
		#item2
		{
			color: white;
		}
		#item:hover
		{
			border-right: 2px solid white;
			border-bottom: 2px solid white;
			font-weight: bold;
		}
		.item3
		{
			color: white;
		}
		.item3:hover
		{
			border-right: 2px solid white;
			border-bottom: 2px solid white;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php
	if(isset($_SESSION['login_user'])==true)
	{
		echo '<div class="ui menu" id="menu">
				<a class="item" id="item" href="index.php">Home&nbsp;<i class="home icon"></i></a>
				<a class="item" id="item" href="practice/">Practice&nbsp;<i class="laptop icon"></i></a>
				<a class="item" id="item" href="forums.php">Forums&nbsp;<i class="comments icon"></i></a>
				<a class="item" id="item" href="about.php">About&nbsp;<i class="circle info icon"></i></a>
				<div class="right menu">
						<a class="item" id="a"><span id="item"><b>'.$_SESSION['login_user'].'<i class="user circle icon"></i></b>||Sign out&nbsp;<i class="sign out icon"></i></span></a>
				</div>
			</div>';
			echo '<div class="ui basic modal" id="aa" style="margin-left: 0%;margin-top: 0%;">
					<div class="content">
						<p align="center" style="font-size: 20px;"><b>Are you sure want to logout...??</b></p>
					</div>
					<div class="actions">
						<div class="ui red basic cancel inverted button">
						<i class="remove icon"></i>
						No
					</div>
					<div class="ui green ok inverted button" onclick="fun()">
						<i class="checkmark icon"></i>
						Yes
						</div>
					</div>
				</div>';
	}
	elseif(isset($_SESSION['login_user'])==false)
	{
		echo '
		<div class="ui menu" id="menu">
			<a class="item" id="item" href="index.php">Home&nbsp;<i class="home icon"></i></a>
			<a class="item" id="item" href="practice/">Practice&nbsp;<i class="laptop icon"></i></a>
			<a class="item" id="item" href="forums.php">Forums&nbsp;<i class="comments icon"></i></a>
			<a class="item" id="item" href="about.php">About&nbsp;<i class="circle info icon"></i></a>
			<div class="right menu">
				<a class="item" id="item" href="signin.php">Sign In&nbsp;<i class="sign in icon"></i></a>
			</div>
		</div>';
	}
?>
<script>
	$('#a').click(function(){
     	$('#aa').modal({
     		blurring: true
			}).modal('show');
     })
	 function fun()
     {
     	location.href="logout.php";
     }
</script>
</body>
</html>