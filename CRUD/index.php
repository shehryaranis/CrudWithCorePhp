<?php include('phpCode.php');

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;

	$record =  mysqli_query($conn,"SELECT * FROM info WHERE id=$id");

	if (count($record) == 1 ) {
		$n = mysqli_fetch_array($record);
		$name = $n['name'];
		$address = $n['address'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<table>
	<thead>
		<tr>
			<th>id</th>
			<th>Name</th>
			<th colspan="2" >Address</th>

		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT id, name, address FROM info";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
		echo'<tr>';	
		echo '<td>'.$row['id'].'</td>';
		echo '<td>'. $row['name'].'</td>';
		echo '<td>'. $row['address'].'</td>';
		echo '<td><a href="index.php?edit='.$row['id'].'">Edit</a></td>';
		echo '<td><a href="index.php?del='.$row['id'].'">Delete</a></td>';
		echo '</tr>';
		}
	} else {
		echo "0 results";
	}
	?>
	
			
		
	</tbody>
</table>
	<form method="post" action="phpCode.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
			<button class="btn" type="submit" name="update" >update</button>
		</div>
	</form>
</body>
</html>