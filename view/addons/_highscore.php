<div class="highscore">
	<table>
		<tr>	
		<th>Name</th>
		<th>Moves</th>
		<th>Cheated</th>
		<th>Level</th>
		<th>Date</th>
	    </tr>
		<?php 
			
		foreach ( $playerList as $red)
		{
			echo '<tr>' .
			     '<td>' . $red->name . '</td>' .
			     '<td>' . $red->score . '</td>' .
				 '<td>' . ($red->cheated?'YES':'NO') . '</td>' .
				 '<td>' . $red->level . '</td>' .
				 '<td>' . $red->date . '</td>' .
			     '</tr>';
			
		}

		?>
	</table>

</div>