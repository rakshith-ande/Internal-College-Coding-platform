<?php
	include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>FORUM</title>
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
</head>
<body><br>
	<div class="ui container">
		<div>
			<header class="ui blue raised centered segment header">D i s c u s s i o n s</header>
		</div>
		<div class="ui raised segment" style="width: 90%;margin-left: 5%;">
			<?php
				$con=new mysqli("localhost","root","","oc");
				$comment="";
				$user="";
				if(isset($_POST['submit']))
				{
					$comment=$_POST['comment'];
					$user=$_SESSION['login_user'];
					$sql="insert into forum(user,comments) values('$user','$comment')";
					$con->query($sql);
					$comment="";
				}
				$sql1="select * from forum";
				$result=$con->query($sql1);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{
						echo "<div class='ui raised segment'><b>".$row['user'].":__></b><br>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['comments']."<br>"."<p><span><div onclick='fun1()'><small>delete</small></div>&nbsp;&nbsp;&nbsp;<div onclick='fun2()' style='margin-top:-4.3%;margin-left:5%;'><small>reply</small></div></span></p>"."</div>";
					}
				}
			?>
		</div>
		<script>
			function fun1()
			{
				$('#a').click(function(){
					$('#aa').modal({
						blurring: true
					}).modal('show');
				})
				function fun()
				{
					location.href="logout.php";
				}
			}
		</script>
		<div class="ui raised segment" style="width: 40%;margin-left: 5%;">
			<form method="post" class="ui form">
				<div class="ui field">
					<label>Comments or Questions :--</label>
				</div>
				<div class="ui field">
					<textarea cols="50" rows="5" placeholder="comments or questions" name="comment" required></textarea>
				</div>
				<?php
					if(isset($_SESSION['login_user'])==true)
					{
						echo '
								<div class="ui field">
									<input type="submit" name="submit" value="submit" class="ui blue button" style="margin-left: 30%;">
								</div>
							';
					}
				?>
			</form>
		</div>
	</div>
	<br><br>
</body>
</html>