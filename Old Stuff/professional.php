<?php
include("check.php");
include("connect.php");

//error variables
$goalerror = "";
$descerror = "";
$dueerror = "";
//$nomatch = "";
$error = 0;

if (isset($_POST['enterGoal']))
{
    //validate Goal field
    if (empty($_POST['goalTitle']))
    {
        $goalerror = "**Goal Title field is blank.**";
        $error++;
        echo $goalerror, "<br>";
    }

    //validate Description field
    if (empty($_POST['description']))
    {
        $descerror = "**Description field is blank.**";
        $error++;
        echo $descerror, "<br>";
    }

    //validate duedate field
    if (empty($_POST['dueDate']))
    {
        $dueerror = "**Due Date field is blank.**";
        $error++;
        echo $dueerror, "<br>";
    }

    $goal = $_POST['goalTitle'];
    $desc = $_POST['description'];
    $due = $_POST['dueDate'];

    $sql = "INSERT INTO test (goalTitle , description, dueDate) VALUES ('$goal', '$desc', '$due');";
    $result = mysqli_query($conn, $sql);
 
}

?>