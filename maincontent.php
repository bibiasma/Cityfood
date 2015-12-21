<?php require_once('connection.php'); ?>
<?php require_once('header.php'); ?>

<br>
<label for="textarea" style="margin:0px 0px 0px 20px;font:normal 18px/22px 'Times New Roman';color:green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WOW EXPERIENCE</label><br><br>
<div style="width:400px;height:250px;float:left;">
<center><p style="color:#333;font-size:20px;font-weight:bold;">Tasty voice of city</p></center>
<marquee behaviour="scroll" direction="up">
<?php 
 $query = mysql_query("select rn.*, r.*
                      FROM tblrestaurantname rn
                      LEFT JOIN tblrestaurant r ON (r.restaurant_id=rn.restaurant_id) ");
 while($res = mysql_fetch_array($query))
 {
 ?>
<p style="color:#333;margin-left:30px;"><?php echo $res['m_Name']." Commented on restaurant ".$res['r_Name']." as ".$res['c_Com'].'<br>'; ?></p>
<?php }?>
</marquee>
</div>
<img src="res.jpg" width="400px" height="242px" style="margin-top:20px;margin-left:40px;" />

