<?php
//Set up variables
$table                = "leeuwarden"; // the name of the table in the DB
$gemeente             = "Leeuwarden (gemeente)"; //name of the wikipedia article about the municipality
$GLOBALS['provincie'] = "Friesland";
$printOrder           = "ORDER BY plaats, adres ASC";

///set up column variables

$column['plaats']       = 'plaats';        //plaats    (assumed to be one collumn)


$column['object']       = "object" ;      //object
$column['bouwjaar']     = "";             //bouwjaar
$column['architect']    = "";            //architect 
$column['adres']        = "adres";  //adres    
$column['postcode']     = "postcode";             //postcode   
$column['kadaster']     = "";             //postcode   
$column['orfunctie']    = "type_monument";    //oorspronkelijk functie
$column['objnr']        = "registernr";                     //id nummer die de gemeente heeft toegewezen
$column['MIP_nr']       = ""; //MIP_nr    
$column['rijksnr']      = ""; //rijksmonument nummer   
$column['datum']        = Array("jaar", Array("-","maand"), Array("-", "dag")); //datum aangewezen
$column['url']          = ""; //URL

//Rijksdriehoek
//sometimes, fairly rarely, rijksdriehoek-gegevens are provided
$rijksdriehoek= false; //default should be false
$column['x'] = "x";
$column['y'] = "y";
                     

//change at first setup:

$host     = "127.0.0.1";
$username = "root";
$password = "";
$database = "test";

?>
