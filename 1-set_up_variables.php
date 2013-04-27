<?php
//Set up variables
$table                = "haren"; // the name of the table in the DB
$GLOBALS['gemeente']  = "Haren";
$GLOBALS['provincie'] = "Groningen";
$printOrder           = "ORDER BY plaats";

///set up column variables

$column['plaats']       = 'plaats';        //plaats    (assumed to be one collumn)


$column['object']       = Array ('huidigefunctie', Array(" ''", "objectnaam", "''"));        //object
$column['bouwjaar']     = 'bouwjaar';             //bouwjaar
$column['architect']    = 'architect';            //architect 
$column['adres']        = Array ('straat', Array (" ", 'huisnr'));  //adres    
$column['postcode']     = 'postcode';             //postcode   
$column['kadaster']     = 'kadaster';             //postcode   
$column['orfunctie']    = 'voormaligefunctie';    //oorspronkelijk doel van gebruik 
$column['objnr']        = "";                     //id nummer die de gemeente heeft toegewezen
$column['MIP_nr']       = ""; //MIP_nr    
$column['rijksnr']      = ""; //rijksmonument nummer   
$column['datum']        = ""; //datum aangewezen
$column['url']          = ""; //URL
                     

//change at first setup:

$host     = "127.0.0.1";
$username = "root";
$password = "";
$database = "test";

?>
