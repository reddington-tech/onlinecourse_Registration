<div class="form-group"><?php $sql=mysqli_query($con,"select * from students where StudentRegno='".$_SESSION['login']."'");
    $cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>
    <label for="Pincode"></label>
   <?php if($row['studentPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="120" height="" border-radius="50%"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']);?>" style="border-radius:50%; width:120px; height:120px;">
   <?php } ?>
    <?php } ?>