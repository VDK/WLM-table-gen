<?php


include_once('../1-set_up_variables.php');
include_once('mip.php');
$pace = 10; //number of rows per page

$GLOBALS['gemeente-artikel'] = $gemeente;
$GLOBALS['gemeente-naam']    = getFirsIndexOnExplode(" (", $gemeente);

// Create connection
$con=mysqli_connect($host,$username,$password,$database);

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

//GET page count
if ($rijksdriehoek != true){ //no need to have a "next" button if there are rijksdriehoek-coordinates
  $j = getPageCountAndPrintButton(); 
}
else {
  $j =0;
}

//get monument-count per place, and the center of town (because Google Maps sometimes sucks at reading addresses, and returns that instead)

$cities['gemeente'] ="";
if (isset( $_COOKIE["CityVars"])){
  $cities = unserialize($_COOKIE["CityVars"]);
}
if ($cities['gemeente'] != $GLOBALS['gemeente-naam']){
  if ($column['plaats'] != ""){
    $result = mysqli_query($con,"SELECT ".$column['plaats'].", COUNT(DISTINCT id) AS 'num' FROM ".$table." GROUP BY ".$column['plaats'].";");

    while($row = mysqli_fetch_array($result)){  
        $cityvars =Array('numMon' => $row['num']);
        if ($rijksdriehoek != true){
          $cityvars = array_merge ($cityvars, Array ("coordinates" => getGoogleMapsData($row[$column['plaats']].", ".$GLOBALS['provincie']))); 
        }
        $cities[(string)$row[$column['plaats']]] = $cityvars;
    }
  }
  else {
    $cities[$GLOBALS['gemeente-naam']] = Array ("coordinates" => getGoogleMapsData($GLOBALS['gemeente-naam'].", ".$GLOBALS['provincie']  )); 
  }
  $cities['gemeente'] = $GLOBALS['gemeente-naam'];
  setcookie("CityVars", serialize($cities), time()+3600);
}

  
//select CBS-number
$gemNummer = "";
$result = mysqli_query($con, "SELECT gemcode FROM _cbs_nr WHERE gemeente LIKE '".$GLOBALS['gemeente-naam']."' AND provincie LIKE '".$GLOBALS['provincie']."'");
while($row = mysqli_fetch_array($result)){
  $gemNummer =  $row['gemcode'];
}
if ($gemNummer  == ""){
  if ($CBS_overwrite == ""){
    echo '<h1>CBS-nummer is niet gevonden, stel de waarde van $CBS_overwrite in binnen 1-set_up_variables.php</h1>';
    $gemNummer = "";
  }
  else {  
    $gemNummer = $CBS_overwrite;
  }
}


//select all the things
$result = mysqli_query($con,"SELECT * FROM ".$table." ".$printOrder);
//creating the actual table
$i = 0;
$previousPlace = "";
while($row = mysqli_fetch_array($result))
  {
  if ($column['plaats'] ==""){
    $plaats = $GLOBALS['gemeente-naam'];
  }
  else {
    $plaats = trim($row[$column['plaats']]);
  }  
  if ($i ==0 && $j == 0){
    printHeader(mysqli_num_rows($result)); //create start of page
    if ($column['plaats'] == ""){
      echoTableHead();
    }
  }
  if (($i >=$j*$pace && $i <$j*$pace+$pace) || $rijksdriehoek == true){
    if ($previousPlace != $plaats && $column['plaats'] != ""){
      if ($j != 0 || $i != 0 ){ tableClosure(); }  // closes previous table
      createTableStart($plaats, $cities[$plaats]['numMon']); //create start of table
    }
    //get coordinates
    //setting up basic results
    $tableresults['object']     = getColumName($column['object'],     $row);
    $tableresults['bouwjaar']   = getColumName($column['bouwjaar'],   $row);
    $tableresults['architect']  = getColumName($column['architect'],  $row);
    $tableresults['adres']      = getColumName($column['adres'],      $row);
    $tableresults['postcode']   = getColumName($column['postcode'],   $row);
    $tableresults['objnr']      = getColumName($column['objnr'],      $row);
    $tableresults['MIP_nr']     = getColumName($column['MIP_nr'],     $row);
    $tableresults['kadaster']   = getColumName($column['kadaster'],   $row);
    $tableresults['rijksnr']    = getColumName($column['rijksnr'],    $row);
    $tableresults['datum']      = getColumName($column['datum'],      $row);
    $tableresults['orfunctie']  = getColumName($column['orfunctie'],  $row);
    $tableresults['url']        = getColumName($column['url'],        $row);
    $coordinates['lat'] ="";
    $coordinates['long'] ="";
    $mip = false;
  
    //Asking the MIP database
    // $straat = trim(substr($tableresults['adres'],0,-2));
    // $hnr = trim(mb_substr($tableresults['adres'],-2));
    
    
    // $mipresults = mysqli_query($con,'SELECT * FROM _mip WHERE gemeente = "'.$GLOBALS['gemeente-naam'].'" AND straat = "'.$straat.'" AND hne = "'.$hnr.'" AND plaatsnaam = "'.$plaats.'";');
    // if ($mipresults){
      // while($row2 = mysqli_fetch_array($mipresults)) {
        // ($tableresults['bouwjaar'] == "")? "": $tableresults['bouwjaar'] = $tableresults['bouwjaar'].", ";
        // $tableresults['bouwjaar'] = $tableresults['bouwjaar'].$row2['datering_o']."&lt;ref name=MIP/&gt";
        
        
        // ($tableresults['orfunctie'] == "")? "": $tableresults['orfunctie'] = $tableresults['orfunctie'].", ";
        // $tableresults['orfunctie'] = $tableresults['orfunctie'].$row2['oorspr_fun'];
        
        // ($tableresults['architect'] == "")? "": $tableresults['architect'] = $tableresults['architect']."/ ";
        // $tableresults['architect'] = $tableresults['architect'].$row2['architect'];
        
        // ($tableresults['object'] == "")?$tableresults['object'] = substr($row2['typesch_obj'],11)."" : "";
        // ($row2['naam'] != "")? $tableresults['object'] = $tableresults['object']." ''".$row2['naam']."''" : "";
        
       // ($tableresults['postcode'] == "")? $tableresults['postcode']  = $row2['pc']: "";
        
        // $tableresults['MIP_nr'] = $row2['mip_sleute'];
        // $coordinates =rd2wgs($row2["x_coord"],$row2["y_coord"]);
        // $mip = true;
      // }
    // }  
    
    //getting Google Maps data
    if ($rijksdriehoek == false && $mip == false){
      $coordinates=getGoogleMapsData($tableresults['adres'].', '.$plaats.', The Netherlands');
      //test if the coordinates are any good
      if ($coordinates['lat']  == $cities[$plaats]['coordinates']['lat'] && $coordinates['long']  == $cities[$plaats]['coordinates']['long']) {
        $coordinates['lat'] = "";
        $coordinates['long'] = "";
      }
      //if there isn't a zipcode already, fill it in.
      elseif ($tableresults['postcode'] == ""){
          $tableresults['postcode'] = $coordinates['zip'];
      }
    }
    
    //translating "rijksdriehoek-coordinates"
    else if($rijksdriehoek == true && $mip == false){
      $coordinates=rd2wgs($row[$column["x"]],$row[$column["y"]]);
    }
    
    
    //build one row
    createRow(
     $tableresults['object'],        //object
     $tableresults['bouwjaar'],        //bouwjaar
     $tableresults['architect'],        //architect
     $tableresults['adres'],            //adres
     $tableresults['postcode'],        //postcode
     $coordinates['lat'],                             //lat
     $coordinates['long'],                            //long
     $gemNummer,                                      //gemcode
     $tableresults['objnr'],        //objnr
     $tableresults['MIP_nr'],        //MIP_nr
     $tableresults['kadaster'],        //kadaste
     $tableresults['rijksnr'],        //rijksmonument nummer
     $tableresults['datum'],             //datum aangewezen
     $tableresults['orfunctie'],        //oorspronkelijk doel van gebruik
     $tableresults['url'] ,              //bron URL
     $i //row count
    );
    if (($i+1) == mysqli_num_rows($result)){
      printFooter();
    }
  }
  $previousPlace = $plaats;
  $i++;
}
  

//This function merges the columns in the MySQL table to fit in the columns of the WikiTable
function getColumName($columname, $row){
  if ($columname == ""){
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
      else if (@$row[$columname[$i]] != ""){
       @$output.= $row[$columname[$i]];
      }
    }
    return $output;
  }
}
// implements the {{sorteer}} template. Needs expanding so that stuff like "jaren '50" gets recognised
function sortYear ($year){
  if ($year != ""){
    $yearparts = explode (" ", $year);
    // look for 4 digit years
    if (is_numeric(mb_substr($yearparts[0], 0,4))){
      return $year;
    }
    for ($i = 1; $i < count($yearparts); $i++){
      if (is_numeric(mb_substr($yearparts[$i],0,4))){
        return "{{Sorteer|".mb_substr($yearparts[$i],0,4)."|".$year."}}";
      }
    }
    //look for 2 digit century names
    for ($i = 0; $i < count($yearparts); $i++){
      if (is_numeric(mb_substr($yearparts[$i],0,2))){
        return "{{Sorteer|".(mb_substr($yearparts[$i],0,2)-1)."00|".$year."}}";
      }
    }
  }
  return $year;
}

function getObjnr($i){
  $label ="WN";
  if (($i+1) <10){
    $label .= "00";
  }
  elseif (($i+1) <100){
    $label .= "0";
  }
  $label .= ($i+1);
  return $label;
}
/* geocoding functions */
 
function getGoogleMapsData($address){
  $address = rawurlencode(normalizer($address));
  $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
  $output= json_decode($geocode);
  if ($output->status =="OK"){
    $geo['lat'] = $output->results[0]->geometry->location->lat;
    $geo['long'] = $output->results[0]->geometry->location->lng;
    @$geo['zip'] = $output->results[0]->address_components[6]->long_name;
    return $geo;
    break;
  }
  else if ($output->status=="OVER_QUERY_LIMIT"){
    switch (rand(0,3)){
    case 0: 
      echo "<h1>Google Maps is mad, wait a second and reload this page</h1>";
      break;
    case 1:
      echo "<h1>Google Maps is feeling cranky, wait a second and reload this page</h1>";
      break;
    case 2: 
      echo "<h1>Google Maps thinks you ask too many questions, waith a second and reload this page</h1>";
      break;
    case 3: 
      echo "<h1>Google Maps is feeling upset, take a sip of tea and relaod this page</h1>";
      break;
    }  
  }
}
// changes � into e etc.. Because Google Maps is weird.
function normalizer($original_string){
  $some_special_chars = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�");
  $replacement_chars  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "a", "A", "e", "E");

  $replaced_string    = str_replace($some_special_chars, $replacement_chars, $original_string);

  return $replaced_string; 
}

/* OK, I know this function is a bit dirty. 
Because Google Maps doesn't let you ask for
too many coordinates at once, the table has
to be split up into pages. This function 
both creates the button to got to the next page 
and returns the number of the current page */
function getPageCountAndPrintButton(){
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
function rd2wgs ($x, $y)
{
    // Calculate WGS84 co�rdinates
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




function getISO($province = ""){
  if ($province ==""){
    $province = $GLOBALS['provincie'];
  }
  $province = strtolower($province);
  switch ($province){
    case "drenthe":       return "nl-dr"; break;
    case "flevoland":     return "nl-fl"; break;
    case "frysl�n": 
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
      return ucfirst($nameParts[0])."-".ucfirst($nameParts[1]); break;
    
    case "groningen":     
    case "utrecht":       return ucfirst($province." (provincie)"); break;
    
    case "limburg":       return "Limburg (Nederland)"; break;   
    case "frysl�n":       return "Friesland"; break;
   }

}
function getFirsIndexOnExplode($delimiter, $string){
  $parts = explode($delimiter, $string);
  return $parts[0];
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
