<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$cin = $_POST['cin'];
		$user_id = $_POST['user_id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$nbHeures = $_POST['nbHeures'];
		$tarifHoraire = $_POST['tarifHoraire'];

		// write the update query
		$sql = "UPDATE `employee` SET `cin`='$cin',`nom`='$nom',`prenom`='$prenom',`nbHeures`='$nbHeures',`tarifHoraire`='$tarifHoraire' WHERE `id`='$user_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$cin = $row['cin'];
			$nom = $row['nom'];
			$prenom = $row['prenom'];
			$nbHeures  = $row['nbHeures'];
			$tarifHoraire = $row['tarifHoraire'];
			$id = $row['id'];
		}

	?>
		<h2>Employer Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		  <legend>Informations personnels:</legend>
		    Nom:<br>
		    <input type="number" name="cin" value="<?php echo $cin; ?>">
		    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
		    <br>
		    Prenom:<br>
		    <input type="text" name="nom" value="<?php echo $nom; ?>">
		    <br>
		    Prenom:<br>
		    <input type="text" name="prenom" value="<?php echo $prenom; ?>">
		    <br>
		    Nbheures:<br>
		    <input type="number" name="nbHeures" value="<?php echo $nbHeures; ?>">
		    <br>
		    Traif Horaire:<br>
		    <input type="number" name="tarifHoraire" value="<?php echo $tarifHoraire; ?>">
		    <br><br>
		    <input type="submit" value="Update" name="update">
		  </fieldset>
		</form>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>