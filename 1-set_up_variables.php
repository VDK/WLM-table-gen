<?php
//Set up variables
$table                = "terneuze"; // the name of the table in the DB
$gemeente             = "Terneuzen (gemeente)"; //name of the wikipedia article about the municipality
$GLOBALS['provincie'] = "Zeeland";

$printOrder           = "ORDER BY plaats";

///set up column variables

$column['plaats']       = 'plaats';        //plaats    (assumed to be one collumn)


$column['object']       = "object";     //object
$column['bouwjaar']     = "";             //bouwjaar
$column['architect']    = "";            //architect 
$column['adres']        = "adres";  //adres    
$column['postcode']     = "";             //postcode   
$column['kadaster']     = "kadaster";             //kadaster   
$column['orfunctie']    = "";  //oorspronkelijk functie
$column['objnr']        = "";     //id nummer die de gemeente heeft toegewezen
$column['MIP_nr']       = ""; //MIP_nr    
$column['rijksnr']      = ""; //rijksmonument nummer   
$column['datum']        = "datum"; //datum aangewezen
$column['url']          = ""; //URL

//Only use this when a CBS number can't be found, which it usually does.
$CBS_overwrite        = ""; 

//Rijksdriehoek
//sometimes, fairly rarely, rijksdriehoek-gegevens are provided
$rijksdriehoek= false; //default should be false
$column['x'] = "x";
$column['y'] = "y";
                     
//what kind of monument_nummer
include_once('/includes/gemeentelijke_mon.php');


//change at first setup:

$host     = "127.0.0.1";
$username = "root";
$password = "";
$database = "test";

?>
