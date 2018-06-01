<html>
<head>	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Title</title>
  <meta name="language" content="en" />

  <meta name="description" content="" />

  <meta name="keywords" content="" />
  <style type="text/css">
    ul li {list-style: none; margin-bottom: 15px;}
    ul li img {display: block; height: 100px; width: 200px;}
    ul li span {display: block;}
  </style>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Title</title>
  <meta name="language" content="en" />

  <meta name="description" content="" />

  <meta name="keywords" content="" />
  <style type="text/css">
    ul li {list-style: none; margin-bottom: 15px;}
    ul li img {display: block; height: 100px; width: 200px;}
    ul li span {display: block;}
  </style>
<title>Links Page</title>

</head>

<body>

<h2>Choose and delete selected links.</h2>

<?php

$dbc = mysqli_connect('pdb.cxfg2y94di8m.eu-west-1.rds.amazonaws.com','johnakasean','joker1997','mc4pdb')
or die('Error connecting to MySQL server');

$query = "select * from image ORDER BY id";

$result = mysqli_query($dbc,$query)
or die('Error querying database');

$count=mysqli_num_rows($result);
?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="3" bgcolor="#FFFFFF"><strong>Delete multiple links</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Link ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Link Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Creation</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Image</strong></td>

</tr>

<?php

while ($row=mysqli_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
<td bgcolor="#FFFFFF"><?php echo $row['id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['imgname']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['created']; ?></td>
<td bgcolor="#FFFFFF"><?php $files = glob("../webcam/*.*");

// get each entry

?>
<ul>
  <?php
  // loop through the array of files and print them all in a list
 // list only jpgs
 for ($i=1; $i<count($files); $i++){
   $num = $files[$i];
   echo '<li class="image"><img src="'.$num.'" alt="Image" /></li><span></span>';
 }


  } ?></td>

</tr>




<?php

while ($row=mysqli_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
<td bgcolor="#FFFFFF"><?php echo $row['id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['imgname']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['created']; ?></td>
<td bgcolor="#FFFFFF"><?php echo '<li class="image">
<img src="../webcam/image1.jpg" alt="Image" /></input></li><span></span>';?></td>
</tr>

<?php
}
?>

<tr>
<td colspan="4" align="center" bgcolor="#FFFFFF"><input name="delete" type="submit" value="Delete"></td>
</tr>



<?php

// Check if delete button active, start this

if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){

$del_id = $checkbox[$i];
$sql = "DELETE FROM image WHERE id in ";
$sql.= "('".implode("','",array_values($_POST['checkbox']))."')";
unlink("/var/www/html/webcam/image1.jpg");
$result = mysqli_query($dbc,$sql);
}
// if successful redirect to delete_multiple.php
if($result){
header('Location: picture.php');
}
 }

mysqli_close($dbc);

?>

</table>
</form>
</td>
</tr>
</table>

</body>

</html>
