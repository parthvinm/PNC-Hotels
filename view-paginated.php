<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Records</title>

</head>

<body>



<?php

/*

VIEW-PAGINATED.PHP

Displays all data from 'players' table

This is a modified version of view.php that includes pagination

*/



// connect to the database

include('connectdb.php');



// number of results to show per page

$per_page = 3;



// figure out the total pages in the database

$result = mysqli_query($con, "SELECT * FROM members");

$total_results = mysqli_num_rows($result);

$total_pages = ceil($total_results / $per_page);

$row = mysqli_fetch_array( $result )



// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)

if (isset($_GET['page']) && is_numeric($_GET['page']))

{

$show_page = $_GET['page'];



// make sure the $show_page value is valid

if ($show_page > 0 && $show_page <= $total_pages)

{

$start = ($show_page -1) * $per_page;

$end = $start + $per_page;

}

else

{

// error - show first set of results

$start = 0;

$end = $per_page;

}

}

else

{

// if page isn't set, show first set of results

$start = 0;

$end = $per_page;

}



// display pagination



echo "<p><a href='view.php'>View All</a> | <b>View Page:</b> ";

for ($i = 1; $i <= $total_pages; $i++)

{

echo "<a href='view-paginated.php?page=$i'>$i</a> ";

}

echo "</p>";



// display data in table

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Username</th> <th>Email</th> <th>First Name</th> <th>Last Name</th> <th>Age</th> <th>Contact</th> <th>Password</th> <th></th> <th></th></tr>";



// loop through results of database query, displaying them in the table

for ($i = $start; $i < $end; $i++)

{

// make sure that PHP doesn't try to show results that don't exist

if ($i == $total_results) { break; }



// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['username'] . '</td>';

echo '<td>' . $row['email'] . '</td>';

echo '<td>' . $row['firstname'] . '</td>';

echo '<td>' . $row['lastname'] . '</td>';

echo '<td>' . $row['age'] . '</td>';

echo '<td>' . $row['contact'] . '</td>';

echo '<td>' . $row['password'] . '</td>';

echo '<td><a href="edit.php?id=' . $row['username'] . '">Edit</a></td>';

echo '<td><a href="delete.php?id=' . $row['username'] . '">Delete</a></td>';

/*echo '<td>' . mysqli_result($result, $i, "password") . '</td>';

echo '<td>' . mysqli_result($result, $i, "email") . '</td>';

echo '<td>' . mysqli_result($result, $i, "firstname") . '</td>';

echo '<td>' . mysqli_result($result, $i, "lastname") . '</td>';

echo '<td>' . mysqli_result($result, $i, "age") . '</td>';

echo '<td>' . mysqli_result($result, $i, "contact") . '</td>';

echo '<td>' . mysqli_result($result, $i, "password") . '</td>';

echo '<td><a href="edit.php?username=' . mysqli_result($result, $i, "username") . '">Edit</a></td>';

echo '<td><a href="delete.php?username=' . mysqli_result($result, $i, "username") . '">Delete</a></td>';*/

echo "</tr>";

}

// close table>

echo "</table>";



// pagination



?>

<p><a href="new.php">Add a new record</a></p>



</body>

</html>