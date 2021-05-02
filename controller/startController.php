<?php

require_once __DIR__ . '/../model/playerservice.class.php';

class StartController
{
	public function index() 
	{
		session_start();

		$ps = new PlayerService();
		$playerList = $ps->getAllPlayers();

        $title = 'Početna stranica';
		//$userList = $ls->getAllUsers();

		require_once __DIR__ . '/../view/start_index.php';

		if(isset( $_SESSION["player_name"] )){
			$player=$_SESSION["player_name"];
			$steps=$_SESSION["steps"];
			require_once __DIR__ . '/../view/addons/currentGameOption.php';
		}

		require_once __DIR__ . '/../view/addons/_highscore.php';
		

		require_once __DIR__ . '/../view/_footer.php';
	}

	public function won() {
		session_start();
		$ps = new PlayerService();

		if(isset( $_SESSION["player_name"]) && isset($_SESSION['won'])){
			$ps->update($_SESSION['won']);

		}
		session_destroy();
		
		$warning="You won!";
		$hasWarning=TRUE;
		$warningType ="success";
		
		
		$ps = new PlayerService();
		$playerList = $ps->getAllPlayers();

        $title = 'Početna stranica';
		//$userList = $ls->getAllUsers();

		require_once __DIR__ . '/../view/start_index.php';

		require_once __DIR__ . '/../view/addons/_highscore.php';
		
		require_once __DIR__ . '/../view/addons/_warning.php';
		require_once __DIR__ . '/../view/_footer.php';
		
		
		

		
		exit();


	}
}; 

?>