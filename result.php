<!DOCTYPE html>
<html>
<head>
	<meta content="en-us" http-equiv="Content-Language" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>COMP301 Group Project(Result)</title>
	<meta content="Group Project, COMP301" name="keywords" />
	<meta content="Group Project, COMP301" name="description" />
	<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="allPage">
		<header>
			<img alt="Centennial logo" height="209" src="images/CC50thAnniversary.jpg" width="200" />
			<h1>COMP301 Group Project - Restaurants in Toronto (Result)</h1>
		</header>
		<table style="width: 100%" id="resultTable">
			<tr>
				<td class="tableTitle">Restaurant Name</td>
				<td class="tableTitle">Cuisine</td>
				<td class="tableTitle">Meal</td>
				<td class="tableTitle">Price</td>
				<td class="tableTitle">Neighbourhood</td>
				<td class="tableTitle">Online Booking</td>
			</tr>
			<?php
				$conn = new mysqli('localhost', 'phpuser', 'password', 'myDb');
				$sqlstr = "select RestaurantName, Cuisine, Meal, Price, Neighbourhood, OnlineBooking, URL from restaurants where 1 = 1 ";
				if ($_POST[RestaurantName] != '') {
					$sqlstr = $sqlstr . "and RestaurantName='" . $_POST[RestaurantName] . "'";
				}
                                if ($_POST[Cuisine] !='') {
					$sqlstr = $sqlstr . "and Cuisine='" . $_POST[Cuisine] . "'";
				}
				if ($_POST[Meal] != '') {
					$sqlstr = $sqlstr . "and Meal='" . $_POST[Meal] . "'";
				}
				if ($_POST[Price] !='') {
					$sqlstr = $sqlstr . "and Price='" . $_POST[Price] . "'";
				}
				if ($_POST[Neighbourhood]) {
					$sqlstr = $sqlstr . "and Neighbourhood='" . $_POST[Neighbourhood] . "'";
				}
				if ($_POST[OnlineBooking] != '') {
					$sqlstr = $sqlstr . "and OnlineBooking='" . $_POST[OnlineBooking] . "'";
				}
				$sqlstr = $sqlstr . ";";
				$res = $conn -> query($sqlstr);
				while ($row = $res -> fetch_assoc())
				{
					echo "<tr>\n";
					echo "<td><a target=\"_blank\" href=\"" . $row['URL'] . "\">" . $row['RestaurantName'] . "</a></td>\n";
					echo "<td>" . $row['Cuisine'] . "</td>\n";
					echo "<td>" . $row['Meal'] . "</td>\n";
					echo "<td>" . $row['Price'] . "</td>\n";
					echo "<td>" . $row['Neighbourhood'] . "</td>\n";
					echo "<td>" . $row['OnlineBooking'] . "</td>\n";
					echo "</tr>\n";
				}
				$res -> close();
				mysqli_close($conn);
			?>
		</table>
	</div>
</body>
</html>

