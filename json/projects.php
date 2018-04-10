<?php 

ini_set("display_errors", "1");
error_reporting(E_ALL);

// Set Headers
header('Content-Type: application/json');
//DB Connect 
$mysqli = new mysqli("localhost", "root", "password", "hkysrc");
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$sql = "SELECT * FROM projects";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$combined[] = $row;	
    }
    echo json_encode($combined);
	$projects = fopen("projects.json", "w") or die("Unable to open file!");
	fwrite($projects, json_encode($combined));
	fclose($myfile);

} else {
    echo json_encode("0 results");
}

$mysqli->close();

?>