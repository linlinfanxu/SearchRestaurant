<?php
	$conn = new mysqli('localhost', 'phpuser', 'password', 'myDb');
	$sqlstr = "INSERT INTO restaurants (RestaurantName, Cuisine, Meal, Price, Neighbourhood, OnlineBooking, URL) values ('";
	$sqlstr = $sqlstr . $_POST[RestaurantName] . "', '" . $_POST[Cuisine] . "', '" . $_POST[Meal] . "', '" . $_POST[Price] . "', '" .$_POST[Neighbourhood] . "', '" . $_POST[OnlineBooking] . "', '" . $_POST["URL"] . "');";
	$res = $conn -> query($sqlstr);
	mysqli_close($conn);
	header("Location: index.html");
?>
