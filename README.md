WLM-table-gen
=============

This is a small script to generate Wiki tables of _gemeentelijke monumenten_ out of a MySQL database.
It supplements this data with coordinates based on Google Maps' data and the municipality's CBS-code

There is a step-by-step guide att http://nl.wikipedia.org/wiki/Wikipedia:Wikiproject/Erfgoed/Nederlandse_Erfgoed_Inventarisatie/Gemeentelijke_monumenten/WLM-table-gen

To-do's
-------
* Making it possible to retrieve Cadastre data


Recent changes
--------------

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
