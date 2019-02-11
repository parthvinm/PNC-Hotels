<?php 
session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Bookings- Admin</title>
	<link rel="shortcut icon" href="images/logo2.jpg">
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/bootstrap.css" rel="stylesheet" >
	<link href="css/tablesty.css" rel="stylesheet" >
	
	<script>
	function showHint(str) {
	    if (str.length == 0) { 
	document.getElementById("details").innerHTML = "";
	        return;
	    } else {
	        var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	document.getElementById("details").innerHTML = this.responseText;
	            }
	};
	xmlhttp.open("GET", "getbookrecord.php?username=" + str, true);
	xmlhttp.send();
	    }
	}
	</script>

</head>
<body>
	<br>
	<form align="center"> 
	<b>Search Username:</b> <input type="text" onkeyup="showHint(this.value)">
	</form>
	<span id="details"></span>
		<?php
			require('connectdb.php');

			$tbl_name="roomdetail"; // Table name

			mysqli_select_db($con,"pnc")or die("cannot select DB");
			$sql="SELECT * FROM $tbl_name ";
			$result=mysqli_query($con,$sql) or trigger_error(mysql_error.$sql);
			$count = mysqli_num_rows($result);
			// $row=mysqli_fetch_array($result);
			echo "<div class='table-users'>";
			echo"<div class='header'>User Bookings</div>";
			echo "<table cellspacing='0'>
			<tr>
			<th>Username</th>
			<th>Check-In Date</th>
			<th>Check-Out Date</th>
			<th>Room type</th>
			<th>Number of rooms</th>
			<th>Amount</th><th></th> <th></th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			{
			echo "<tr>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['checkin_date'] . "</td>";
			echo "<td>" . $row['checkout_date'] . "</td>";
			echo "<td>" . $row['room_type'] . "</td>";
			echo "<td>" . $row['no_of_room'] . "</td>";
			echo "<td>" . $row['amount'] . "</td>";
			echo '<td><a href="adupdate.php?username=' . $row['username'] . '">Edit</a></td>';
			echo '<td><a href="addelete.php?username=' . $row['username'] . '">Delete</a></td>';
			echo "</tr>";
			}
			echo "</table></div>";

		?>
<p><br><center><a href="home.php" class="button">Back to Home</a></center></p>
</body>
</html>