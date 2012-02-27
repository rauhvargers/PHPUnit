<?php
class GradeFromFile{
  private $fileLine;
    
  function __construct($fileLine){
  	$this->fileLine = $fileLine;
 }
  
  
  /**
   * Demonstrācija, kā rakstīt universālo "getter" metodi
   * @param type $prop
   * @return type 
   */
  function __get($prop){
  	$lineParts = explode(" ", $this->fileLine);
  	switch($prop){
  		case "date": 
  			return $lineParts[0];
  			break;
  		case "lecture":
  			return $lineParts[1];
  			break;
  		case "mark":
  			return $lineParts[2];
  			break;
  	}
  }

  /**
   * Demonstrācija, kā jebkurai klasei var aprakstīt
   * savu specifisku toString() metodi
   * @return type 
   */
  function __toString(){
  	return "Atzīmes objekts. \n". $this->fileLine;
  	
  }
}
?>