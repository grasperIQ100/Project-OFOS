<?php
include_once("data_request_handeller/conn.php");

$db_handle = new DBController();
if(!empty($_POST["id"])) {
	$query ="SELECT * FROM loc WHERE city = '" . $_POST["id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Area</option>
<?php
	foreach($results as $area) {
?>
	<option value="<?php echo $area["id"]; ?>"><?php echo $area["name"]; ?></option>
<?php
	}
}
?>