<?php
 
if(!isset($_GET['rid']) || (int)$_GET['rid'] == 0){
  header("Location: search.php");
}

$restaurantId = $_GET['rid'];
 
 require_once('connection.php') ?>
 
 
 <?php require_once('header.php');
 
 
 
 
 ?>

<body>
<div id="container">
<?php require_once('topnav.php'); ?>
<?php require_once('logo.php'); ?>
<div id="maincontent">

<p Style="color:#333;font-size:30px;font-weight:bold;">Restaurant Details <button class="btn btn-primary" onclick="document.location='search.php'"><span>Back</span></button></p>
<table border='1'  style="color:#333;;" id="restaurant">
<thead>
<tr>
<th style="color:green;">Restaurant Name</th>
<th style="color:green;">Restaurant Location</th>
<th style="color:green;">Occasion Name</th>
<th style="color:green;">Members</th>
<th style="color:green;">Food Items</th>
<th style="color:green;">Comments</th>
<th style="color:green;">Ratings</th>
</tr>
</thead>
<tbody>
<?php 
 $query = mysql_query("select rn.*, r.*
                      FROM tblrestaurantname rn
                      LEFT JOIN tblrestaurant r ON (r.restaurant_id=rn.restaurant_id) where rn.restaurant_id=$restaurantId");
 
 
 while($res = mysql_fetch_array($query))
 {
 ?>
<tr>
<td style="text-align:center">
 <?php echo $res['r_Name']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['location']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['o_Name']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['m_Name']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['fi_Name']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['c_Com']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['r_rating']; ?>
</td>
</tr>
<?php }?>
</tbody>
</table>


<script>
 $(document).ready(function() {
    $('#restaurant').dataTable();
} );
</script>
</div><!--end of maincontent-->
<?php require_once('footer.php'); ?>

</div><!--end of container-->
</body><!--end of body-->
</html><!--end of html-->