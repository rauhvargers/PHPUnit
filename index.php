<?php
require_once("./classes/gradefile.class.php");
require_once("./classes/pdfgradefile.class.php"); 
require_once("./classes/rtfgradefile.class.php");
require_once("./classes/filefactory.class.php"); 

if (isset($_GET["type"])){
 	$file =  FileFactory::GetFile("Kārlis Zummeris", $_GET["type"]);  
 } else {
 	$file =  FileFactory::GetFile("Kārlis Zummeris");
 }
 
 $file->add_grade("2008-10-13", "Matemātika","8");
 $file->add_grade("2008-09-11", "Literatūra","7");
 
 
 
 
 $file->Generate_Content();
 $file->Write_To_Client();
?>
