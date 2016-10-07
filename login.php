<?php 
session_start(); 
if(isset($_SESSION["studentlogin"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="UTF-8">
   <title>Attendance</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <script type="text/javascript" src="bootstrap.min.js"></script>
 </head>

    <body style="background-color:#00BFF3">

        <div class="container" style="padding:0px" >
			
		<div class="col-sm-4 col-sm-offset-4">
			 <div class="panel panel-default" >
				 <div style="background-color:black;color:white;padding:3%" class="panel-heading">
					 <h3  class="panel-title text-center">Log In</h3>
				 </div>
				 <div class="panel-body">
			         <form method="POST" class="form" role="form" >
						  <div class="form-group">
							 <label class="control-label"for="rollno">Roll Number</label>
					         <input type="text" class="form-control" name="rollno" id="rollno" placeholder="Roll Number" required></input>
						 </div>
						 
	                     <div class="form-group">
							 <label for="password">Password</label>
					         <input type="password" class="form-control" name="password" id="password" placeholder="Password" required></input>
						 </div>

                         <div class="form-group">
							 <label for="password">Code</label>
					         <input type="text" class="form-control" name="code" id="code" placeholder="Code" required></input>
						 </div>
											 
	
	                 <?php
	                    if((isset($_POST["rollno"]) && isset($_POST["password"])) ){
			                $rollno= $_POST["rollno"];
			                $password = $_POST["password"];
                            $code= $_POST["code"];

                            $conn = mysqli_connect("localhost","root","","college_attendance");
                            $query = "select * from login where roll_no = '$rollno' AND student_password = '$password'" ; 			
                            $query1 = "select * from code where login_code= '$code'";

                            $result= mysqli_query($conn,$query);
                            $result1= mysqli_query($conn,$query1);
                            if((mysqli_num_rows($result)>0) && (mysqli_num_rows($result1)>0)){
                                $studentdata= mysqli_fetch_assoc($result);
                                
                                $_SESSION["studentlogin"] = "yes";
                                $_SESSION["studentname"] = $studentdata["student_name"];
                                $_SESSION["rollno"] = $studentdata["roll_no"];
                                
                                header("location:index.php");
                            }
                            else echo "fail";
                          
                          //  $servername= "localhost";
			              //  $connectionoptions= array("Database"=>"aptitude", "Uid"=>"root","pwd"=>"123password,./");
			             /*   
							if($username=="JMCJBP" && $password == "smartjabalpur")
							{
								header("location: nrjjmcdashboard.php");
									$_SESSION["nrjjmclogin"] = "yes";
							}
							
							else{
								echo '<p class="h2" style="color:red"> Login Failed</p>';
							}
                           */ 
		                 }	 
	?>
	
						 	 <button type="submit" name="insert" class="btn btn-primary col-sm-offset-5 col-md-offset-5" style="background-color:orange">Log In</button>
					 </form>
			     </div>
			</div>		 
		</div>
     </div>
	 </div>
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/script.js"></script>
        
    </body>
</html>
