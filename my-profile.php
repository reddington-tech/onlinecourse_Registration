<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$studentname=$_POST['studentname'];
$photo=$_FILES["photo"]["name"];
$cgpa=$_POST['cgpa'];
move_uploaded_file($_FILES["photo"]["tmp_name"],"studentphoto/".$_FILES["photo"]["name"]);
$ret=mysqli_query($con,"update students set studentName='$studentname',studentPhoto='$photo' where StudentRegno='".$_SESSION['login']."'");
if($ret)
{
$_SESSION['msg']="Student Record updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Student Record not update";
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
    <title>Student Profile</title>
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
                          Registration details 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($con,"select * from students where StudentRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']);?>" readonly />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']);?>"  placeholder="Student Reg no" readonly />
    
  </div> 
                           
  <div class="form-group">
    <label for="department">Department  </label>
    <input type="text" class="form-control" id="department" name="department" value="<?php echo htmlentities($row['department']);?>" readonly  />
  </div>                         
                           
 <div class="form-group">
    <label for="course">My course </label>
    <input type="text" class="form-control" id="course" name="course" value="<?php echo htmlentities($row['course']);?>" readonly />
  </div>                          
                                   
<div class="form-group">
    <label for="Pincode">Upload New Photo  </label>
    <input type="file" class="form-control" id="photo" name="photo"  value="<?php echo htmlentities($row['studentPhoto']);?>" />
  </div>


  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
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

    </body>
</html>
<?php } ?>
