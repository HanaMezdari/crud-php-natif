<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$cin = $_POST['cin'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$nbHeures = $_POST['nbHeures'];
		$tarifHoraire = $_POST['tarifHoraire'];

		//write sql query

		$sql = "INSERT INTO `employee`(`cin`, `nom`, `prenom`, `nbHeures`, `tarifHoraire`) VALUES ('$cin','$nom','$prenom','$nbHeures','$tarifHoraire')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>    
<body>
<div class="container">
<h2>Inscription</h2>

<form action="" method="POST" >
  <fieldset>
    <legend>Personal information:</legend>
    Cin:<br>
    <input type="number" name="cin">
    <br>
    Nom:<br>
    <input type="text" name="nom">
    <br>
    Prenom:<br>
    <input type="text" name="prenom">
    <br>
    NbHeures:<br>
    <input type="number" name="nbHeures">
    <br>
    TarifHoraire:<br>
    <input type="number" name="tarifHoraire">
    <br><br>
    <input class="btn btn-info" type="submit" name="submit" value="Envoyer">
  </fieldset>
</form>
</div>
</body>
</html>