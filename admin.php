<?php  require_once('connection.php'); ?>
<?php session_start();  
?>
<?php
$admin='lucky';
$ps='ringrong';
$ad=$psw=$msg=$sql='';

if(isset($_POST['submit']))
{  
$ad =$_POST['admin'];
$psw = $_POST['ps'];

if(!empty($ad)&&!empty($psw))
{
if( $admin==$ad && $ps== $psw){
$_SESSION['userName'] = $final['first_name'];
header("Location:adlogin.php");
}
}
else
{
$msg = 'Please enter valid admin name & password';
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
<?php require_once('topnav.php'); ?>
<?php require_once('logo.php'); ?>
<div id="maincontent" style="color:#333;">
<br><br>
<label for="login" style="margin-left:50px;font:600 22px/24px open-serif;color:green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Login</label>
<br><br>
<form action="" method="post" style="margin-left:50px;float:left;">
Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
<input type="textbox" name="admin" value=""/><br><br>
Password&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
<input type="password" name="ps" value=""/><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="btncancel"class="btn btn-danger"  value="Cancel" onclick="open_home();" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit"class="btn btn-primary"  value="Login" />
<br><br>
<p style="color:red;"><?php echo $msg; ?>
</form>

<img src="res.jpg" width="400px" height="242px" style="margin-top:-40px;margin-left:200px;" />
</div><!--end of maincontent-->
<?php require_once('footer.php'); ?>

</div><!--end of container-->
</body><!--end of body-->
</html><!--end of html-->
<script>
function open_home()
{
window.location.assign('http://www.adatronix.com/cityfood');
}
</script>