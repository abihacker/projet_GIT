<?php
    try}{
		$db = new PDO('mysql:host=localhost;dbname=tuto', 'root',  '');
	} catch(PDOexception $e){
		  die('Erreur:' .$e->getMessage());
	}
?>