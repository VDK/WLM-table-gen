<?php


include_once('1-set_up_variables.php');


if ($rijksdriehoek == false){ //no need to have a "next" button if there are rijksdriehoek-coordinates
  $j = pageCount(); //GET page count
}
else {
  $j =0;
}
// Create connection
$con=mysqli_connect($host,$username,$password,$database);

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

//get count per place
$result = mysqli_query($con,"SELECT ".$column['plaats'].", COUNT(DISTINCT id) AS 'num' FROM ".$table." GROUP BY ".$column['plaats'].";");

while($row = mysqli_fetch_array($result)){
  $cities[(string)$row[$column['plaats']]]=  $row['num'];
}

//select CBS-number
$result = mysqli_query($con, "SELECT gemcode FROM _cbs_nr WHERE gemeente LIKE '".$GLOBALS['gemeente']."' AND provincie LIKE '".$GLOBALS['provincie']."'");
while($row = mysqli_fetch_array($result)){
  $gemNummer =  $row['gemcode'];
}

//select all the things
$result = mysqli_query($con,"SELECT * FROM ".$table." ".$printOrder);

//creating the actual table
$i = 0;
$previousPlace = "";
while($row = mysqli_fetch_array($result))
  {
  if ($i ==0 && $j == 0){
    printHeader(mysqli_num_rows($result)); //create start of page
  }
  if (($i >=$j*10 && $i <$j*10+10) || $rijksdriehoek == true){
    if ($previousPlace != $row[$column['plaats']]){
      if ($j != 0 || $i != 0 ){ echo "|}<br/>";}  // closes previous table
      createTableStart($row[$column['plaats']],$cities[$row[$column['plaats']]]); //create start of table
    }
    //get coordinates
    $adres = getColumName($column['adres'], $row);
    
    if ($rijksdriehoek == false){
      $coordinate=geocoding($adres.', '.$row[$column['plaats']].", The Netherlands"  );
    }
    else{
      $coordinate=rd2wgs($row[$column["x"]],$row[$column["y"]]);
    }
    //build one row
    createRow(
     getColumName($column['object'],    $row),        //object
     getColumName($column['bouwjaar'],  $row),        //bouwjaar
     getColumName($column['architect'], $row),        //architect
     $adres,                                          //adres
     getColumName($column['postcode'],  $row),        //postcode
     $coordinate['lat'],                              //lat
     $coordinate['long'],                             //long
     $gemNummer,                                      //gemcode
     getObjnr($column['objnr'],   $i,   $row),        //objnr
     getColumName($column['MIP_nr'],    $row),        //MIP_nr
     getColumName($column['kadaster'],  $row),        //kadaste
     getColumName($column['rijksnr'],   $row),        //rijksmonument nummer
     getColumName($column['datum'],     $row),        //datum aangewezen
     getColumName($column['orfunctie'], $row),        //oorspronkelijk doel van gebruik
     getColumName($column['url'],       $row)         //bron URL
    );
    if (($i+1) == mysqli_num_rows($result)){
      printFooter();
    }
  }
  $previousPlace = $row[$column['plaats']];
  $i++;
}
  

  

function getObjnr($columname, $i, $row){
  if ($columname ==""){
    return "wikinr".($i+1);
  }
  else{
    return getColumName($columname, $row);
  }
}

function getColumName($columname, $row){
  if ($columname ==""){
    return "";
  }
  elseif (!(is_array($columname))){
    return $row[$columname];
  }
  elseif (is_array($columname)){
    $output = "";
    for ($i =0; $i < count($columname); $i++){
      if (is_array($columname[$i]) && $row[$columname[$i][1]] != "" ){
        $output .= $columname[$i][0];
        $output .= $row[$columname[$i][1]];
       @$output .= $columname[$i][2];
      }
      else{
       @$output.= $row[$columname[$i]];
        
      }
    }
    return $output;
  }
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
function rd2wgs ($x, $y)
{
    // Calculate WGS84 coördinates
    /* retrieved at http://www.god-object.com/2009/10/23/convert-rijksdriehoekscordinaten-to-latitudelongitude/ */
    $dX = ($x - 155000) * pow(10, - 5);
    $dY = ($y - 463000) * pow(10, - 5);
    $SomN = (3235.65389 * $dY) + (- 32.58297 * pow($dX, 2)) + (- 0.2475 *
         pow($dY, 2)) + (- 0.84978 * pow($dX, 2) *
         $dY) + (- 0.0655 * pow($dY, 3)) + (- 0.01709 *
         pow($dX, 2) * pow($dY, 2)) + (- 0.00738 *
         $dX) + (0.0053 * pow($dX, 4)) + (- 0.00039 *
         pow($dX, 2) * pow($dY, 3)) + (0.00033 * pow(
            $dX, 4) * $dY) + (- 0.00012 *
         $dX * $dY);
    $SomE = (5260.52916 * $dX) + (105.94684 * $dX * $dY) + (2.45656 *
         $dX * pow($dY, 2)) + (- 0.81885 * pow(
            $dX, 3)) + (0.05594 *
         $dX * pow($dY, 3)) + (- 0.05607 * pow(
            $dX, 3) * $dY) + (0.01199 *
         $dY) + (- 0.00256 * pow($dX, 3) * pow(
            $dY, 2)) + (0.00128 *
         $dX * pow($dY, 4)) + (0.00022 * pow($dY,
            2)) + (- 0.00022 * pow(
            $dX, 2)) + (0.00026 *
         pow($dX, 5));
 
    $Latitude = 52.15517 + ($SomN / 3600);
    $Longitude = 5.387206 + ($SomE / 3600);
 
    return array(
        'lat' => $Latitude ,
        'long' => $Longitude);
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
<!--| MIP_nr =<?php  //echo $MIP_nr;?>-->
| kadaster =<?php echo $kadaster;?>
| rijksmonument =<?php echo $rijksmonument;?>
| aangewezen =<?php echo $aangewezen;?>
| oorspr_fun =<?php echo $oorspr_fun;?>
<!-- | url =<?php  //echo $url;?> -->
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
{{Appendix|2=*{{Cite web|url= |title=Monumenten|publisher=[[<?php echo $gem."|"."Gemeente ".$gem;?>]]|format= |date= |accessdate=<?php echo date('j-M-Y');?>}}<br/>
----<br/>
{{references}}}}<br/>
[[Categorie:<?php echo $gem;?>]]<br/>
[[Categorie:Lijsten van gemeentelijke monumenten naar gemeente|<?php echo $gem;?>]]<br/>
[[Categorie:Lijsten van gemeentelijke monumenten in <?php echo getProvinceCategoryName()."|".$gem."]]";

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
function getProvinceCategoryName($province=""){
if ($province ==""){
    $province = $GLOBALS['provincie'];
  }
  $province = strtolower($province);
  switch ($province){
    case "drenthe":       
    case "flevoland":  
    case "friesland":     
    case "gelderland":    
    case "overijssel":    
    case "zeeland": return ucfirst($province); break;

    case "noord-brabant": 
    case "noord-holland":     
    case "zuid-holland":  
      $nameParts= explode ("-", $province);
      return ucfirst($nameParts[0])."-".ucfirst($nameParts[1]);
      break;
    
    case "groningen":     
    case "utrecht":       return ucfirst($province." (provincie)"); break;
    
    case "limburg":       return "Limburg (Nederland)"; break;   
    case "fryslân":       return "Friesland"; break;
   }

}


function stringBackTogether( $start, $array, $space=''){
  $returnString = "";
  for ($i = $start; $i < count($array); $i++){
   @ $returnString .= $array[$i].$space;
  }
  return $returnString;
}
mysqli_close($con);  
?>
