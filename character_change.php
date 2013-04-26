<?php
$table = 'haren';

// Create connection
$con=mysqli_connect("127.0.0.1","root","","test");

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

//get count per place
$result = mysqli_query($con,"SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE table_name = '".$table."'");

$i =0;
while($row = mysqli_fetch_array($result)){
  $columns[$i] = $row['COLUMN_NAME'];
  $i++;
}

$result = mysqli_query($con,"SELECT * FROM _changes");

while($row = mysqli_fetch_array($result)){
  for ($i = 0; $i < count ($columns); $i++){
    printQuery($table, $columns[$i], $row['replicant'], $row['original']);
  
  }
}

function printQuery($table, $columName, $replicant, $original){
  echo "<p>UPDATE ".$table."<br/>";
  echo "SET ".$columName."= REPLACE(".$columName.", '".$replicant."', '".$original."');</p>";
}


mysqli_close($con);  
?>
