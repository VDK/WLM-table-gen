WLM-table-gen
=============

This is a small script to generate Wiki tables of _gemeentelijke monumenten_ out of a MySQL database.
It supplements this data with coordinates based on Google Maps' data and the municipality's CBS-code

[There is a step-by-step guide in Dutch on how to use this script](http://nl.wikipedia.org/wiki/Wikipedia:Wikiproject/Erfgoed/Nederlandse_Erfgoed_Inventarisatie/Gemeentelijke_monumenten/WLM-table-gen)

This version has been discontinued 
----------------------------------
in favor of the [WLM-table-gen-2](https://github.com/VDK/WLM-table-gen-2)
_______________________________________________________________________________________________________________




Last changes
--------------
*08-06-2013*
* Using the {{[sorteer](http://nl.wikipedia.org/wiki/Sjabloon:Sorteer)}} template when there is a "circa" date
* Seperating out the municipal monument specific code so that implementation for other kinds of monuments would be easier
* Google Maps map can now be generated by changing the _set-up-variables.php_ file, [see example](https://maps.google.com/maps/ms?msid=208244098044073223902.0004de8c739966a76b243&msa=0&ll=52.075022,4.411697&spn=0.052701,0.132093)

*29-05-2013*
* Fix bug where table head wasn't printed when no placenames were provided
* Making it possible to manually put in the CBS-code when it isn't found in the db.

*11-05-2013*
* Zip codes are now retrieved from Google Maps queries when not already provided

*03-05-2013*
* CBS-codes are now automatically retrieved
* Coordinates returned by Google Maps are tested on their accuracy
* A cookie is used to do the aforementioned
* A distinction is made between the name of the municipality and the name of its Wikipedia page
* Google Maps bug where â, ë and é's caused problems fixed

License
-------

*This program is free software: you can redistribute it and/or modify*
*it under the terms of the GNU General Public License as published by*
*the Free Software Foundation, either version 3 of the License, or*
*(at your option) any later version.*

*This program is distributed in the hope that it will be useful,*
*but WITHOUT ANY WARRANTY; without even the implied warranty of*
*MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the*
*GNU General Public License for more details.*

*You should have received a copy of the GNU General Public License*
*along with this program.  If not, see http://www.gnu.org/licenses/*
