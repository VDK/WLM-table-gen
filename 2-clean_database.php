<?php
include_once('1-set_up_variables.php');

// Create connection
$con=mysqli_connect($host,$username,$password,$database);

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

//get column names of the table
$result = mysqli_query($con,"SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE table_name = '".$table."'");

$i =0;
while($row = mysqli_fetch_array($result)){
  $columns[$i] = $row['COLUMN_NAME'];
  $i++;
}

$result = mysqli_query($con,"SELECT * FROM _changes");
$affected_rows =0;
while($row = mysqli_fetch_array($result)){
  for ($i = 0; $i < count ($columns); $i++){
    mysqli_query($con, buildQuery($table, $columns[$i], $row['replicant'], $row['original']));
    $affected_rows = $affected_rows + mysqli_affected_rows($con); 
  }
}
echo $affected_rows." rows affected";

function buildQuery($table, $columName, $replicant, $original){
  return "UPDATE ".$table." SET ".$columName."= REPLACE(".$columName.", '".$replicant."', '".$original."')";
}


mysqli_close($con);  
?>
