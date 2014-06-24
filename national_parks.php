<?php 

$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'Andrew', 'letmein');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $dbc->prepare('INSERT INTO National_Parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');


if ($_POST) {
	

	$stmt->bindValue(':name',              $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location',          $_POST['location'],  PDO::PARAM_STR);
    $stmt->bindValue(':date_established',  $_POST['date_established'],  PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres',     $_POST['area_in_acres'],  PDO::PARAM_STR);
    $stmt->bindValue(':description',       $_POST['description'],  PDO::PARAM_STR);

    $stmt->execute();

}

function getOffset () {
	if (isset ($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	return ($page - 1) * 4;
}


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

  <link rel="stylesheet" href="/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css" />

</head>
<body bgcolor = "#E6E6FA">
	<div class="container">
	<h3>National Parks</h3>
	<table class="table table-striped table-hover">
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

    <h3>Submit New Park</h3>
    	<form method="POST" role="form">
            <p>
                <label for="name">Park Name</label>
                <input id="name" name="name" type="text">
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
                <textarea id="description" name="description" rows="10" cols="30" placeholder="write brief description of the park"></textarea>
            </p>
            <p>
                <button type="submit" class="btn btn-default">Submit New Park</button>
            </p>
        </form>
    </div>    
</body>
</html>

