<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'information');

$query = "SELECT * FROM list";
$query_run = mysqli_query($connection, $query);

?>

<?php

	if(isset($_POST['Submit']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$age = $_POST['age'];
		$email = $_POST['email'];

		$query = "INSERT INTO list(fname,lname,age,email) VALUES ('$fname','$lname','$age','$email')";
		$query_run = mysqli_query($connection, $query);

		if($query_run)
		{
			header('Location: index.php');
		}
		else
		{
			echo '<script> alert (" Data  Not Saved") </script>';
		}
	}
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title></title>

		<style type="text/css">
			table, th, td {
			  border: 1px solid black;
			}
			table{
				width:100%;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<br />
		<center>
			<form action= "index.php" method="post"> 
				<input type="text" name="fname" placeholder="First Name" required/>
				<input type="text" name="lname" placeholder="Last Name" required/>
				<input type="text" name="age" placeholder="Age" required/>
				<input type="text" name="email" placeholder="Email Address" required/>
				<button name="Submit" style="background: green;">Submit</button>
			</form>
		</center>
		<br />
		<br />
		<table>
			<tr>
				<th>First name</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Email Address</th>
				<th>Action</th>
			</tr>
	<?php
			if($query_run)
			{
				while($row = mysqli_fetch_array($query_run))
				{
					?>
					<tr>
						<td><?php echo $row['fname']; ?></td>
						<td><?php echo $row['lname']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td>
							<form action="update.php" method="post">
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<input type="submit" name="edit" class="btn btn-success" value="EDIT">
							</form>
							<form action="delete.php" method="post">
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<input type="submit" name="delete" class="btn btn-danger" value="DELETE">
							</form>
						</td>
					</tr>
					<?php
				}
			}
			else
			{
				echo "No Record";
			}
	?>
			
			
		</table>
		<script >
	</body>
</html>
