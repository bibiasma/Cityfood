 <?php require_once('connection.php') ?>
 
 
 <?php require_once('header.php');
 ?>

<body>
<div id="container">
<?php require_once('topnav.php'); ?>
<?php require_once('logo.php'); ?>
<div id="maincontent">

<p Style="color:#333;font-size:30px;font-weight:bold;">Search Restaurant</p>
<table border='1'  style="color:#333;;" id="restaurant">
<thead>
<tr>
<th style="color:green;">Restaurant Name</th>
<th style="color:green;">Restaurant Location</th>
<th style="color:green;">Menu Items</th>
<th style="color:green;">Average Rating</th>
</tr>
</thead>
<tbody>
<?php 
 $query = mysql_query("select rn.*, AVG(r.r_rating) as avg,GROUP_CONCAT( DISTINCT m.item ORDER BY m.item ASC SEPARATOR ', ') as m_items
                      FROM tblrestaurantname rn
                      LEFT JOIN tbl_menu m ON (rn.restaurant_id=m.restaurant_id)
                      LEFT JOIN tblrestaurant r ON (r.restaurant_id=rn.restaurant_id) group by rn.restaurant_id");
 
 
 while($res = mysql_fetch_array($query))
 {
 ?>
<tr>
<td style="text-align:center">
 <a href="search-details.php?rid=<?php echo $res['restaurant_id']; ?>" style="text-decoration: underline;"><?php echo $res['r_Name']; ?></a>
</td>
<td style="text-align:center">
 <?php echo $res['location']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['m_items']; ?>
</td>
<td style="text-align:center">
 <?php echo $res['avg']; ?>
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