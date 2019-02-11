<html>

<head>

<title>View Records</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/tablesty.css">

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
xmlhttp.open("GET", "getrecord.php?username=" + str, true);
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
	<span id="details" ></span>
<?php

/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database

include('connectdb.php');



// get results from database

$result = mysqli_query($con, "SELECT * FROM members")

or die(mysqli_error($con));



// display data in table

// echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";


echo "<div class='table-users'>";
echo"<div class='header'>Users</div>";
echo "<table cellspacing='0'>";

echo "<tr> <th>Username</th> <th>Email</th> <th>First Name</th> <th>Last Name</th> <th>Age</th> <th>Contact</th> <th>Password</th> <th></th> <th></th></tr>";


// loop through results of database query, displaying them in the table

while($row = mysqli_fetch_assoc( $result )) {



// echo out the contents of each row into a table


echo "<tr>";



echo '<td>' . $row['username'] . '</td>';

echo '<td>' . $row['email'] . '</td>';

echo '<td>' . $row['firstname'] . '</td>';

echo '<td>' . $row['lastname'] . '</td>';

echo '<td>' . $row['age'] . '</td>';

echo '<td>' . $row['contact'] . '</td>';

echo '<td>' . $row['password'] . '</td>';

echo '<td><a href="edit.php?username=' . $row['username'] . '">Edit</a></td>';

echo '<td><a href="delete.php?username=' . $row['username'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table></div>";

?>

 <p><br><center><a href="home.php" class="button">Back to Home</a></center></p>

</body>

</html>