<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Static Top Navbar Example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/navbar-static-top/navbar-static-top.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php
$vmid=$_GET["vmid"];
$id=$_GET["vmid"];
?> 
<?php
$con=mysqli_connect("localhost","root","JgoETevM","login");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT ipaddr FROM instances WHERE vmid='$id'");

while($row = mysqli_fetch_array($result))
  {
  $ipaddress=$row['ipaddr']; 
  }

mysqli_close($con);
?>
    <?php include 'header.php' ?>
    <?php
$id=$_GET["vmid"];
?> 
<div class="container">
   <div class="jumbotron">Manage your instance <?php
$con=mysqli_connect("localhost","root","JgoETevM","login");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM instances WHERE vmid='$id'");

while($row = mysqli_fetch_array($result))
  {
  echo "<b>". $row['hostname'] ."</b>"; 
  }

mysqli_close($con);
?></div>
   
 <?php
$enablenetwork=$_GET["enablenetwork"]; 
if (isset($enablenetwork))
  {
  exec("/usr/sbin/vzctl set $vmid --ipadd  $ipaddress --save");          
  echo "<div class='alert alert-block'>";
  echo "<h4>Success</h4>";
  echo "Instance network enabled";
  echo "</div>";  
  }
else
  {
  echo "";
  }
?>
<?php
$boot=$_GET["boot"]; 
if (isset($boot))
  {
  exec("/usr/sbin/vzctl start $vmid");          
  echo "<div class='alert alert-block'>";
  echo "<h4>Success</h4>";
  echo "Instance booted";
  echo "</div>";  
  }
else
  {
  echo "";
  }
?>
<?php
$shutdown=$_GET["shutdown"]; 
if (isset($shutdown))
  {
  exec("/usr/sbin/vzctl stop $vmid");          
  echo "<div class='alert alert-block'>";
  echo "<h4>Success</h4>";
  echo "Instance shutdown";
  echo "</div>";  
  }
else
  {
  echo "";
  }
?>
<?php
$disablenetwork=$_GET["disablenetwork"]; 
if (isset($disablenetwork))
  {
  exec("/usr/sbin/vzctl set $vmid --save --ipdel $ipaddress --save");          
  echo "<div class='alert alert-block'>";
  echo "<h4>Success</h4>";
  echo "Instance network shutdown";
  echo "</div>";  
  }
else
  {
  echo "";
  }
?>

<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#pane1" data-toggle="tab">My Instance</a></li>
    <li><a href="#pane3" data-toggle="tab">Power management</a></li>
    <li><a href="#pane2" data-toggle="tab">Network</a></li>
  </ul>
  <div class="tab-content">
    <div id="pane1" class="tab-pane active">
      <br>
<?php
$con=mysqli_connect("localhost","root","JgoETevM","login");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM instances WHERE vmid='$id'");

echo "<table class='table'>
<tr>
<th>Hostname</th>
<th>RAM</th>
<th>HDD</th>
<th>CPU core allocation</th>
<th>IP Address</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['hostname'] . " </td>";
  echo "<td>" . $row['ram'] . " MB </td>";
  echo "<td>" . $row['hdd'] . "</td>";
  echo "<td>" . $row['cores'] . "</td>";
  echo "<td>" . $row['ipaddr'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>
    </div>
    <div id="pane2" class="tab-pane">
      <h3> Instance network </h3>
      <hr>
    <a href ='manage.php?vmid=<?php echo $vmid ?>&disablenetwork=1' class="btn btn-success"> Disable network</a>
<hr>
<a href ="manage.php?vmid=<?php echo $vmid ?>&enablenetwork=1">Enable network</a>

    </div>
    <div id="pane3" class="tab-pane">
      <h3> Instance Power Management </h3>
      <hr>
    <a href ='manage.php?vmid=<?php echo $vmid ?>&shutdown=1'> Shutdown Instance</a>
<hr>
<a href ="manage.php?vmid=<?php echo $vmid ?>&boot=1">Boot instance</a>

    </div>
  </div><!-- /.tab-content -->
</div><!-- /.tabbable -->
 

</div>   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://webdesigntutsplus.s3.amazonaws.com/tuts/319_bootstrap_pills_tabs/Tabs-Pills-BEGIN/js/bootstrap.min.js"></script>

<!-- Example plugin: Prettify -->
    <script src="js/prettify/prettify.js"></script>
  </body>
</html>


