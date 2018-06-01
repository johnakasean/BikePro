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

// This is a sample code in case you wish to check the username from a mysql db table
$link=mysqli_connect("pdb.cxfg2y94di8m.eu-west-1.rds.amazonaws.com", "johnakasean","joker1997")or die("could not connect");
$db=mysqli_select_db($link,"mc4pdb") or die ("could not select database");

	?>

  <?php
  //this is were images displayed
                      $query = "SELECT * FROM image WHERE id='53'";
                      $result = mysqli_query($link,$query) or die(mysqli_error());
                      while($row = mysqli_fetch_array($result)){
                      ?>
                      <a href="test.php?delete=<?php=$row['id']?>" onclick = "return confirm('Are you sure you want to delete?')">
                      <img src="../webcam/image0.jpg" id="AEDbutton"></a>

  <?php
                      echo "<img border=\"0\" src=\"".$row['image']."\" width=\"200\"  height=\"100\">";
                      echo "<br>";                }
                      if($delete != "") {
                             $query = "SELECT * FROM image WHERE id='".$delete."'";
                             $result = mysql_query($query);

                             while ($delete = mysql_fetch_array($result)) {
                                 $image = $delete['image'];
                                 $file= '../webcam/'.$image;
                                 unlink($file);
                             }

                             $query = "DELETE FROM images WHERE imageID='".$delete."'";
                             ExecuteQuery($query);
                         }
  ?>
	</div>
	</div>

</body>

</html>
<?php
// open this directory
$myDirectory = opendir("../webcam/");
// get each entry
while($entryName = readdir($myDirectory)) {
  $dirArray[] = $entryName;
}
// close directory
closedir($myDirectory);
//	count elements in array
$indexCount	= count($dirArray);
?>
<ul>
  <?php
  // loop through the array of files and print them all in a list
  for($index=0; $index < $indexCount; $index++) {
    $extension = substr($dirArray[$index], -3);
    if ($extension == 'jpg'){ // list only jpgs
      echo '<li class="image">
      <img src="../webcam/' . $dirArray[$index] . '" alt="Image" /></input></li><span>' . $dirArray[$index] . '</span>';
    }
  }
  ?>
