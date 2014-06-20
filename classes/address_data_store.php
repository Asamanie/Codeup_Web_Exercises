<?
require('filestore.php'); // calling my filestore folder


class AddressDataStore extends Filestore {
	public function __construct($filename)
	{
		$filename = strtolower($filename);
		parent::__construct($filename);
	}

    // public function __destruct()   a function to destruct the onpening of the class
    // {
    //     echo "Class Dismissed\n";
    // }

}
?>