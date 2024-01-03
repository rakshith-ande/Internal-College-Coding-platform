<!DOCTYPE html>
<html>
<head>
	<title>Leader board</title>
	<link rel="stylesheet" type="text/css" href="../../css/semantic.min.css">
	<style>
		tr:nth-child(even){background-color: #d4e2f6};
	</style>
</head>
<body><br><br>
	<div class="ui container">
		<a onclick="history.back(-1);"><button class="ui blue button">Back</button></a>
		<div class="ui blue raised segment center aligned header">Leader Borad</div>
		<?php
			$host="localhost:3306";
			$user="root";
			$passwd="";
			$db="oc";
			$count=0;
			$con=mysqli_connect($host,$user,$passwd,$db);
			if($con){
				$sql="select * from scores_mock1 where contest='Sum Prog' order by score desc";
				$r=$con->query($sql);
				echo "<table class='ui table'>
					<th>S.No</th>
					<th>ID NO.</th>
					<th>Score</th>
					<th>Program Name</th>
					<th>Date.</th>
				";
				while ($row=$r->fetch_array()) {
					echo "<tr>
							<td>".++$count."</td>
							<td>".$row[0]."</td>
							<td>".$row[1]."</td>
							<td>".$row[2]."</td>
							<td>".$row[3]."</td>
						<tr>";
				}
				echo "</table>";
				echo "</div>";
			}
		?>
	</div>
</body>
</html>
