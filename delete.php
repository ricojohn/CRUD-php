<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'information');

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM list WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alern("Data Deleted")</script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alern("Data Not Deleted")</script>';
    }
}
?>