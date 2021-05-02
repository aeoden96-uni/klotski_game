<?php

class Brick
{
	protected $indX, $indY,/*$unitSizeY,$unitSizeX,*/$local_id;
	protected $cssEnums="";

	function __construct($indX, $indY ,$local_id)
	{
		
		$this->indX = $indX;
		$this->indY = $indY;
		$this->local_id = $local_id;

	}

	function getColor()
	{
		
	}
	function setCSS($newClass){
		$this->cssEnums .= $newClass . " ";
	}

	function getX(){
		return $this->indX;
	}

	function getY(){
		return $this->indY;
	}

	function getCSS(){
		return $this->cssEnums;
	}
	function getId(){
		return $this->local_id; 
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>