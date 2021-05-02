<?php 

require_once __DIR__ . '/../model/brickservice.class.php';
require_once __DIR__ . '/../model/playerservice.class.php';


class GameController
{
	protected $bs;
	protected $player,$level,$steps,$cheated;
	
	private function init($newGame=FALSE , $level=1){
		session_start();
		$this->bs=new BrickService($newGame,$level);
	}
	
	private function readFromSession(){
		
		$this->player=$_SESSION["player_name"];
		$this->level= $_SESSION["level"];
		$this->steps= $_SESSION["steps"];
		$this->cheated= $_SESSION["cheated"];
	}
	
	private function pushToSession($name,$level,$steps,$cheated){
		$_SESSION["player_name"]=$name;
		$_SESSION["level"]=$level;
		$_SESSION["steps"]=$steps;
		$_SESSION["cheated"]=$cheated;
		
		
	}
	
	
	public function index() 
	{
		$this->init();
		
		$this->readFromSession();

		//local vars
		$player=$this->player;
		$level=$this->level;
		$steps=$this->steps;
		$cheated=$this->cheated;
		
		$actionDesc= '/';
		
		$title = 'Igra';
		$hasWarning=FALSE;
		
		$brickList = $this->bs->getAllBricks();
		
		require_once __DIR__ . '/../view/game_index.php';
	}

	//reads input from the player
    public function read() 
	{
		$this->init();
		

		

		if( !isset( $_POST['block_num'] ) || !preg_match( '/^[0-9]+$/', $_POST['block_num'] ) )
		{
			header( 'Location: index.php?rt=game');
			exit();
		}

		$hasWarning=FALSE;
		$warning="";
		$warningType ="alert";

		$move=$this->bs->moveBricks( $_POST['block_num'] , $_POST['move_dir'] );
        if(!$move){
			$warning="Illegal move.";
			$hasWarning=TRUE;
		}elseif($move==2){
			$_SESSION["won"]=new Player(1,$_SESSION["player_name"],$_SESSION["steps"],$_SESSION["cheated"],null,$_SESSION["level"]);
			header( 'Location: index.php?rt=start/won');
			exit();
		}
		else{
			$_SESSION["steps"]=$_SESSION["steps"]+1;
		}
        
		$this->readFromSession();
		//local vars
		$player=$this->player;
		$level=$this->level;
		$steps=$this->steps;
		$cheated=$this->cheated;
		
		
		$actionDesc= 'Pomakni ' . $_POST['block_num'] . ' prema ' .  $_POST['move_dir'];
		$title = 'Igra  Težina:' . $level;
		
		$brickList = $this->bs->getAllBricks();
		
		require_once __DIR__ . '/../view/game_index.php';
	}

	public function erase() 
	{
		$this->init();

		$hasWarning=FALSE;
		$warning="";
		$warningType ="alert";
		if( !isset( $_POST['block_num'] ))
		{
			header( 'Location: index.php?rt=game');
			exit();
		}

        if(!$this->bs->eraseBricks( $_POST['block_num'] ) || !preg_match( '/^[1-9]$/', $_POST['block_num'] )){
			$warning="Illegal erase.";
			$hasWarning=TRUE;
			$warningType ="alert";
		}
		else{
			//$_SESSION["steps"]=$_SESSION["steps"]+1;
		}
		
		$this->readFromSession();
		
		//local vars
		$player=$this->player;
		$level=$this->level;
		$steps=$this->steps;
		$cheated=$this->cheated;
		
		$actionDesc= 'Izbriši ' . $_POST['block_num'];
		
		$title = 'Igra  Težina:' . $level;
		
        $brickList = $this->bs->getAllBricks();
	
		require_once __DIR__ . '/../view/game_index.php';
	}

	public function startGame() //inits when player inputs his name on 'start' route
	{
		$tempP;
		if(!isset( $_POST['player']) || $_POST['player']==""){
			$tempP = "player 1";
			
			
		}else{
			$tempP=$_POST['player'];
			
		}
		
		$level=$_POST['dificulty'];
			
		
		$this->init(TRUE,$level);

		$this->pushToSession($tempP ,$level, 0, 0  );
		
		$this->readFromSession();
		
		//local vars
		$player=$this->player;
		$level=$this->level;
		$steps=$this->steps;
		$cheated=$this->cheated;
		
		$actionDesc= 'Početak.';
		
		$title = 'Igra  Težina:' . $level;
		$hasWarning=FALSE;

        $brickList = $this->bs->getAllBricks();

		require_once __DIR__ . '/../view/game_index.php';
	}

	
}; 

?>
