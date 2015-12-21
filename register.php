<?php  require_once('connection.php'); ?>
<?php
$fn=$ln=$email=$ps=$msg ='';
if(isset($_POST['submit']))
{
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$email = $_POST['email'];
$ps = $_POST['ps'];
$msg = '';
$query = mysql_query("SELECT email FROM tblregister WHERE email = '$email'");
$res = mysql_num_rows($query);

if(empty($fn)){
$msg = '* First Name is required';
}
else if(empty($ln)){
$msg = '* Last Name is required';
}
else if (empty($email)){
$msg = '* email is required';
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$msg = '* please enter valid email';
}
else if(empty($ps)){
$msg = '* please enter password';
}
else if(strlen($ps) < 6){
$msg = '* Password must be more than six characters ';
}
else if($res > 0)
{
$msg = 'This email is already registered';
}
else
{
if(mysql_query("insert into tblregister(first_name,last_name,email,password) values('$fn','$ln','$email','$ps')")){ 
header('Location:login.php');
}
}
}
?>

<?php require_once('header.php'); ?>
<body>
<div id="container">
<?php require_once('topnav.php'); ?>
<?php require_once('logo.php'); ?>
<div id="maincontent" style="color:#333;">
<br><br>
<h3 style="margin-left:50px;font:600 22px/24px open-serif;color:green;">&nbsp;&nbsp;&nbsp;&nbsp;Registration Form</h3>
<br><br>
<form action="register.php" class="form-horizontal col-lg-6" method="post" style="">
    <div class="form-group">
        <label for="fn" class="col-sm-4 control-label">First Name</label>
        <div class="col-sm-5">
            <input type="text" name="fn" id="fn" class="form-control" value="<?php echo $fn; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="ln" class="col-sm-4 control-label">First Name</label>
        <div class="col-sm-5">
            <input type="text" name="ln" id="ln" class="form-control" value="<?php echo $ln; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-5">
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-5">
            <input type="password" name="ps" class="form-control" value="<?php echo $ps; ?>"/>
        </div>
    </div>
<div class="form-group">
    <div class="col-sm-offset-3  col-sm-10">
        <input type="submit" name="submit" class="btn btn-primary" value="Register" />
        <input type="button" name="btncancel" class="btn btn-danger" value="Cancel" onclick="open_home();"/>
        
    </div>
</div>
<p style="color:red;margin-left:40px;"><?php echo $msg; ?> </p>
</form>

<img src="res.jpg" width="400px" height="242px" class="col-lg-6" />
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