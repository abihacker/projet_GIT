<?php  
   require 'includes/connect_db.php';
  if (!empty($_FILES)){
	  $file_name = $_FILES['fichier']['name'];
	  $file_extension = strrchr($file_name,".");
	  
	   $file_tmp_name = $_FILES['fichier']['tmp_name'];
	   $file_dest = 'files/' .$file_name;
	   $extension_auth = array( '.pdf' , '.PDF');
	     if (in_array($file_extension, $extension_auth)) {
		     if (move_uploaded_file($file_tmp_name, $file_dest)){
				  $req = $db->prepare('INSERT INTO files(name, file_url) VALUES(?,?)');
				  $req->execute(array($file_name, $file_dest));
			       echo 'fichier envoye avec succes';
			 
		 } else{
			        echo 'une erreur est survenue lore de l envoi du fichier';
		 }
		 } else { 
		        echo 'seuls les fichiers pdf sont autorises';
		 }
  }


?>

<! doctype >
  <html>
      <head>
	     <title> uploader une fichier</title>
		 </head>
	  <form method="POST" enctype = "multipart/form-data">
	     <input type=file name="fichier"><br/>
		 <input type"submit" value="envoyer le fichier">
		 </form>
		 </html>