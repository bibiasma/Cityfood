<?php require_once('connection.php'); ?>
<?php
session_start();
$count='';
if(isset($_SESSION['userName']))
{
$count = 1;
$_SESSION['con'] = $count;
}
else
{
$count = 0;
$_SESSION['con'] = $count;
}

?>
<?php
$rName=$oC=$mE=$fI=$cO=$rate=$msg='';
if(isset($_POST['submit']))
{
$rName=$_POST['rName'];
$oC=$_POST['oC'];
$mE=$_POST['mE'];
$fI=$_POST['fI'];
$cO=$_POST['cO'];
$rate=$_POST['rate'];
$query1 = mysql_query("select * from tblrestaurantname");
$query = mysql_query("SELECT r_Name FROM tblrestaurant ");
$res = mysql_num_rows($query);

if(empty($rName)){
$msg = '* Enter restaurant name';
}
else if(empty($oC)){
$msg = '* Enter Occasion ';
}
else if (empty($mE)){
$msg = '* Enter members';
}
else if(empty($fI)){
$msg = '* Enter food items';
}
else if(empty($cO)){
$msg = '* Enter comment';
}
else if(empty($rate)){
$msg = '* Select rating for restaurant ';
}
else if($res >= 0){
if(mysql_query("insert into tblrestaurant(r_Name,o_Name,m_Name,fi_Name,c_Com,r_rating) values('$rName','$oC','$mE','$fI','$cO','$rate')")){ 
$msg = '<p style="color:green;">Thanks for sharing your wow experience with us</p>';
$rName=$oC=$mE=$fI=$cO=$rate='';
}
}
}

?>

<?php require_once('header.php'); 
echo ("<script>
    function noBack() { window.history.forward() }
    noBack();
    window.onload = noBack;
    window.onpageshow = function(evt) { if (evt.persisted) noBack() }
    window.onunload = function() { void (0) }
</script>");
?>
<body>
<div id="container">
<?php require_once('topnavlogin.php'); ?>
<?php require_once('logo.php'); ?>
<div id="maincontent" style="color:#333;"><br>
<p style="margin-left:120px;">Hai &nbsp;&nbsp;<span style="color:green;font-weight:bold;font-size:20px;"><?php echo $_SESSION['userName']; ?></span></p><br>
<form action="" method="post" style="margin-left:50px; float:left;">
Restaurant Name:
&nbsp;&nbsp;&nbsp;&nbsp;<select name="rName"> 
<?php 
 $query1 = mysql_query("select * from tblrestaurantname");
 while($res1 = mysql_fetch_array($query1))
 {?>
<option value="<?php echo$res1['restaurant_id']; ?>">
 <?php echo $res1['r_Name'];?>
</option><?php } ?>
</select>
<br><br>
Occasion:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="oC" id="oC" value="<?php echo $oC; ?>"/><br><br>
Members:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mE" id="mE" value="<?php echo $mE; ?>"/><br><br>
Food Items:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fI" id="fI" value="<?php echo $fI; ?>"/><br><br>
Comments:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea style="height:60px;" name="cO" > </textarea><br><br>
Upload Images: &nbsp; &nbsp;
<input type="file" name="file" id="file"><br>
<br>Ratings:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="rate" style="width:35px;">
<option value = "1">1</option>
<option value = "2">2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
</select><br><br/>
<input type="reset" value="Clear All" class="btn btn-danger" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" name="submit" value="Submit" />
<br><br>
<p style="color:red;"><?php echo $msg; ?></p>
</form>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="res.jpg" width="400px" height="200px" style="margin-top:-400px;margin-left:400px;" />
</div><!--end of maincontent-->
<?php require_once('footer.php'); ?>

</div><!--end of container-->
</body><!--end of body-->
</html><!--end of html-->