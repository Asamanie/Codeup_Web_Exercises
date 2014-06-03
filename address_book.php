<?php

$address_book = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];

$filename = "data/adr_bk.csv";

function write_csv($bigArray, $filename) {
	if (is_writable($filename)) {
		$handle = fopen($filename, 'w');
		foreach($bigArray as $fields) {
			fputcsv($handle, $fields);
		}
		fclose($handle);
	}
}

$new_address = [];

if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip'])) {

	$new_address['name'] = $_POST['name'];
	$new_address['address'] = $_POST['address'];
	$new_address['city'] = $_POST['city'];
	$new_address['state'] = $_POST['state'];
	$new_address['zip'] = $_POST['zip'];
	$new_address['phone'] = $_POST['phone'];

	array_push($address_book, $new_address);
	write_csv($address_book,$filename);

} else {

	foreach ($_POST as $key => $value) {
		if (empty($value)) {
			echo "<h3>" . ucfirst($key) . " is empty.</h3>";
		}
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>My Address Book</title>
</head>
<body>
	<h1>Codeup Address Book</h1>
	<hr>
	<table border = '2'>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th>Phone</th>
		</tr>
		<? foreach ($address_book as $fields) : ?>
		<tr>
			<? foreach ($fields as $value) : ?>
				<td><?= $value; ?></td>
			<? endforeach; ?>
		</tr>	
		<? endforeach; ?>	
	</table>	
	
	<hr>
	<h3>Do you need add a entry to your address book?<br>Fill out the required fields below, then click ADD ENTRY:</h3>
	        
	        <form method="POST"> 
		           <p>
		                <label for="name">Name</label>
		                <input id="name" name="name" type="text" placeholder="required">
		            </p>
		            <p>
		                <label for="address">Address</label>
		                <input id="address" name="address" type="text" placeholder="required">
		            </p>
		            <p>
		                <label for="city">City</label>
		                <input id="city" name="city" type="text" placeholder="required">
		            </p>
		            <p>
		                <label for="state">State</label>
		                <input id="state" name="state" type="text" placeholder="required">
		            </p>
		            <p>
		                <label for="zip">Zip</label>
		                <input id="zip" name="zip" type="text" placeholder="required">
		            </p>
		            <p>
		                <label for="phone">Phone</label>
		                <input id="phone" name="phone" type="text">
		            </p>
		            <p>
		                <input type="submit" value="ADD ENTRY">
		            </p>
		        </form>
			</form>

</body>
</html>
