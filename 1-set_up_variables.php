<?php
//Set up variables
$table                = "kampen"; // the name of the table in the DB
$GLOBALS['gemeente']  = "Kampen";
$GLOBALS['provincie'] = "Overijssel";
$printOrder           = "ORDER BY plaats";

///set up column variables

$column['plaats']       = 'plaats';        //plaats    (assumed to be one collumn)


$column['object']       = "object";        //object
$column['bouwjaar']     = "bouwjaar";             //bouwjaar
$column['architect']    = "architect";            //architect 
$column['adres']        = Array ("straat", array (" ", "huisnr"), array("",'toevoeging'));  //adres    
$column['postcode']     = "";             //postcode   
$column['kadaster']     = "kadaster";     //kadaster   
$column['orfunctie']    = "";    //oorspronkelijk functie
$column['objnr']        = "monnr";                     //id nummer die de gemeente heeft toegewezen
$column['MIP_nr']       = ""; //MIP_nr    
$column['rijksnr']      = ""; //rijksmonument nummer   
$column['datum']        = "datum"; //datum aangewezen
$column['url']          = ""; //URL

//Rijksdriehoek
//sometimes, fairly rarely, rijksdriehoek-gegevens are provided
$rijksdriehoek= true; //default should be false
$column['x'] = "x";
$column['y'] = "y";
                     

//change at first setup:

$host     = "127.0.0.1";
$username = "root";
$password = "";
$database = "test";

?>
