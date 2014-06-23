<?php 

$dbc = new PDO('mysql:host=127.0.0.1;dbname=national_parks_db', 'Andrew', 'letmein');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";


//$stmt = $dbc->query('SELECT name, location, date_established, area_in_acres FROM National_Parks');

$stmt = $dbc->query('SELECT * FROM National_Parks');

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
// while ($row = $stmt->fetch()) {
//     // echo "<p> {$row['name']}</p>";
// }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Title_of_Page</title>
</head>
<body>
	<table>
		<tr>
			<th>Name</th>
			<th>Location</th>
			<th>Date Established</th>
			<th>Area in Acres</th>
		</tr>

		<tr>
			<? while ($row = $stmt->fetch()) : ?>
			<td><?= $row['name'] ?></td>
			<td><?= $row['location'] ?></td>
			<td><?= $row['date_established'] ?></td>
			<td><?= $row['area_in_acres'] ?></td>
		</tr>
		<? endwhile ?>


	</table>
</body>
</html>