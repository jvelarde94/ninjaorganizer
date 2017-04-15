<?php //educational.php
include("check.php"); //must be logged in
include("connect.php"); //connect to database
 if(isset($_POST['edit']))
     {
     $k=0;
     if($_POST['count']==0)
     {
       
     }
    else
    {
      
     
       for ($j = 0; $j <= $_POST['count'] ; $j++) 
    {
       
        if(isset($_POST['check'.$j]))
      {
         $id_goal=$_POST['id'.$j];
        $k++;
      }
    }
    if($k<1)
    {
      
    }
    else
    {
      header('location:http://ninajaorganizer.com/update.php?id='.$id_goal.'&type=educational');


    }
    }
     }
?>

<!DOCTYPE html>
<html>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
 <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

   <!-- Site Properties -->
  <title>Educational Goals</title>
  <link rel="stylesheet" type="text/css" href="dist/semantic.css">

  <script src="dist/assets/library/jquery.min.js"></script>
  <script src="dist/semantic.js"></script>
  
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script>
  $( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
        });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );
  </script>
  
<style>
  table {word-wrap: break-word;}
</style>
</head>
<body>


  
           
  
 <div class="ui fixed pink inverted menu">
    <div class="ui container">
      <a href="home.php" class="header item">
        <!--<img class="logo" src="assets/images/logo.png">-->
                    Ninja Organizer
      </a>
      <a href="home.php" class="item">Home</a>
      <a href="educational.php" class="item">Educational</a>
      <a href="professional.php" class="item">Professional</a>
      <a href="personal.php" class="item">Personal</a>
      <a href="account.php" class="item">My Account</a>
      <a href="logout.php" class="item">Logout</a>
         <a href="account.php" class="header item">
        <div class="logo"> <?php 
    
    //****************************SELECT Profile PHOTO***********************************
    $sql = "SELECT Image FROM users WHERE username = '$login_user' LIMIT 1";
    $result = mysqli_query($conn,$sql);
  
    if ($result)
     {
        $row = mysqli_fetch_assoc($result);
        $imageLocation = $row['Image'];
        echo "<img width = '27' height ='27'  src='$imageLocation'>";
    }
    else 
     {
      echo "An error occurred: " . mysqli_error(); // Otherwise display the error   
    } 
    ?>
  
      </div></a>
     
      

    
    </div>
  </div>
  <br><br>

<h1 class="ui center aligned header">Educational Goals</h1>
<div class="ui container">
  
  <div class="ui relaxed divided items">
    <div class="item">
     
      <div class="content">
        <a class="header">Enter a Goal</a>
        <div class="meta">
          <form class="ui form" action="educational.php" method="post" accept-charset="utf-8">
  <div class="field">
    <label>Goal</label>
    <input type="text" name="goalTitle" value="" placeholder="Goal">
  </div>
  <div class="field">
    <label>Description</label>
    <input type="text" name="description" placeholder="Description">
  </div>
  <div class="field">
    <label>Date</label>
    <input type="text" name="dueDate" value="" placeholder="Due Date" id="datepicker">
  </div>
  
  <div class="field">
    <div class="ui checkbox">
      <input type="checkbox" name="MailOn" value="false">
      <label>I want E-mail Notifications</label>
    </div>
  </div>
  <div class="field">
    <label>Mail Notifications Delay</label>
    <select name="delay">
    <option value="12" >12 hrs before due date</option>
    <option value="24" >1 day before due date</option>
    <option value="48" >2 days before due date</option>
    <option value="120" >5 days before due date</option>
  </select>
  </div>
  
  <button class="ui button" type="submit" name="enterGoal">Enter Goal</button>
  <button class="ui button" type="submit" name="showGoals">Show My Educational Goals</button>
</form>
        </div>
      </div>
    </div>
    <div class="item">
      
      <div class="content">


        <div class="meta">
                  

<?php
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
        $goalerror = "<center>*Goal Title field is blank.*</center>";
        $error++;
        echo $goalerror, "<br>";
    }

    //validate Description field
    if (empty($_POST['description']))
    {
        $descerror = "<center>*Description field is blank.*</center>";
        $error++;
        echo $descerror, "<br>";
    }

    //validate duedate field
    if (empty($_POST['dueDate']))
    {
        $dueerror = "<center>*Due Date field is blank.*</center>";
        $error++;
        echo $dueerror, "<br>";
    }
}

include 'loginSP.php';




  if(isset($_POST['enterGoal']) && !empty($_POST['goalTitle'])&& !empty($_POST['description']) && !empty($_POST['dueDate'])) //insert data into table if enter goal is clicked
    {
        $user = $_SESSION['username'];
        $goal = $_POST['goalTitle'];
        $desc = $_POST['description'];
        $due = $_POST['dueDate'];
        $goalType = 'Educational';
    $delay=$_POST['delay'];
        $aposGoal = mysqli_real_escape_string($conn, $goal); //ALLOW APOSTROPHES IN SQL GOAL TITLE INPUT
        $aposDesc = mysqli_real_escape_string($conn, $desc); //ALLOW APOSTROPHES IN SQL DESCRIPTION 
    if (isset($_POST['MailOn'])) 
    {
           $MailOn=1;
    }
    else
    {
      $MailOn=0;
    }
        $sql = "INSERT INTO `goals`(`username`, `title`, `description`, `dueDate`, `goalType`,`MailNotif`,`NotifOn`,`Notiftime`) VALUES ('$user','$aposGoal','$aposDesc','$due','$goalType','no',$MailOn,$delay);";
        $result = mysqli_query($conn, $sql); //insert date
        echo "<div class='ui blue message'>Goal Entered Successfully</div>";
        
    }
   else if(isset($_POST['enterGoal']))
    {
    echo "<center><big> No goal entered. </big></center>";
    }
   if(isset($_POST['edit']))
     {
     $k=0;
     if($_POST['count']==0)
     {
       echo "<div class='ui red message'>To edit, please select only one goal</div>"; 
     }
    else
    {
      
     
       for ($j = 0; $j <= $_POST['count'] ; $j++) 
    {
       
        if(isset($_POST['check'.$j]))
      {
         $id_goal=$_POST['id'.$j];
        $k++;
      }
    }
    if($k<1)
    {
      echo "<div class='ui red message'>To edit, please select only one goal.</div>"; 
    }
    
    }
     }
    if(isset($_POST['Delete']))
    {
    
       for ($j = 0; $j <= $_POST['count'] ; $j++) {
       
        if(isset($_POST['check'.$j]))
      {
         $id_goal=$_POST['id'.$j];
         $SQLselect = "delete from goals WHERE id_goal = '$id_goal';";  //delete the selected goal
        mysqli_query($conn, $SQLselect);//execute the delete query
        echo "<div class='ui red message'>Goal Deleted</div>"; 
      }
    }
    }
    if(isset($_POST['save']))
    {
        //get the values
        $id_goal=$_POST['id_goal'];
        $id_type=$_POST['goalType'];
        $title=$_POST['goalTitle'];
        $description=$_POST['description'];
        $dueDate=$_POST['dueDate'];
        $title = mysqli_real_escape_string($conn, $title); //ALLOW APOSTROPHES IN SQL GOAL TITLE INPUT
        $description= mysqli_real_escape_string($conn, $description); //ALLOW APOSTROPHES IN SQL DESCRIPTION INPUT
         $SQLselect = "UPDATE goals set title='$title', description= '$description',  dueDate='$dueDate' WHERE id_goal = '$id_goal';";  //update goal with the new data ID GOAL IS NOT PUT INTO THE UPDATE

         mysqli_query($conn, $SQLselect);//execute the update query
         echo "<div class='ui pink message'>Goal Updated</div>"; 
        
    }

    if(isset($_POST['showGoals']) || isset($_POST['save']) || isset($_POST['delete'])) // show info in table if show goals button is clicked
    {
        $user = $_SESSION['username'];
        $goalType = 'Educational';
        $SQLselect = "SELECT id_goal,title, description, dueDate FROM goals WHERE username = '$user' AND goalType = '$goalType';"; //display info in table
        $result1 = mysqli_query($conn, $SQLselect); //select the data

         //**************Display the chart****************

        echo '<form method="POST"><table class="ui fixed selectable inverted table">
  <thead>
            <tr>
            <th></th>
            <th>Goal Title</th>
            <th>Description</th>
            <th>Due Date</th>

            </tr></thead><tbody>';
       $i=0;
     while ($row = mysqli_fetch_row($result1))
        {
        
            echo '<tr><td class="collapsing">
        <div class="ui fitted checkbox">
          <input type="checkbox" name= "check'.$i.'"><label></label>
       <input type="hidden" name= "id'.$i.'" value="'.$row[0].'">
        </div>
      </td>';
          echo "<td>".$row[1]."</td>";
          echo "<td>".$row[2]."</td>";
          echo "<td>".$row[3]."</td>";
       
       
        echo "</tr>";
    $i++;
        }
      
     echo '<input type="hidden" name= "count" value ="'.$i.'" >';
    echo"</tbody><tfoot >
    <tr>
      <th></th>
      <th><div>
           
    <button type = 'submit' class='ui button'
     name='edit' value ='Edit' id='opener'>Edit</button>
     
        </div></th>
      
        
        <th><div> 
        <input type = 'submit' class='ui button'
  name='Delete' value ='Delete'/>
        </div></th>
        
        <th><div></div></th>
      
    </tr>
    </tfoot></table></form>";

      }//close table bracket
      
  
       

  

         
?>   
         
        </div>
      </div>
    </div>



    </div>
  </div>



<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/ninquery.js"></script>



</body>
</html>



 