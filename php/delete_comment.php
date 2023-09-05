<?php
// Veryfing that ID have been recieved by POST method
if (isset($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];

    // connection to the database
    $connection = mysqli_connect("localhost", "root", "", "my_test");

    // Execute sql DELETE query with the recieved id
    $sql = "DELETE FROM Comments WHERE id = $comment_id";
    if (mysqli_query($connection, $sql)) {
        // Comment was deleted successfully
        header("Location: ../index.php"); // Back to page
        exit();
    }
    else
    {   // Error deleting
        echo "Error appeared deleting comment: " . mysqli_error($connection);
    }

    // Closing connection with database
    mysqli_close($connection);
} 
else 
{
    echo "ID have not been recieved";
}
?>

