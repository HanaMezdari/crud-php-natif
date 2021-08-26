<?php 
include "config.php";

//write the query to get data from users table

$sql = "SELECT * FROM employee";

//execute the query

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
	 <!-- to make it looking good im using bootstrap -->
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Employes</h2>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Cin</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>nbHeures</th>
		<th>TarifHoraire</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['cin']; ?></td>
					<td><?php echo $row['nom']; ?></td>
					<td><?php echo $row['prenom']; ?></td>
					<td><?php echo $row['nbHeures']; ?></td>
					<td><?php echo $row['tarifHoraire']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>