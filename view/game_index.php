<?php 
require_once __DIR__ . '/_header.php'; 


?>

<table class="playTable">
	<?php 
        



        foreach ( $brickList as $red)
        {
            echo '<tr>';
            foreach ($red as $key => $value)
            {
                if($value->local_id == -1){
                    echo '<td class="wall" >Z</td>' ; 
                    
                }
                elseif($value->local_id == -2){
                    echo '<td class="win" >X</td>' ;
                }
    
                elseif($value->local_id == 0){
                    echo '<td class="empty" >.</td>' ;
                }
                else{
                    echo '<td class="brick cl' . $value->local_id . ' '.  $value->cssEnums .'"  >' .$value->local_id. '</td>' ;
                }
                
                
            }
            echo '</tr>'; 
            echo "\r\n";
        }

		


        
	?>
</table>
<br>
<div class="infoBar">
	<br> Vrati se na <a href="index.php?rt=start">početak</a>.<br><br>
	
	Igrač: <?php echo $player; ?> trenutno igra <br>
    Igrač je dosad napravio: <?php echo $steps;?> koraka. <br><br>
    <form method="post" action="index.php?rt=game/read">
        Pomakni block broj:
        <input type="number" name="block_num" />
        prema
        <select name="move_dir" >
            <option value="U">gore</option>
            <option value="D">dolje</option>
            <option value="L">lijevo</option>
            <option value="R">desno</option>
        </select>
        <button type="submit">Izvrši</button>
    </form>

    <form method="post" action="index.php?rt=game/erase">
        Izbriši block broj:
        <input type="number" name="block_num" />
        
        <button type="submit">Izvrši</button>
    </form>
	<br>
	Zadnji pomak: <?php echo $actionDesc; ?>
    <?php
    if($hasWarning){
        require_once __DIR__ . '/addons/_warning.php';
    }
    ?>
</div>






<?phprequire_once __DIR__ . '/_footer.php'; ?>