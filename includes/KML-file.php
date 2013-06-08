<?php

function printHeader($num_monuments = 0){
?>
&lt;?xml version="1.0" encoding="UTF-8"?><br/>
&lt;kml xmlns="http://earth.google.com/kml/2.2"><br/>
&lt;Document><br/>
  &lt;name>Gemeentelijke monumenten in <?php echo $GLOBALS['gemeente-naam'];?>&lt;/name><br/>
  &lt;description>&lt;![CDATA[]]>&lt;/description><br/>
  &lt;Style id="style1"><br/>
    &lt;IconStyle><br/>
      &lt;Icon><br/>
        &lt;href>http://maps.gstatic.com/mapfiles/ms2/micons/blue-dot.png&lt;/href><br/>
      &lt;/Icon><br/>
    &lt;/IconStyle><br/>
  &lt;/Style><br/>
  
<?php

}

function createRow($object, $bouwjaar, $architect,$adres,$postcode,$lat,$lon,$gemcode,$objnr,$MIP_nr,$kadaster,$rijksmonument,$aangewezen,$oorspr_fun,$url){
?>
 &lt;Placemark></br/>
    &lt;name>GM <?php echo $objnr.": ".$adres;?> &lt;/name></br/>
    &lt;description>&lt;![CDATA[<?php echo ucfirst($object); echo ($bouwjaar != "")? "<br/>bouwjaar: ".$bouwjaar:"";?>]]>&lt;/description></br/>
    &lt;styleUrl>#style1&lt;/styleUrl></br/>
    &lt;Point></br/>
      &lt;coordinates><?php echo $lon.",".$lat;?>,0.000000&lt;/coordinates></br/>
    &lt;/Point></br/>
  &lt;/Placemark></br/>

<?php

}

function tableClosure(){

}


function createTableStart($city, $count){

}


function echoTableHead(){

}

function printFooter(){
?>
&lt;/Document>
&lt;/kml>
<?php
}



?>