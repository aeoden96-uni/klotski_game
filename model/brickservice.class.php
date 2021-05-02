<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ . '/brick.class.php';

class BrickService
{
	protected $myTable;
	protected $tableW,$tableH;
	protected $level;
	
	function __construct($newGame=FALSE , $level=1) {
		if(!isset( $_SESSION['myTable']) || $newGame)
			$this->getTableFromSQL($level);
		else 
			$this->getTableFromSession();
		
        
    }
	function getTableFromSession(){

		$this->myTable=$_SESSION['myTable'];
		$this->tableW=$_SESSION['tableW'];
		$this->tableH=$_SESSION['tableH'];
		$this->level=$_SESSION['level'];

		return TRUE;
	}

	function pushTableToSession()
	{
		$_SESSION['myTable']=$this->myTable;
		$_SESSION['tableW']=$this->tableW;
		$_SESSION['tableH']=$this->tableH;
		$_SESSION['level']=$this->level;

	}
		
	function getAllBricks()
	{
		return $this->myTable;
	}

	function getTableFromSQL($level){
		$tableName="";
		$this->level=$level;
		switch ($level) {
			case 1:
				$tableName= " bricks ";
				$this->tableH=8;
				$this->tableW=6;
				
				break;
			case 2:
				$tableName= " bricks2 ";
				$this->tableH=8;
				$this->tableW=6;
				break;
			case 3:
				$tableName= " bricks3 ";
				$this->tableH=9;
				$this->tableW=8;
				break;
		}
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT indX, indY,local_id FROM ' . $tableName  . ' ORDER BY indX,indY');
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		
		$this->myTable = [[]];	

		$ind_x=0;
		$ind_y=0;

		while( $row = $st->fetch() )
		{
			
			//this while loop fills in empty bricks that are not in SQL database
			while($ind_x <> $row['indX'] || $ind_y <> $row['indY'] ){

				$this->myTable[$ind_x][$ind_y]=new Brick($ind_x,$ind_y  ,0);

				$ind_y++;
				if($ind_y >= $this->tableW){
					$ind_x++;
					$ind_y=0;
				}
			}
			$this->myTable[$ind_x][$ind_y]=new Brick($row['indX'], $row['indY'] ,$row['local_id']);

			$ind_y++;
				if($ind_y >= $this->tableW){
					$ind_x++;
					$ind_y=0;
			}
		}

		 $i=0;
		 $j=0;
		 
		//this loop adds tags to each brick 
		//each tags tells the brick where are bricks of same type around it
		for($i=0; $i< $this->tableH ; $i +=1)
			for($j=0; $j < $this->tableW ; $j +=1){
				
				
				$tempID=$this->myTable[$i][$j]->GetId();

				if ($i!=0){
					if($this->myTable[$i-1][$j]->GetId()== $tempID){
						$this->myTable[$i][$j]->setCSS("imaGore");

					}
				}
				if($i < ($this->tableH-2) ){
					if($this->myTable[$i+1][$j]->GetId()== $tempID){
						$this->myTable[$i][$j]->setCSS("imaDole");

					}
				}

				if($j!=0){
					if($this->myTable[$i][$j-1]->GetId()==  $tempID){
						$this->myTable[$i][$j]->setCSS("imaLijevo");

					}
				}
				if($j != ($this->tableW-1) ){
					if($this->myTable[$i][$j+1]->GetId()==  $tempID){
						$this->myTable[$i][$j]->setCSS("imaDesno");

					}
				}
		}

		$this->pushTableToSession();

		return $this->myTable;
		
	}

	

    
	function eraseBricks( $brick_id  ){
		
		for($i=1; $i< ($this->tableH-2) ; $i +=1)
			for($j=1; $j < ($this->tableW-1) ; $j +=1)
			{
				$tempBrick=$this->myTable[$i][$j];

				if($tempBrick->GetId() == $brick_id ){

					$this->myTable[$i][$j]=new Brick($i,$j  ,0);
				}
				

			}
	$this->pushTableToSession();
	return TRUE;

	}
	function moveBricks( $brick_id  , $letter  ){
		$whatToSet=0;

		$incrementX=+1;
		$incrementY=0;

		$orderBy='DESC';

		switch ($letter) {
			case 'U':
				$whatToSet='indX';
				$orderBy='ASC';

				$incrementX=-1;
				$incrementY=0;
				break;
			case 'D':
				$whatToSet='indX';
				$orderBy='DESC';
				
				$incrementX=+1;
				$incrementY=0;
				break;

			case 'L'://indY
				$whatToSet='indY';
				$orderBy='ASC';
				
				$incrementX=0;
				$incrementY=-1;
				break;

			case 'R'://indY
				$whatToSet='indY';
				$orderBy='DESC';
				
				$incrementX=0;
				$incrementY=+1;
				break;
		}


		$approvalToMove=TRUE;
		$won=FALSE;


		if($brick_id<0) return FALSE; //brick not movable

		for($i=1; $i< ($this->tableH-2) ; $i +=1)
			for($j=1; $j < ($this->tableW-1) ; $j +=1)
		{

			$tempBrick=$this->myTable[$i][$j];

			if($tempBrick->GetId() == $brick_id ){
				//chk if new pos is eligible for curr brick
				if($i +$incrementX <0 || $j+ $incrementY < 0 || $j + $incrementY > ($this->tableW-1)){
					$approvalToMove=FALSE;
					break;
				}
				
				$newPosBrick=$this->myTable[$i +$incrementX ][$j+ $incrementY];

				//brick <> wall collision
				if($newPosBrick->getId() == -1){   
					$approvalToMove=FALSE;
					break;
				}
				//brick <> another (different) brick collision
				elseif(($newPosBrick->getId()!= $tempBrick->getId()) && $newPosBrick->getId()>0 )
				{
					$approvalToMove=FALSE;
					break;
				}
				//brick ( != 10) <> finish line collision
				else if($newPosBrick->getId() == -2 && $tempBrick->getId() !=10){
					$approvalToMove=FALSE;
					break;
				}
				//brick ( == 10) <> finish line collision
				else if($newPosBrick->getId() == -2 && $tempBrick->getId() ==10){
					$won=TRUE;
					
				}

			}
		}
		
		
			
		if(!$approvalToMove) {
			echo "<script>console.log('Move: " . " DENIED". "' );</script>";
			return 0;
		}
		
		if($won){
			return 2;
		}	
		
		//temp table for recording changes
		//must be used , recursive rewrites can happen
		$newTable=$this->myTable;

		for($i=1; $i< ($this->tableH-2) ; $i +=1)
			for($j=1; $j < ($this->tableW-1) ; $j +=1)
			{
				
				$tempBrick=$this->myTable[$i][$j];

				if($tempBrick->GetId() == $brick_id ){
					
					$newTable[$i +$incrementX ][$j+ $incrementY]=$this->myTable[$i][$j];
					
					//if there are no same bricks behind it when moving -> put empty brick there
					if($tempBrick->GetId() != $this->myTable[$i -$incrementX ][$j- $incrementY]->GetId())
						$newTable[$i][$j]=new Brick($i,$j  ,0);

				}
			}	

		$this->myTable=$newTable;	

		$this->pushTableToSession();	
		return 1;



	}
	



};