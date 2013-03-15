<?php
// Create connection
$con=mysqli_connect("localhost","root","password","databasename");

// Check connection
if (mysqli_connect_errno($con))  {  echo "Failed to connect to MySQL: " . mysqli_connect_error();  }
  
$result = mysqli_query($con,"SELECT * FROM mytable ORDER BY plaats, adres");


$i = 0;
while($row = mysqli_fetch_array($result))
  {
  if ($i >0 && $i <15 ){
  // check for coordinates. Google Maps doesn't like getting too manny questions so change the edge values of $i to ask again.
   $coordinate=geocoding($row['adres'].", ".$row['plaats'].", "."Haarlemmermeer" );
   //add a new row:
   createRow($row['monument'] ,
   $row['bouwjaar'],
   $row['architect'],
   $row['adres'],
   "",
   $row['plaats'], 
   $coordinate['lat'], 
   $coordinate['long'], 
   "0394",
   $row['nr'],
   "",
   $row['kadaster'],
   "",
   "",
   "",
   "");
   }
   $i++;
  }
function geocoding($address){
  $address = rawurlencode($address);
  $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
  $output= json_decode($geocode);
  $geo['lat'] = $output->results[0]->geometry->location->lat;
  $geo['long'] = $output->results[0]->geometry->location->lng;
  return $geo;
}

function createRow($object, $bouwjaar, $architect,$adres,$postcode,$plaats,$lat,$lon,$gemcode,$objnr,$MIP_nr,$kadaster,$rijksmonument,$aangewezen,$oorspr_fun,$url){
?>
<!-- -->
{{Tabelrij gemeentelijk monument
| object =<?php echo $object; ?>
| bouwjaar =<?php echo $bouwjaar;?>
| architect =<?php echo $architect;?>
| adres =<?php echo $adres;?>
| postcode =<?php echo $postcode;?>
| plaats =<?php echo $plaats;?>
| lat =<?php echo $lat;?>
| lon =<?php echo $lon;?>
| gemcode =<?php echo $gemcode;?>
| objnr =<?php echo $objnr;?>
| MIP_nr =<?php echo $MIP_nr;?>
| kadaster =<?php echo $kadaster;?>
| rijksmonument =<?php echo $rijksmonument;?>
| aangewezen =<?php echo $aangewezen;?>
| oorspr_fun =<?php echo $oorspr_fun;?>
| url =<?php echo $url;?>
| commonscat=
| image=
}}
<?php


}
mysqli_close($con);  
?>
