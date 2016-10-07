<?php
 session_start();
 
 if(!isset($_SESSION["studentlogin"])){
   header("location:login.php");
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
<!-- <body style="width:500%;overflow-y:scroll;height:70px" >    -->

<body style="background-color:#00BFF3">
     

     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" >
           <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                 <span class="sr-only">Toggle Navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Attendance</a>
           </div>
           <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="nav navbar-nav pull-right" style="color:white">
                 <li class="active"><a href="#" target="_blank">Home</a></li>
                 <li> <a href="#">Profile</a></li>
                               <li id="login" <?php 
                               if(isset($_SESSION["studentname"])){
                               echo 'class="dropdown"';   
                               }
                            ?>  ><a style="color:darkorange;font-size:20px" href="<?php 
                               if(!isset($_SESSION["studentname"]))
                               {
                                   echo"login.php";
                               }
                               else{echo "#";}
                               ?>"
                             <?php  if(isset($_SESSION["studentname"])){
                             echo'  class="dropdown-toggle" data-toggle="dropdown"  ';} 
                               ?> >
                               <?php 
							 if(isset($_SESSION["studentname"])){
								 echo $_SESSION["studentname"];
								 
							 }
							 else{
								 echo "Log In";
							 } 
                             	 if(isset($_SESSION["studentname"])){
                            echo ' <b class="caret"></b>' ;
                                  }
                                 ?> </a>
                             <ul class="dropdown-menu">
                       
                       <li><a href="logout.php">Log Out</a></li>
                    </ul>
                    </li>
             
                 <li><a href="#" id="showTime"></a></li>
              </ul>
           </div>
        </div>
     </nav>


<div class="container" style="margin-top:6%">
    <div style="float:left;width:50%">

    <?php
       
    $conn = mysqli_connect("localhost","root","","college_attendance");
    $roll = $_SESSION["rollno"];
    $query = "select * from attendance where roll_no = '$roll'";
    $result = mysqli_query($conn,$query);
    $date = date("d-m-Y");
    while($row = mysqli_fetch_assoc($result)):
        
?>
     
 
     <form class="form-horizontal" method="post" role="form" style="margin-top:8%" >
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Name</label>
          <div class="col-sm-6">
            <label  class="control-label col-sm-8" name="uname" id="uname" ><?php echo $row["full_name"]; ?></label> 
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="rollNo">Roll Number</label>
            <label class="control-label col-sm-4" name="rollNo" id="rollNo"><?php echo $row["roll_no"] ?></label>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="date">Date</label>
          <label class="control-label col-sm-4" id="date"><?php echo $date; ?></label>
        </div>
     
        <div class="form-group">
          <label class="control-label col-sm-4" for="lecture">Lecture</label>
          <label class="control-label col-sm-4" id="lecture" ></label>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4" for="time">Time</label>
          <label class="control-label col-sm-4" id="time"></label>
        </div>
        <button class="btn btn-primary col-md-offset-5" type="submit" name="submit" id="submit">Submit</button>
     
    </div>
    
    
    <div style="float:right;margin-top:2%;width:30%">
        <div class="form-group"> 
          <label class="control-label" id="totalAttendance" for="totalAttendance">Total Attendance:</label>
          <label class="control-label" name="totalAttendance" id="totalAttendance"> <?php echo $row["total_attendance"]; $total = $row["total_attendance"]+1; ?> </label>
        </div>
      </form>
    </div>
    <?php  endwhile;

        if(isset($_POST["submit"])){

          $query = "update attendance SET total_attendance= '$total' ";
          mysqli_query($conn,$query);

        }

    
     ?>
    </div>
     <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/script.js"></script>
     
 </body>
</html>