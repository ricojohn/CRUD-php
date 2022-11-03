<?php 
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'information');

$id = $_POST['id'];

$query = "SELECT * FROM list WHERE id ='$id' ";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
    while($row = mysqli_fetch_array($query_run))
    {
        ?>
       
        <center>
        <h2>EDIT </h2>
			<form action= "" method="post"> 
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
				<input type="text" name="fname" value="<?php echo $row['fname']?>" placeholder="First Name" />
				<input type="text" name="lname" value="<?php echo $row['lname']?>" placeholder="Last Name" />
				<input type="text" name="age" value="<?php echo $row['age']?>" placeholder="Age" />
				<input type="text" name="email" value="<?php echo $row['email']?>" placeholder="Email Address" />
				<button type="submit"name="Update" style="background: green;">Update</button>
                <a href="index.php"> Back </a>
			</form>
		</center>

            <?php
            if(isset($_POST['Update']))
            {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];

                    $query = "UPDATE list SET fname='".$fname."', lname='$lname', age='$age', email='$email' WHERE id = '$id'";
                    $query_run = mysqli_query($connection, $query);

                    if($query_run)
                    {
                        echo '<script> alern("Update")</script>';
                        header('Location: index.php');
                    }
                    else{
                        echo '<script> alern("Not Update")</script>';
                    }
            }
            ?>

        <?php
    }

}
else{
    echo '<script> alern("No Record ")</script>';
}

?>