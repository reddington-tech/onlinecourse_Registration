<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{



if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from students where StudentRegno = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Student record deleted !!";
      }

     if(isset($_GET['pass']))
      {
        $password="pass123";
        $newpass=md5($password);
              mysqli_query($con,"update students set password='$newpass' where StudentRegno = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Password Reset. New Password is pass123";
      } 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Course</title>
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
                 
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Students
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reg No </th>
                                            <th>Student Name </th>
                                             <th>Reg Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from students");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['StudentRegno']);?></td>
                                            <td><?php echo htmlentities($row['studentName']);?></td>
                                            <td><?php echo htmlentities($row['creationdate']);?></td>
                                            <td>
                                            <a href="edit-student-profile.php?id=<?php echo $row['StudentRegno']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
<a href="manage-students.php?id=<?php echo $row['StudentRegno']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
<a href="manage-students.php?id=<?php echo $row['StudentRegno']?>&pass=update" onClick="return confirm('Are you sure you want to reset password?')">
<button type="submit" name="submit" id="submit" class="btn btn-default">Reset Password</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                        
                            </div>
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
