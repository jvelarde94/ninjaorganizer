<?php
		include("connect.php"); 
        
		
	    $SQLselect = "SELECT g.id_goal,g.username, g.title, g.description, g.dueDate, g.goalType,u.email,g.Notiftime FROM goals g,users u WHERE g.username=u.username and g.MailNotif='no'  and g.NotifOn=1";
	    $result1 = mysqli_query($conn, $SQLselect);
        echo $SQLselect;


     	
   	 while ($row = mysqli_fetch_row($result1))
    	{
		
		$format = 'm/d/Y H:i:s';
		//$DueDate = DateTime::createFromFormat($format, $row[4].' 00:00:00');
		$date=date("m/d/Y H:i:s");
		echo $date;
		$TodayDate = date('m/d/Y H:i:s',strtotime('+'.$row[7].' hours', strtotime($date)));
	
	    $Duedate_object = new DateTime( $row[4].' 00:00:00' ); 
		$Duedate_object = $Duedate_object->format('YmdHis'); 
		$Today_object = new DateTime( $TodayDate ); 
		$Today_object = $Today_object->format('YmdHis');
		echo $Duedate_object .'/////'. $Today_object.'////'.$row[2].'</br>';
		if( $Duedate_object < $Today_object )
		{
			
		
		$SQLupdate="update goals set MailNotif='yes' where id_goal=".$row[0]; 
		mysqli_query($conn, $SQLupdate);
		
		require 'mail/PHPMailerAutoload.php';
		$mail = new PHPMailer; 
 
		$mail->isSMTP();                                      
		$mail->Host = 'mail.ninajaorganizer.com';                      
		$mail->SMTPAuth = true;                              
		$mail->Username = 'ninjamailadmin@ninajaorganizer.com';                 
		$mail->Password = "ninja999";              
                     
		$mail->Port = 25;                                    
		$mail->setFrom('ninjamailadmin@ninajaorganizer.com', 'Ninja Ninja');     
		
		$mail->addAddress($row[6]);              

		$mail->Subject = 'Hi '.$row[1];
		$mail->Body    =" your ". $row[5]." goal ". $row[2]." is comming up on ". $row[4].", Goal Description :".$row[3];
		if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		
		}
		echo 'Message has been sent';
		}
		}
		
		
		$SQLselect = "SELECT g.id_goal,g.username, g.title, g.description, g.dueDate, g.goalType,u.email,g.Notiftime FROM goals g,users u WHERE g.username=u.username and g.FirstMailNotif<>'yes' ";
	    $result1 = mysqli_query($conn, $SQLselect);
        echo $SQLselect;


     	
   	 while ($row = mysqli_fetch_row($result1))
    	{
		
		
		$SQLupdate="update goals set FirstMailNotif='yes' where id_goal=".$row[0]; 
		mysqli_query($conn, $SQLupdate);
		
		require 'mail/PHPMailerAutoload.php';
		$mail = new PHPMailer; 
 
		$mail->isSMTP();                                      
		$mail->Host = 'mail.ninajaorganizer.com';                      
		$mail->SMTPAuth = true;                              
		$mail->Username = 'ninjamailadmin@ninajaorganizer.com';                 
		$mail->Password = "ninja999";              
                     
		$mail->Port = 25;                                    
		$mail->setFrom('ninjamailadmin@ninajaorganizer.com', 'Ninja Ninja');     
		
		$mail->addAddress($row[6]);              

		$mail->Subject = 'Hi '.$row[1];
		$mail->Body    =" you added a new ". $row[5]." goal ". $row[2]." is comming up on ". $row[4].", Goal Description :".$row[3];
		if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		echo 'Message has been sent';
		}

		
		
		  
?>