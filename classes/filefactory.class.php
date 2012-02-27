<?php
class FileFactory{
	public function GetFile($studentName, $preference = "rtf"){
		switch ($preference){
			case "rtf" : 
				return new RtfGradeFile($studentName);
				break;
			case "pdf" : 
				return new PdfGradeFile($studentName);
				break;
		}
	}
}