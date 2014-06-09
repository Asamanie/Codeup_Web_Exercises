<?
 
$filename = 'data/adr_bk.csv';

$address_book = [];

class AddressDataStore {

    public $filename = '';

    public function read_address_book() {
        $handle = fopen($this->filename, 'r');
		$address_book = [];
		while (!feof($handle)) {
			$row = fgetcsv($handle);
			if (is_array($row)) {
				$address_book[] = $row;
			}
		}
	fclose($handle);
	return $address_book;
    }

    public function write_address_book($addresses_array) {
        if (is_writable($this->filename)) {
		$handle = fopen($this->filename, 'w');
		foreach($addresses_array as $fields) {
			fputcsv($handle, $fields);
		}
		fclose($handle); 
	}
    }

}

$address_class = new AddressDataStore();
$address_class->filename="data/adr_bk.csv";
$address_class->read_address_book();
$address_class->write_address_book($address_book);

$address_book = $address_class->read_address_book();

if (isset($_GET['id'])) {
	unset($address_book[$_GET['id']]);
	$address_class->write_address_book($address_book);
	header("Location: address_book.php");
	exit;

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
	$address_class->write_address_book($address_book);


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
		<? foreach ($address_book as $key => $fields) : ?>
		<tr>
			<? foreach ($fields as $value) : ?>
				<td><?= htmlspecialchars(strip_tags($value)); ?></td>
			<? endforeach; ?>
			<td><a href = "?id=<?=$key;?>">Remove Entry</a></td>
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
