<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Compiler</title>
	<meta name="author" content="Rakshith_Ande22">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/semantic.min.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<style>
		/*image slider code*/
		.slide
		{
			width: %;
			margin-left: 3%;
			height: 500px;
		}
		.carousel{
            background: #2f4357;
            margin-top: 20px;
        }
        .carousel-item{
            text-align: center;
            background-size: contain;
            min-height: 0px; 
        }
        /*image slider code ends*/
		/*menu code*/
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
		/*menu code ends*/
	</style>
</head>
<body>
	<?php
		if(isset($_SESSION['login_user'])==true)
		{
			echo '<div class="ui stackable menu" id="menu">
					<a class="item" id="item" href="index.php">Home&nbsp;<i class="home icon"></i></a>
					<a class="item" id="item" href="practice/">Practice&nbsp;<i class="laptop icon"></i></a>
					<a class="item" id="item" href="forums.php">Forums&nbsp;<i class="comments icon"></i></a>
					<a class="item" id="item" href="about.php">About&nbsp;<i class="circle info icon"></i></a>
					<div class="right menu">
							<a class="item" id="a"><span id="item"><b>'.$_SESSION['login_user'].'<i class="circle user icon"></i></b>||Sign out&nbsp;<i class="sign out icon"></i></span></a>
					</div>
				</div>';
				echo '<div class="ui basic modal" id="aa" style="margin-left: 10%;margin-top: 15%;">
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
			<div class="ui stackable menu" id="menu">
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
	<!--Image slider starts here-->
	<div class="ui stackable grid">
		<div class="eleven wide column">
			<div class="slide">
			    <div id="myCarousel" class="carousel slide" data-ride="carousel">
			        <!-- Carousel indicators -->
			        <ol class="carousel-indicators">
			            <li></li>
			            <li></li>
			            <li></li>
			            <li></li>
			        </ol>
			        <!-- Wrapper for carousel items -->
			        <div class="carousel-inner">
			            <div class="carousel-item active">
			                <img src="./images/1.jpg" width="1100" height="500" alt="First Slide">
			            </div>
			            <div class="carousel-item">
			                <img src="./images/2.jpg" width="1100" height="500" alt="Second Slide">
			            </div>
			            <div class="carousel-item">
			                <img src="./images/3.jpg" width="1100" height="500" alt="Third Slide">
			            </div>
			            <div class="carousel-item">
			                <img src="./images/cc2.jpg" width="1100" height="500" alt="Third Slide">
			            </div>
			        </div>
			        <!-- Carousel controls -->
			        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
			            <span class="carousel-control-prev-icon"></span>
			        </a>
			        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
			            <span class="carousel-control-next-icon"></span>
			        </a>
			    </div>
			</div>
			<!--Image slider ends here-->
		</div>
		<div class="four wide column" style="margin-left: 2%;margin-top: 2%;">
			<!--Update code starts here-->
			<div class="ui red ribbon label">U p d a t e s</div>
			<div class="ui menu">
				<marquee direction="up" scrollamount="3" onmouseout="this.start()" onmouseover="this.stop()">
					<div class="ui raised segment">
						<a href="practice/"><i class="hand point right icon"></i>FCFS</a>
					</div>
					<div class="ui raised segment">
						<a href="practice/"><i class="hand point right icon"></i>SJF</a>
					</div>
					<div class="ui raised segment">
						<a href="practice/"><i class="hand point right icon"></i>Round Robin</a>
					</div>
					<div class="ui raised segment">
						<a href="practice/"><i class="hand point right icon"></i>Best Fit</a>
					</div>
					<div class="ui raised segment">
						<a href="practice/"><i class="hand point right icon"></i>Bankers algorithm</a>
					</div>
				</marquee>
			</div>
		</div>
		<!--Update code ends here-->
	</div>

	<!--footer--><br><br>
	<div class="ui stackable grid" style="background-color: #00695c;">
		<div class="three wided middle floated column">
			<h5 id="item2" style="text-align: center;"><span style="text-align: center;">&copy;<span style="margin-left: 10px;">Rakshith</span></span></h5>
			<div class="ui sitemap" style="background-color: #00695c;text-align: center;border-collapse: collapse;color: white;">
				<a class="browse item">
					<b>Site map</b>
				<i class="dropdown icon"></i>
				</a>
				<div class="ui fluid popup bottom left transition hidden">
					<div class="ui two column relaxed divided grid">
						<div class="column">
							<div class="ui link list">
								<a class="item" href="index.php" style="text-decoration:none;">Home</a>
								<a class="item" href="about.html" style="text-decoration:none;">About</a>
							</div>
						</div>
						<div class="column">
							<div class="ui link list">
								<a class="item" href="code.php" style="text-decoration:none;">Code</a>
								<a class="item" href="forums.html" style="text-decoration:none;">Forums</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="five wided right floated column">
			<h4 class="ui header">
			<i class="marker icon" id="item2"><span style="margin-left: 20px;" id="item2">Address</span></i>
			</h4>
			<h6 id="item2">RGUKT Basar</h6>
			<h6 id="item2">Basar Mdl</h6>
			<h6 id="item2">Nirmal Dist</h6>
			<h6 id="item2">Pin: 504 107</h6>
			<button class="ui facebook circular icon button" title="facebook">
				<i class="facebook icon"></i>
			</button>
			<button class="ui circular google plus icon button" title="google">
				<i class="google plus icon"></i>
			</button>
			<button class="ui twitter circular icon button" title="twitter">
				<i class="twitter icon"></i>
			</button>
			<button class="ui blue github circular icon button" title="github">
				<i class="github icon"></i>
			</button>
			<button class="ui linkedin circular icon button" title="linkedin">
				<i class="linkedin icon"></i>
			</button>
		</div>
	</div>

<script type="text/javascript">
         $('.carousel').carousel({ 
         	interval: 3000
         });
         $('#dd select').dropdown({
         	on: 'hover'
         });
         

         $('#a').click(function(){
         	$('#aa').modal({
         		blurring: true
  			}).modal('show');
         })
         function fun()
         {
         	location.href="logout.php";
         }
         //site map hover
        $('.sitemap .browse')
		  .popup({
		    inline     : true,
		    hoverable  : true,
		    position   : 'bottom left',
		    delay: {
		      show: 300,
		      hide: 300
		    }
		  })
		;
</script>
</body>
</html>