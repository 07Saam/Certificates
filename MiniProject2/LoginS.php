<?php  
session_start();
    include "../inc/dbinfo.inc"; 
                if(!$conn)
                {
                    die ("Error error".mysql_error());                
                }     
                if(isset($_POST['submit']))
                {
                    $Mobile =$_POST['mobile'];
                    $Pass=$_POST['pass'];
                    $sql="Select Stu_Id from student where mobile='$Mobile' && password='$Pass';";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                   {
                    while ($row = $result->fetch_assoc()){
                    
                    $_SESSION['Stu_Id'] = $row['Stu_Id'];
                    }
                    header("Location:/MiniProject2/View.php");
                    exit();
                }
                    else{
                        echo "Wrong Password Or Mobile Number";
                        header("Location:/MiniProject2/LoginS.php");
                        exit();
                    }
                   }
                   else
                   {
                    echo "Error:  <br>" . $conn->error;
                   } 
                
 ?>