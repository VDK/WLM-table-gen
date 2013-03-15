<form method="get">
<input type="hidden" name="j" value="<?php 
if (empty($_GET)) {
    echo 1;
    $j=0;
}
else {
  $j=$_GET['j'];
  echo $j+1;
}
?>"/>
<input type="submit" value=">next 10>"/>
</form>


<?php

// Create connection
$con=mysqli_connect("127.0.0.1","root","","test");

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
  
$result = mysqli_query($con,"SELECT * FROM molenwaard2 ORDER BY kolom3, adres");
$i = 0;
while($row = mysqli_fetch_array($result))
  {
  if ($i >$j*10 && $i <$j*10+10 ){
   $coordinate=geocoding($row['adres'].", ".$row['huisnr'].", ".$row['kolom3'] );
   createRow(
   $row['beschrijving'] ,               //object
   "",                                  //bouwjaar
   "",                                  //architect
   $row['adres']." ".$row['huisnr'],    //adres
   $row['kolom2'],                      //postcode
   $row['kolom3'],                      //plaats
   $coordinate['lat'],                  //lat
   $coordinate['long'],                 //long
   "1927",                              //gemcode
   $row['voormalige_gem'].$row['nr'],   //objnr
   "",                                  //MIP_nr
   $row['kadastrale_aanduidin'].$row['kadaster2'], //kadaster
   "",                                  //rijksmonument nummer
   $row['datum_aanwijzing'],            //datum aangewezen
   "",                                  //oorspronkelijke functie
   "");                                 //bron URL
   }
   $i++;
  }
function geocoding($address){
  $address = rawurlencode($address);
  $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
  $output= json_decode($geocode);
  if ($output->status =="OK"){
    $geo['lat'] = $output->results[0]->geometry->location->lat;
    $geo['long'] = $output->results[0]->geometry->location->lng;
    return $geo;
    break;
  }
  else if ($output->status=="OVER_QUERY_LIMIT"){
    echo "<h1>Google Maps is mad, wait a second and reload this page</h1>";
  }
}

function createRow($object, $bouwjaar, $architect,$adres,$postcode,$plaats,$lat,$lon,$gemcode,$objnr,$MIP_nr,$kadaster,$rijksmonument,$aangewezen,$oorspr_fun,$url){
?>
<?php echo "<br/>";?>
{{Tabelrij gemeentelijk monument
| object =<?php echo $object?>
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
