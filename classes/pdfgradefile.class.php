<?php

require_once dirname(__FILE__) . "/../lib/tcpdf/tcpdf.php";
require_once dirname(__FILE__) . "/../lib/tcpdf/config/lang/eng.php"; 
 
/*
* izmanto tcpdf bibliotēku, ģenerē PDF failu
* http://www.tcpdf.org/  
* */
class PdfGradeFile extends GradeFile {
	function Generate_Content(){
		$pdf= new TCPDF();

		//kods ņemts no
		// http://www.tecnick.com/pagefiles/tcpdf/example_001.phps
		
		// galvene
		$pdf->setHeaderData("","","","Atzīmju izraksts");
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'', 12));
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//initialize document
		$pdf->AliasNbPages();
		
		// add a page
		$pdf->AddPage();
		
		// set font
		$pdf->SetFont("helvetica", "", 10);
		
		// print a line using Cell()
		$pdf->Cell(50,12,"Skolēns: $this->studentName",0,0,'L');
		$pdf->Ln();
		

		//ģenerē visu butisko saturu
		for ($i=0;$i<count($this->grades);$i++){
			$grade = $this->grades[$i];
			$pdf->Cell(0,0,sprintf("%s  %s  %s",$grade["date"],$grade["lesson"],$grade["grade"]),0,0,'L');
			$pdf->Ln();
 		}
		
 		$this->fileContents = $pdf;
	}

	
	function Write_To_Client(){
		
		//Close and output PDF document
		$this->fileContents->Output(mktime().".pdf", "I");
		
	}
	
}
?>
