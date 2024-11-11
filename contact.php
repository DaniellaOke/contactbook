<?php 
include('connection.php');

if (isset($_POST['createTask']) && $_POST ['createTask'] == 'add' ) {
    $title = $_POST['title'];

    $sql = "INSERT INTO contacts (title) VALUES ('$title')";
    $result = mysqli_query($conn, $sql);
    
    $errorMsg = $successMsg = null;

    if ($result) {
        $successMsg = "Task created successfully";
    } else {
        $errorMsg = "Error creating task. Please try again.";
    }

    $redirectUrl = 'index.php';
    if ($successMsg) {
        $redirectUrl .= '?success=' . urlencode($successMsg);
    }
    if ($errorMsg) {
        $redirectUrl .= '?error=' . urlencode($errorMsg);
    }

    header("Location: $redirectUrl");
    exit(); 
}

if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    $id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    $errorMsg = $successMsg = null;

    if ($result) {
        $successMsg = "Task deleted successfully";
    } else {
        $errorMsg = "Error deleting task. Please try again.";
    }

    $redirectUrl = 'index.php';
    if ($successMsg) {
        $redirectUrl .= '?success=' . urlencode($successMsg);
    }
    if ($errorMsg) {
        $redirectUrl .= '?error=' . urlencode($errorMsg);
    }

    header("Location: $redirectUrl");
    exit(); 
    
}

if (isset($_POST['doneTask'])){
    $id = $_POST['id'];
    $status = isset($_POST['status'])? 'Done' : NULL;

    $sql = "UPDATE tasks SET status='$status' WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);

    $errorMsg = $successMsg = null;

    if ($result) {
        $successMsg = "Task updated successfully";
    } else {
        $errorMsg = "Error updating task. Please try again.";
    }

    $redirectUrl = 'index.php';
    if ($successMsg) {
        $redirectUrl .= '?success=' . urlencode($successMsg);
    }
    if ($errorMsg) {
        $redirectUrl .= '?error=' . urlencode($errorMsg);
    }

    header("Location: $redirectUrl");
    exit(); 

    echo $status;
}

?>