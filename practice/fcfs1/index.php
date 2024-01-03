 <?php
 	$result="";
 	$result1="";
 	$result2="";
	$code="#include <stdio.h>
int main(){
	//Write Your code below
}";
	$result_file="";
	$score=0;
	$flag=0;
	$exp1="";
	$run=0;
	$result_file2="";
	function randomString(){
	$char="abcdefghijklmnopqrstuvwxyz0123456789ABCEDFGHIJKLMNOPQRSTUVWXYZ";
	$len=strlen($char);
	$str="";
	for ($i=0; $i < $len; $i++) { 
		$str .=$char[rand(0,$len-1)];
	}
	return $str;
	}
	$string=randomString();
	include '../../login.php';
 	if(!empty($_SESSION)){
 		if(!empty($_POST)){
 			$run=$run+$_POST["run"];
			putenv("PATH=C:\Program Files (x86)\Dev-Cpp\MinGW64\bin");
			$CC="gcc";
			$code=$_POST["code"];
			$ip="input.txt";
			$ip1="input1.txt";
			$ip2="input2.txt";
			$input=file_get_contents($ip);
			$uid=$_POST["uname"];
			//creating userid exe file
			$out=$uid.$string.".exe";

			$files=fopen("files/".$uid."_max_score.txt","a+");
			//creating file with userid
			$filename_code=$uid.$string.".c";
			$filename_in=$uid."in.txt";
			$error_occured=fopen($uid."error.txt","w+");
			fclose($error_occured);
			$filename_error=$uid."error.txt";
			$executable = $uid.$string.".exe";
			$file_out=$uid.".txt";
			$file_out1=$uid."1.txt";
			$file_out2=$uid."2.txt";
			$command = $CC." -lm ".$filename_code." -o ".$uid.$string.".exe";
			$command_error=$command." 2>".$filename_error;
			$file_code=fopen($filename_code, "w+");
			fwrite($file_code, $code);
			fclose($file_code);
			exec("cals $executable /g everyone:f");
			exec("cals $filename_error /g everyone:f");
			shell_exec($command_error);
			$error=file_get_contents($filename_error);
			if(trim($error)==""){
				$out=$out." <".$ip;
				$result=shell_exec($out);
				$out=$out." <".$ip1;
				$result1=shell_exec($out);
				$out=$out." <".$ip2;
				$result2=shell_exec($out);
				file_put_contents($file_out,$result);
				file_put_contents($file_out1,$result1);
				file_put_contents($file_out2,$result2);
				
				$actfile1 = fopen($uid.".txt", "r") or die("Unable to open file!");
				$act1=fread($actfile1,filesize($uid.".txt"));
				fclose($actfile1);
				$expectfile1 = fopen("output.txt", "r") or die("Unable to open file!");
				$exp1=fread($expectfile1,filesize("output.txt"));
				fclose($expectfile1);

				$actfile2 = fopen($uid."1.txt", "r") or die("Unable to open file!");
				$act2=fread($actfile2,filesize($uid."1.txt"));
				fclose($actfile2);
				$expectfile2 = fopen("output1.txt", "r") or die("Unable to open file!");
				$exp2=fread($expectfile2,filesize("output1.txt"));
				fclose($expectfile2);

				$actfile3 = fopen($uid."2.txt", "r") or die("Unable to open file!");
				$act3=fread($actfile3,filesize($uid."2.txt"));
				fclose($actfile3);
				$expectfile3 = fopen("output2.txt", "r") or die("Unable to open file!");
				$exp3=fread($expectfile3,filesize("output2.txt"));
				fclose($expectfile3);

				$val=strcasecmp($act1, $exp1);
				$val1=strcasecmp($act2, $exp2);
				$val2=strcasecmp($act3, $exp3);

				$score_file=$uid."_score.txt";
				if ($val==0) {
					$flag+=1;
				}
				if($val1==0){
					$flag+=1;
				}
				if ($val2==0) {
					$flag+=1;
				}
				$score=$flag*33;
				if($score==99){
					$score=100;
				}else if ($score==66) {
					$score=64;
				}else if ($score==33) {
					$score=36;
				}
			}else{
				$result=$error;
				file_put_contents($file_out,$result);
			}
			
			exec("del ".$uid.".txt");
			exec("del ".$uid."1.txt");
			exec("del ".$uid."2.txt");
			exec("del ".$uid."error.txt");
			exec("del *.o");
			exec("del *.c");
			exec("del $executable");
		}	
 	}else{
 		header("Location: ../index.php");
 	}
 	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>FCFS</title>
	<link rel="stylesheet" type="text/css" href="../../css/semantic.min.css">
	<title>Contest</title>
	<link rel="stylesheet" type="text/css" href="../../css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../../plugin/codemirror/lib/codemirror.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../plugin/codemirror/theme/eclipse.css">
	<style type="text/css">
		@media only screen and (min-width: 641px){
			#mobmenu{
				display: none;
			}
		}
		@media only screen and (max-width: 640px){
			#deskmenu{
				display: none;
			}
			#mobmenu{
				display: block;
			}
		}
	</style>
</head>
<body class="ui container" style="margin-top: 1%;">
	<a onclick="history.back(-1);"><button class="ui blue button">Back</button></a>
	<a href="../../leaderboard.php"><button class="ui blue button">Leader Board</button></a>
	<div>
		<pre style="background:#f0f0f0;">
		<p style="color: red;">Please Write According to o/p . No Tab Spaces
		<h3>1) First Come First Serve(FCFS)</h3>
			

			Process		Priority		Burstime
			a  			3			4
			b 			1 			5
			c 			0			3
			d 			2 			1

			i/p:
				i) No.of Processess
				ii) for each process process name, priority, bursttime
					a 3 4
			o/p:
				i)process name,complete time,turn around time,waiting time foreach process
			Ex:
			i/p:
				4
				a 3 4
				b 1 5
				c 0 3
				d 2 1
			o/p:
				c 3 3 0
				b 8 8 3
				d 9 9 8
				a 13 13 9
		</pre>
	</div>
	<form method="post">
		<label>Code Editor :</label><br>
		<textarea class="codemirror-textarea" name="code"  id="code" style="border: solid;"><?php echo $code ?></textarea><br><br>
		<input type="hidden" name="uname" value=<?php echo $_SESSION["login_user"];?>>
		<button type="submit" name="submit" class="ui blue button">Run</button><br>
		<label>Actual Output : </label><br><br>
		<input type="hidden" name="run" value=1 >
		<textarea rows="4" cols="100" disabled><?php echo $result ?></textarea><br><br>
		<label>Expected Output : </label><br><br>
		<textarea rows="4" cols="100" disabled><?php echo $exp1 ?></textarea><br><br>
		<label>Score : </label><br><br>
		<?php
			

			if($run>=1){
				$uid=$_SESSION["login_user"];
				$contest="Priority";
				$que="select count(*) from scores where uname='$uid' and contest='$contest' ";
				$s=$con->query($que);
				$count=$s->fetch_assoc();
				//print_r($count['count(*)']);
				if($count['count(*)']==0){
					file_put_contents("files/".$uid."_max_score.txt", $code);
					$sql = "insert into scores(uname,score,contest) values('".$uid."',".$score.",'".$contest."')";
					$r=$con->query($sql);
					$con->close();
				}else{
					$que="select score from scores where uname='$uid' and contest='$contest' ";
					$s=$con->query($que);
					$sc=$s->fetch_assoc();
					if($sc['score']<$score){
						file_put_contents("files/".$uid."_max_score.txt", $code);
						$sql="update scores set score=$score where uname='$uid' and contest='$contest' ";
						$r=$con->query($sql);
						$sql1="update scores set code='".$code."' where uname='$uid' and contest='$contest' ";
						$r1=$con->query($sql1);
						$con->close();
					}
				}
				
				if($score==100){
					echo "<p style='color:green;'>Congrats! All test cases passed</p>";
				}else if($score==64 || $score==36){
					echo "<p style='color:red;'>Some test cases failed.</p>";
				}else{
					echo "<p style='color:red;'>All test cases failed.</p>";
				}
					
				}
				echo "<textarea disabled rows='2' cols='3'>$score</textarea>";
		?>
	</form>
	<script type="text/javascript" src="../../plugin/codemirror/lib/codemirror.js"></script>
	
		
    <script type="text/javascript">
			$(document).ready(function(){
				var code = $(".codemirror-textarea")[0];
				var editor = CodeMirror.fromTextArea(code,{
					lineNumbers : true,
					mode: "text/x-csrc",
					theme:'eclipse'
				});
			});
		</script>
    <script>
		$('#mobmenu').click(function() {
			$('#mobshow').sidebar('show');
		})
	</script>
	<br>
	<br>
</body>
</html>