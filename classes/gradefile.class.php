<?php

 abstract class GradeFile {
 	public		$grades;
 	public		$studentName;
 	public		$fileContents;
 	
 	/**
 	 * Konstruktorā izveido atzimju kolekciju un atceras parametros padoto vārdu
	 */
 	function __construct($studentName) {
 		$this->grades = array();
 		$this->studentName = $studentName;
 	}
 	
 	/** 
	*  Pievieno jaunu atzīmi.  
	*/
 	function add_grade($date, $lesson, $grade){
 		 assert('date_parse($date)');
 		 assert('$grade<10');
 		 $this->grades[] = array("date"=>$date, "lesson"=>$lesson, "grade"=>$grade); 
 	}
 	
 	/**
 	 * Pārlādē toString, lai varētu glīti izdrukāt objekta saturu
 	 */
 	function __toString(){
 		$retval = "";
 		$retval.="Atzīmju izraksts \n\n";
 		$retval.="Skolēns: $this->studentName\n\n\n";
 		$retval.="Datums\t\tPriekšmets\tAtzīme\n";
 		$retval.="---------------------------------------\n";
 		foreach ($this->grades as $grade){
 			$retval.= sprintf("%s\t%s\t%s\n",$grade["date"],$grade["lesson"],$grade["grade"]);
 		}
 		return $retval;
 	}
 
    /**
     * Sagatavo nosūtāmo failu
     */
 	abstract function Generate_Content();
 	
 	/**
 	 * Sūta sagatavoto dokumentu klientam
 	 */
 	abstract function Write_To_Client();
 		
 }
?>