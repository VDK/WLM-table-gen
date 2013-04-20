<?php
//Set up variables
$table='rheden'; // the name of the table in the DB
$GLOBALS['gemeente'] ="Rheden";
$GLOBALS['provincie'] = "Gelderland";
//don't edit these variables:
$previousPlace = "";
$j = pageCount(); //GET page count

// Create connection
$con=mysqli_connect("127.0.0.1","root","","test");

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

//get count per place
$result = mysqli_query($con,"SELECT plaats, COUNT(DISTINCT id) AS 'num' FROM ".$table." GROUP BY plaats;");

while($row = mysqli_fetch_array($result)){
  $cities[(string)$row['plaats']]=  $row['num'];
}

//select all the things
$result = mysqli_query($con,"SELECT * FROM ".$table." ORDER BY plaats, nummer");

//creating the actual table
$i = 0;
while($row = mysqli_fetch_array($result))
  {
  if ($i ==0 && $j == 0){
    printHeader(mysqli_num_rows($result));
  }
  if ($i >=$j*10 && $i <$j*10+10 ){
    if ($previousPlace != $row['plaats']){
      if ($j != 0 || $i != 0){ echo "|}</br>";}  // closes previous table
      createTableStart($row['plaats'],$cities[$row['plaats']]);
    }
        
    $coordinate=geocoding($row['adres'].', '.$row['postcode'].', '.$row['plaats']   );
    createRow(
     $row['object'],                      //object
     "",                                  //bouwjaar
     "",                                  //architect
     $row['adres'],                       //adres
     $row['postcode'],                    //postcode
     $coordinate['lat'],                  //lat
     $coordinate['long'],                 //long
     "0275",                              //gemcode
     $row['nummer'],                      //objnr
     "",                                  //MIP_nr
     "",                                  //kadaster
     "",                                  //rijksmonument nummer
     "",                                  //datum aangewezen
     "",                                  //oorspronkelijk doel van gebruik
     "");                                 //bron URL
     if (($i+1) == mysqli_num_rows($result)){
      printFooter();
     }
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
$city= ucfirst($city);
?>
==<?php echo $city;?>==<br/>
De plaats [[<?php echo $city;?>]] kent <?php echo $count; if ($count ==1){ echo " gemeentelijk monument";} else { echo " gemeentelijke monumenten";}?>:<br/>
{{Tabelkop gemeentelijke monumenten|prov-iso=<?php echo getISO();?>|gemeente=[[<?php echo $GLOBALS['gemeente'];?>]]}}<br/>
<?php
}

function createRow($object, $bouwjaar, $architect,$adres,$postcode,$lat,$lon,$gemcode,$objnr,$MIP_nr,$kadaster,$rijksmonument,$aangewezen,$oorspr_fun,$url){
?>
{{Tabelrij gemeentelijk monument
| object =<?php echo ucfirst($object);?>
| bouwjaar =<?php echo $bouwjaar;?>
| architect =<?php echo $architect;?>
| adres =<?php echo $adres;?>
| postcode =<?php echo $postcode;?>
| lat =<?php echo $lat;?>
| lon =<?php echo $lon;?>
| gemcode =<?php echo $gemcode;?>
| objnr =<?php echo $objnr;?>
| MIP_nr =<?php  echo $MIP_nr;?>
| kadaster =<?php echo $kadaster;?>
| rijksmonument =<?php echo $rijksmonument;?>
| aangewezen =<?php echo $aangewezen;?>
| oorspr_fun =<?php echo $oorspr_fun;?>
| url =<?php  echo $url;?> 
| commonscat=
| image=
}}
<?php 

echo "<br/>&lt;!-- --&gt;<br/>";
}
function printHeader($num_monuments){
?>
De [[Nederlandse gemeente|gemeente]] [[<?php echo $GLOBALS['gemeente'];?>]] kent <?php echo $num_monuments; ?> gemeentelijke monumenten, hieronder een overzicht. 
Zie ook de [[Lijst van rijksmonumenten in <?php echo $GLOBALS['gemeente']."|rijksmonumenten in ".$GLOBALS['gemeente']."]].<br/>";


}

function printFooter(){
$gem = $GLOBALS['gemeente'];
?>
|}<br/>
{{Commonscat|Gemeentelijke monumenten in <?php echo $gem."}}"; 
?><br/>
{{Appendix|2=*{{Cite web|url= |title=Monumenten|publisher=[[<?php echo $gem."|"."Gemeente"." ".$gem;?>]]|accessdate=<?php echo date('j-M-Y');?>}}<br/>
----<br/>
{{references}}}}<br/>
[[Categorie:<?php echo $gem;?>]]<br/>
[[Categorie:Lijsten van gemeentelijke monumenten naar gemeente|<?php echo $gem;?>]]<br/>
[[Categorie:Lijsten van gemeentelijke monumenten in <?php echo $GLOBALS['provincie']."|".$gem."]]";

}

function pageCount(){
  ?>
  <form method="get" style="-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">
  <input type="hidden" name="j" value="<?php 
  if (empty($_GET['j'])) {
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
function getISO($province = ""){
  if ($province ==""){
    $province = $GLOBALS['provincie'];
  }
  $province = strtolower($province);
  switch ($province){
    case "drenthe":       return "nl-dr"; break;
    case "flevoland":     return "nl-fl"; break;
    case "fryslân": 
    case "friesland":     return "nl-fr"; break;
    case "gelderland":    return "nl-ge"; break;
    case "groningen":     return "nl-gr"; break;
    case "limburg":       return "nl-li"; break;
    case "noord-brabant": return "nl-nb"; break;
    case "noord-holland": return "nl-nh"; break;
    case "overijssel":    return "nl-ov"; break;
    case "utrecht":       return "nl-ut"; break;
    case "zeeland":       return "nl-ze"; break;
    case "zuid-holland":  return "nl-zh"; break;
   }

}
function stringBackTogether( $start, $array, $space=''){
  $returnString = "";
  for ($i = $start; $i <= count($array); $i++){
   @ $returnString .= $array[$i].$space;
  }
  return $returnString;
}
mysqli_close($con);  
?>
