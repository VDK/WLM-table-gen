<?php
//Set up variables
$table                = "woerden"; // the name of the table in the DB
$gemeente             = "Woerden"; //name of the wikipedia article about the municipality
$GLOBALS['provincie'] = "Utrecht";

$printOrder           = "ORDER BY plaats";

///set up column variables

$column['plaats']       = 'plaats';        //plaats    (assumed to be one collumn)


$column['object']       = Array ("object", Array(" ''","naam","''"));     //object
$column['bouwjaar']     = "";             //bouwjaar
$column['architect']    = "";            //architect 
$column['adres']        = Array ("adres", Array(" ","nr"));  //adres    
$column['postcode']     = "postcode";             //postcode   
$column['kadaster']     = "";             //kadaster   
$column['orfunctie']    = "";  //oorspronkelijk functie
$column['objnr']        = "";     //id nummer die de gemeente heeft toegewezen
$column['MIP_nr']       = ""; //MIP_nr    
$column['rijksnr']      = ""; //rijksmonument nummer   
$column['datum']        = "aangewezen"; //datum aangewezen
$column['url']          = ""; //URL

//Only use this when a CBS number can't be found, which it usually does.
$CBS_overwrite        = ""; 

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
