<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$studentname=$_POST['studentname'];
$studentregno=$_POST['studentregno'];
$password=md5($_POST['password']);
$department = $_POST['department'];
$course = $_POST['course'];
$ret=mysqli_query($con,"insert into students(studentName,StudentRegno,password,department,course) values('$studentname','$studentregno','$password','$department','$course')");
if($ret)
{
$_SESSION['msg']="Student Registered Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Student  not Register";
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Student Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="icon" href="assets/img/icon.png" type="image/x-icon">
</head>

<body>
<header id="header">
			<div class="innertube">
                <?php include('includes/header.php');?>
			
			</div>
		</header>
				
		<main>
			<div class="innertube">
				
            <div class="row">
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" placeholder="Student Name" required />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" onBlur="userAvailability()" placeholder="Student Reg no" required />
     <span id="user-availability-status1" style="font-size:12px;">
  </div>



<div class="form-group">
    <label for="password">Password  </label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
  </div>  

<div class="form-group">
    <label for="department">Department  </label>
    <select class="form-control" name="department" required="required">
   <option value="">Select Depertment</option>   
   <?php 
$sql=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['department']);?>"><?php echo htmlentities($row['department']);?></option>
<?php } ?>

    </select> 
  </div> 

<div class="form-group">
    <label for="Course">Course  </label>
    <select class="form-control" name="course" id="course" onBlur="courseAvailability()" required="required">
   <option value="">Select Course</option>   
   <?php 
$sql=mysqli_query($con,"select * from course");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['courseName']);?>"><?php echo htmlentities($row['courseName']);?></option>
<?php } ?>
    </select> 
    <span id="course-availability-status1" style="font-size:12px;">
  </div>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button>
     </div>
    
                            </div>
                            </form>
                            </div>
                </div>
                </div>
            </div>
            </div>
        </main>
    

		<nav id="nav">
			<div class="innertube">
                <?php include('includes/menubar.php');?>
			</div>
		</nav>	
		
		<footer id="footer">
			<div class="innertube">
				<?php include('includes/footer.php');?>
			</div>
		</footer>	
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'regno='+$("#studentregno").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
    </body>
</html>
<?php } ?>
