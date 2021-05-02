<?php 
require_once __DIR__ . '/_header.php'; 
?>

<div class="playerInput">
	<b>Nova igra</b><br><br>
	<form method="post" action="index.php?rt=game/startGame">
		
		Ime igrača:
		<input type="text" name="player" /> 
		<br>

		<input checked type="radio" name="dificulty" value="1"> <label for="male"  >Lagano 5x4</label><br>
		<input         type="radio" name="dificulty" value="2"> <label for="female">Srednje 5x4</label><br>
		<input         type="radio" name="dificulty" value="3"> <label for="other" >Teško  6x6</label><br>
		
		<button type="submit">KRENI</button>
		
	</form>
</div>


