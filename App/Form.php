<?php 

namespace App;

class Form 
{
	
	static function InsertForm(){
		?>
		    Un nouvel événement ?
    <form method="post" action="insert.php">
        <label for="title">Titre :</label>
        <input id="title" type="text" name="title">
        <label for="description">Description (optionnel) :</label>
        <input id="description" type="text" name="description">
        <label for="date">Date :</label>
        <input id="date" type="date" name="date">
        <input type="submit" value="Ajouter">
    </form>
    <?php 
	}
}