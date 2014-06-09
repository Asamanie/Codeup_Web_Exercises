<?php

// include the file listed below in code
require_once('classes/address_data_store.php');

$addressBook = [];
$errorMessage = '';

$ads = new AddressDataStore('data/adr_bk2.csv');

$addressBook = $ads->readAddressBook();

if (!empty($_POST))
{
	// we must be trying to add a new address
	if (!empty($_POST['name']) && !empty($_POST['address'])) // todo finish the validation
	{
		// validation success
		$newAddress = [];
		$newAddress['name'] = $_POST['name'];
		$newAddress['address'] = $_POST['address'];
		$newAddress['city'] = $_POST['city'];
		$newAddress['state'] = $_POST['state'];
		$newAddress['zip'] = $_POST['zip'];
		if (empty($_POST['phone'])) {
			$newAddress['phone'] = '';
		} else {	
			$newAddress['phone'] = $_POST['phone'];
		}
		$addressBook[] = $newAddress;

		// save the address book
		$ads->writeAddressBook($addressBook);
	}
	else
	{
		// validation failed
		$errorMessage = "Validation failed. Please complete all fields.";
	}
}

if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {

    if ($_FILES['file1']["type"] != "text/csv") {
        echo "ERROR: file must be in text/csv!";
    } else {
        $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
        $uploadFilename = basename($_FILES['file1']['name']);
        // Create the saved filename using the file's original name and our upload directory
        $saved_filename = $upload_dir . $uploadFilename;
        // Move the file from the temp location to our uploads directory
        move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

        // load the new todos
        // merge with existing list
        $upload = new AddressDataStore($saved_filename);
        $address_uploaded = $upload->readAddressBook();
        $addressBook = array_merge($addressBook, $address_uploaded);
        $ads->writeAddressBook($addressBook);
    }
}

if (isset($_GET['id'])) {
	unset($addressBook[$_GET['id']]); //delete item selected
	$ads->writeAddressBook($addressBook); //saved changes 
}



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Address Book</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<h1>Address Book</h1>
		<? if (!empty($errorMessage)) : ?>
			<p><?=$errorMessage;?></p>
		<? endif; ?>
		<p>
			<table border = '2'>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Zip</th>
					<th>Phone</th>
				</tr>
				<? foreach ($addressBook as $index => $row) : ?>

					<tr>
						<? foreach ($row as $column) : ?>

							<td><?=$column;?></td>

						<? endforeach; ?>

						<td><a href = "?id=<?=$index;?>">Remove</a></td>
					</tr>

				<? endforeach; ?>
			</table>
		</p>

			<form method="POST">
				<p>
					<label for="name">Name</label>
					<input type="text" name="name" id="name">

					<label for="address">Address</label>
					<input type="text" name="address" id="address">

					<label for="city">City</label>
					<input type="text" name="city" id="city">

					<label for="state">State</label>
					<input type="text" name="state" id="state">

					<label for="zip">Zip</label>
					<input type="text" name="zip" id="zip">

					<label for="phone">Phone</label>
					<input type="text" name="phone" id="phone">
				</p>
				<p>	
					<input type="submit">
				</p>

			</form>
			<h3>Upload Files</h3>

			<form method="POST" enctype="multipart/form-data" action="/adr_book.php">
				<p>
					<label for="file1">File to upload</label>
					<input type="file" name="file1" id="file1">
				</p>
				<p>
					<input type="submit" value"Upload">
				</p>		
			</form>

	</body>
</html>