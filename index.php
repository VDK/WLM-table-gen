<?php
//Set up variables
$table='oudijs'; // the name of the table in the DB
$GLOBALS['gemeente'] ="Oude IJsselstreek";
$GLOBALS['iso'] = "nl-ov";

// Create connection
$con=mysqli_connect("127.0.0.1","root","","test");

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

//GET page count
$j = pageCount();

//get count per place
$result = mysqli_query($con,"SELECT plaats, COUNT(DISTINCT adres) AS 'num' FROM ".$table." GROUP BY plaats;");

while($row = mysqli_fetch_array($result)){
  $cities[(string)$row['plaats']]=  $row['num'];
}
//select all the things
$result = mysqli_query($con,"SELECT * FROM ".$table." ");


//creating the actual table
$i = 0;
$previousPlace = "";

while($row = mysqli_fetch_array($result))
  {
  if ($i >=$j*10 && $i <$j*10+10 ){
    if ($previousPlace != $row['plaats']){
      if ($j != 0 || $i != 0){ echo "|}</br>";}
      createTableStart($row['plaats'],$cities[$row['plaats']]);
    }
    $coordinate=geocoding($row['adres'].' '.$row['plaats']   );
    createRow(
     $row['object'],                      //object
     '',                                  //bouwjaar
     '',                                 //architect
     $row['adres'],                       //adres
     "",                                  //postcode
     $row['plaats'],                      //plaats
     $coordinate['lat'],                  //lat
     $coordinate['long'],                 //long
     "1509",                              //gemcode
     $row['idnr'],                        //objnr
     "",                                  //MIP_nr
     "",                                  //kadaster
     "",                                  //rijksmonument nummer
     "",                                  //datum aangewezen
     "",                                  //oorspronkelijke functie
     "");                                 //bron URL
    }
    $previousPlace = $row['plaats'];
    $i++;
  }
  
//Don't edit below this line unless you know what you're doing
  
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

function createTableStart($city, $count){
?>
==<?php echo $city;?>==<br/>
De plaats [[<?php echo $city;?>]] kent <?php echo $count;?> gemeentelijke monumenten:<br/>
{{Tabelkop gemeentelijke monumenten|prov-iso=<?php echo $GLOBALS['iso'];?>|gemeente=[[<?php echo $GLOBALS['gemeente'];?>]]}}<br/>
<?php
}

function createRow($object, $bouwjaar, $architect,$adres,$postcode,$plaats,$lat,$lon,$gemcode,$objnr,$MIP_nr,$kadaster,$rijksmonument,$aangewezen,$oorspr_fun,$url){
?>
{{Tabelrij gemeentelijk monument
| object =<?php echo ucfirst($object);?>
| bouwjaar =<?php echo $bouwjaar;?>
| architect =<?php echo $architect;?>
| adres =<?php echo $adres;?>
| postcode =<?php echo $postcode;?>
| plaats =<?php echo ucfirst($plaats);?>
| lat =<?php echo $lat;?>
| lon =<?php echo $lon;?>
| gemcode =<?php echo $gemcode;?>
| objnr =<?php echo $objnr;?>
<!-- | MIP_nr =<?php // echo $MIP_nr;?>-->
| kadaster =<?php echo $kadaster;?>
| rijksmonument =<?php echo $rijksmonument;?>
| aangewezen =<?php echo $aangewezen;?>
| oorspr_fun =<?php echo $oorspr_fun;?>
<!--| url =<?php // echo $url;?> -->
| commonscat=
| image=
}}
<?php 

echo "<br/>&lt;!-- --&gt;<br/>";
}

function pageCount(){
  ?>
  <form method="get" style="-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">
  <input type="hidden" name="j" value="<?php 
  if (empty($_GET)) {
      echo 1;
      $j=0;
  }
  else {
    $j=$_GET['j'];
    echo $j+1;
  }
  ?>"/><input type="submit" value=">next 10>"/>
  </form>
  <?php
  return $j;
}

mysqli_close($con);  
?>
