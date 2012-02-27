<?php
require_once dirname(__FILE__) . "/gradefile.class.php";

require_once dirname(__FILE__) . "/../lib/rtf/PHPRtfLite.php";

/**
 * Izmanto PhpRtfLite bibliotēku, http://www.phprtf.com
 */
class RtfGradeFile extends GradeFile {
	function Generate_Content(){
	    PHPRtfLite::registerAutoloader();
	    $largerFont = new PHPRtfLite_Font(16, 'Courier New');
	    $largerFont->setBold();
	    $smallerFont = new PHPRtfLite_Font(12, 'Times New Roman');
	    $tableFont = new PHPRtfLite_Font(10, 'Courier New');

	    //Izveido pašu dokumentu
	    $rtf = new PHPRtfLite();

	    $parHead = new PHPRtfLite_ParFormat();
	    $parHead->setSpaceBefore(3);
	    $parHead->setSpaceAfter(8);
	    $parBody = new PHPRtfLite_ParFormat();
	    $parBody->setSpaceBefore(1);

	    //Izveido pirmo sekciju
	    $sect = &$rtf->addSection();
	    $sect->writeText("Atzīmju izraksts", $largerFont, $parHead);


	    $sect->writeText("Skolnieks: ".$this->studentName, $smallerFont, $parHead);


	    for ($i=0;$i<count($this->grades);$i++){
		    $grade = $this->grades[$i];
		    $sect->writeText( 
			    sprintf("%s  %s  %s", $grade["date"], $grade["lesson"],$grade["grade"]), 
			    $tableFont, 
			    $parBody);
	    }

	    $this->fileContents=$rtf;	
	}
	
	function Write_To_Client(){
		$this->fileContents->sendRtf(mktime().".rtf");
	}
	
	
}
/*

*/
?>
