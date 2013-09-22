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
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include 'header.php' ?>

    <div class="container">
      <div>
</div>

<div>
    <?php include 'password.php' ?>
</div>
<?php
$con=mysqli_connect("localhost","root","JgoETevM","login");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Error. ";
  }
$result = mysqli_query($con,"SELECT * FROM ipaddr");
$row = mysqli_fetch_array($result);
?>

      <div class="jumbotron">
        <h1>Create new instance</h1>
</div>
<?php
$ipaddress = $_POST["ipaddress"];
$hostname=$_POST["hostname"]; 
$ram=$_POST["ram"]; 
$vswap=$_POST["vswap"]; 
$disk=$_POST["hdd"]; 
$os=$_POST["os"];
$cores=$_POST["cores"];
// Get the hash, letting the salt be automatically generated
$hash = crypt($randompassword);
  $con=mysqli_connect("localhost","root","JgoETevM","login");
// Check connection
if (mysqli_connect_errno() OR empty($ipaddress) OR empty($hostname))
  {
  echo "<div class='alert alert-danger'>";
  echo "<i class='icon-spinner icon-spin icon-large'></i> No Free IP address found or Hostname empty!<br>";
  header('Refresh: 2; URL=create_instance.php');
  echo "</div>";
  }
  else
  {
  $vmid=rand(5, 150);
mysqli_query($con,"INSERT INTO `login`.`instances` (
`vmid` ,
`hostname` ,
`operatingsystem` ,
`ram` ,
`hdd` ,
`cores` ,
`ipaddr`
)
VALUES (
'$vmid', '$hostname', '$os', '$ram', '$disk', '$cores', '$ipaddress'
);");
  echo "<div class='alert alert-block well'>";
  echo "<h4>Success VPS Created</h4>";
  echo "VPS install to $os started, please wait upto 5 mins for it to complete.<br>";
  echo "<br>VPS IPv4 is $ipaddress";   
  echo "<br>VPS login details:<br>";
  echo "Username : root <br>";
  echo "Password : $randompassword <br>";
  echo "SSH Port : 22";
  echo "</div>";  
  exec("/usr/sbin/vzctl create $vmid --ostemplate $os");
  exec("/usr/sbin/vzctl set $vmid --nameserver 8.8.8.8 --save"); 
  exec("/usr/sbin/vzctl set $vmid --ipadd  $ipaddress --save"); 
  exec("/usr/sbin/vzctl set $vmid --diskspace $disk:$disk --save");  
  exec("/usr/sbin/vzctl set $vmid --ram $ram M --swap $vswap M --save");  
  exec("/usr/sbin/vzctl set $vmid --userpasswd root:$randompassword"); 
  exec("/usr/sbin/vzctl set $vmid  --hostname $hostname --save"); 
  exec("/usr/sbin/vzctl set $vmid  --cpus $cores --save"); 
  exec("/usr/sbin/vzctl start $vmid");  
  mysqli_query($con,"DELETE FROM ipaddr WHERE ipaddr='$ipaddress'");
}
  mysqli_close($con);   
?>
</div>

          
        </p>
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>