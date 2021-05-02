<?php

class Player
{
	protected $id, $name, $score, $cheated, $date,$level;

	function __construct( $id, $name, $score, $cheated, $date,$level )
	{
		$this->id = $id;
		$this->name = $name;
		$this->score = $score;
		$this->cheated = $cheated;
		$this->date = $date;
		$this->level = $level;

	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>

