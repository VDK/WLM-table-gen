<?php

function printHeader($num_monuments = 0){
?>
De [[Nederlandse gemeente|gemeente]] [[<?php echo ($GLOBALS['gemeente-artikel'] == $GLOBALS['gemeente-naam'] ?  $GLOBALS['gemeente-naam'] : $GLOBALS['gemeente-artikel']."||".$GLOBALS['gemeente-naam']);?>]] kent <?php echo $num_monuments; ?> [[gemeentelijk monument|gemeentelijke monumenten]], hieronder een overzicht. 
Zie ook de [[Lijst van rijksmonumenten in <?php echo $GLOBALS['gemeente-artikel']."|rijksmonumenten in ".$GLOBALS['gemeente-naam']."]].<br/>";


}

function createTableStart($city, $count){
$city= ucfirst($city);
?>
==<?php echo $city;?>==<br/>
De plaats [[<?php echo $city;?>]] kent <?php echo $count." "; echo ($count ==1)? "gemeentelijk monument" : "gemeentelijke monumenten";?>:<br/>
<?php
echoTableHead();
}


function echoTableHead(){
?>{{Tabelkop gemeentelijke monumenten|prov-iso=<?php echo getISO();?>|gemeente=[[<?php echo $GLOBALS['gemeente-artikel'];?>]]}}<br/>
<?php
}

function createRow($object, $bouwjaar, $architect,$adres,$postcode,$lat,$lon,$gemcode,$objnr,$MIP_nr,$kadaster,$rijksmonument,$aangewezen,$oorspr_fun,$url,$rowcount){

if ($objnr == ""){
  $objnr = getObjnr($rowcount);
}

?>
{{Tabelrij gemeentelijk monument
| object =<?php echo ucfirst($object);?>
| bouwjaar =<?php echo  sortYear ($bouwjaar);?>
| architect =<?php echo $architect;?>
| adres =<?php echo $adres;?>
| postcode =<?php echo $postcode;?>
| lat =<?php echo $lat;?>
| lon =<?php echo $lon;?>
| objnr =<?php echo $objnr;?>
| gemcode =<?php echo $gemcode;
 echo ($MIP_nr == "")? "" : "|MIP_nr = $MIP_nr";
 echo ($kadaster=="")? "" : "|kadaster = $kadaster";?>
| rijksmonument =<?php echo $rijksmonument;?>
| aangewezen =<?php echo $aangewezen;?>
| oorspr_fun =<?php echo $oorspr_fun;
 echo ($url=="")? "" : "| url = $url";?> 
| commonscat=
| image=
}}
<?php 

echo "<br/>&lt;!-- --&gt;<br/>";
}

function tableClosure(){
echo "|}<br/>";
}

function printFooter(){
$gem = $GLOBALS['gemeente-naam'];
?>
|}<br/>
{{Commonscat|Gemeentelijke monumenten in <?php echo $gem."}}"; 
?><br/>
{{Appendix|2=*{{Citeer web|url= |titel=Monumenten |uitgever=[[<?php echo $GLOBALS['gemeente-artikel']."|"."Gemeente ".$gem;?>]]|formaat= |datum= |bezochtdatum=<?php echo date('j-M-Y');?>}}<br/>
----<br/>
{{references}}}}<br/>
[[Categorie:<?php echo $gem;?>]]<br/>
[[Categorie:Lijsten van gemeentelijke monumenten in <?php echo getProvinceCategoryName()."|".$gem;?>]]<br/>
[[Categorie:Lijsten van gemeentelijke monumenten naar gemeente|<?php echo $gem; ?>]]
<br/>&lt;!-- Deze lijst was gegenereerd met WLM-table-gen, zie het script op http://tinyurl.com/WLM-table-gen --&gt;
<?php
}


?>