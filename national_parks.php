<?php 

function getOffset () {
	if (isset ($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	return ($page - 1) * 4;
}

$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'Andrew', 'letmein');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = 'SELECT * FROM National_Parks LIMIT 4 OFFSET ' . getOffset();
$parks = $dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);

$count = $dbc->query('SELECT count(*) FROM National_Parks')->fetchColumn();

$numPages = ceil($count / 4);

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$nextPage = $page + 1;
$prevPage = $page - 1;


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>National_Parks</title>
</head>
<body>
	<table>
		<tr>
			<th>Name</th>
			<th>Location</th>
			<th>Date Established</th>
			<th>Area in Acres</th>
			<th>Description</th>
		</tr>
		<? foreach ($parks as $park) : ?>
			<tr>
				<td><?= $park['name'] ?></td>
				<td><?= $park['location'] ?></td>
				<td><?= $park['date_established'] ?></td>
				<td><?= $park['area_in_acres'] ?></td>
				<td><?= $park['description'] ?></td>
			</tr>
		<? endforeach; ?>
	</table>
    <?php if ($page > 1): ?>
        <a href="?page=<?= $prevPage; ?>">&larr; Previous</a>
    <?php endif; ?>
    
    <?php if ($page < $numPages): ?>
    	<a href="?page=<?= $nextPage; ?>">Next &rarr;</a>
    <?php endif; ?>

    <form method="POST">
            <p>
                <label for="name">Park Name</label>
                <input id="park_name" name="park_name" type="text">
          	</p>
        	<p>
                <label for="location">Location</label>
                <input id="location" name="location" type="text">
           	</p>
           	<p>
                <label for="date_established">Date Established</label>
                <input id="date_established" name="date_established" type="text">
            </p>
            <p>    
                <label for="area_in_acres">Area in Acres</label>
                <input id="area_in_acres" name="area_in_acres" type="text">
            <p>
            </p>
            <p>    
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="25" cols="55" placeholder="write brief description of the park"></textarea>
            </p>
            <p>
                <input type="submit" value="Submit Park">
            </p>
        </form>
</body>
</html>

