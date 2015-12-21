<?php require_once('connection.php'); ?>
<?php
session_start();
$_SESSION['userName']
?>

<?php
$rName=$mI=$msg=$res ='';
if(isset($_POST['submit'])){
    $rName=$_POST['rName'];
    $location=$_POST['location'];
    $items=$_POST['items'];
    $prices=$_POST['prices'];
    $query = mysql_query("SELECT r_Name,m_items FROM tblrestaurantname ");
    $res = mysql_num_rows($query);
    
    if(empty($rName)){
        $msg = '* Enter restaurant name';
    }
    else if(count($items) == 0){
        $msg = '* Enter menu items ';
    }
    else {
        mysql_query("insert into tblrestaurantname(r_Name,location) values('$rName','$location')");
        $restaurantId = mysql_insert_id();
        $noOfItems = count($items);
        for($i=0;$i<$noOfItems;$i++){
            mysql_query("insert into tbl_menu(restaurant_id,item,price) values($restaurantId,'".$items[$i]."','".$prices[$i]."')");
        }
        
        $msg = '<p style="color:green;">Record added</p>';
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
<div id="maincontent" style="color:#333;height:800px"><br>
<p style="margin-left:120px;">Hai &nbsp;&nbsp;<span style="color:green;font-weight:bold;font-size:20px;">Admin</span></p><br>
<form action="" method="post" class="form-horizontal col-lg-6">
Restaurant Name: <input type="text" name="rName" id="rName" value="<?php echo $rName; ?>"/><br><br>
Restaurant Location: <input type="text" name="location" id="location" value="<?php echo $rName; ?>"/><br><br>
Menu Items:

<table class="table table-bordered" style=width:100%;">
    <thead>
        <tr>
            <th>
                Menu Item
            </th>
            <th>
                Price
            </th>
            <th>Add/Remove</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="text" name="items[]"/>
            </td>
            <td>
                <input type="text" name="prices[]"/>
            </td>
            <td><a href="javascript:void(0);" onclick="addRow(this);" class="btn btn-xs btn-info">+</a></td>
        </tr>
    </tbody>
</table>

<input type="reset" value="Clear All" class="btn btn-danger" />
<input type="submit" name="submit" class="btn btn-primary"  value="Add Restaurant" />
<br><br>
<p style="color:red;"><?php echo $msg; ?></p>
</form>
<div class="col-lg-5 pull-right">
<img src="res.jpg" width="370px" height="242px" />
</div>

<script type="text/javascript">
	function addRow(obj) {
		$(obj.parentNode.parentNode).after('<tr> <td> \
                <input type="text" name="items[]"/> \
                </td> \
                <td> \
                    <input type="text" name="prices[]"/> \
                </td> \
                <td> \
					<a href="javascript:void(0);" onclick="addRow(this);" class="btn btn-xs btn-info">+</a> <a  href="javascript:void(0);" onclick="removeRow(this)" class="btn btn-xs btn-danger"  title="Remove this row completely" alt="Remove this row completely">-</a> \
				</td>  \
            </tr>');
        }
        
        
	function removeRow(obj) {
		$(obj.parentNode.parentNode).fadeOut("normal",function(){
			$(this).remove();
		});
	}
</script>

</div><!--end of maincontent-->
<?php require_once('footer.php'); ?>

</div><!--end of container-->
</body><!--end of body-->
</html><!--end of html-->