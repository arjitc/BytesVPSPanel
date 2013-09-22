<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Create instances</title>

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
      <script src="http://code.jquery.com/jquery-1.9.0.js"></script>

<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>



  </head>

  <body>

    <?php include 'header.php' ?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->

      <div>
    <!-- if you need user information, just put them into the $_SESSION variable and output them here -->
</div>

<div>
    <!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
    
</div>
<?php
$con=mysqli_connect("localhost","root","JgoETevM","login");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM ipaddr");
$row = mysqli_fetch_array($result);
?>


      <br>
      <br>
      <br>
      

      <div class="jumbotron">
        <h1>Create new instance</h1>
</div>
<form action="instance_added.php" method="post">
  <table class="table">
<tr>


  <script type="text/javascript">
$(function()
  {
    $(".tip").tooltip();
});


  </script>
  
<td class="lead">Hostname</td>
<td><input type="text" class="form-control" name="hostname"><i> eg, srv1.server.com </i></td>
</tr>
<tr>
<td class="lead">VPS IPv4 Address</td>
<td><input type="text" class="form-control" name="ipaddress" value="<?php echo $row['ipaddr']; ?>"></td>
</tr>
<tr>
<td class="lead">RAM</td>
<td>
  <select name="ram" class="form-control">
  <option value="128">128M</option>
  <option value="256">256M</option>
  <option value="512">512M</option>
  <option value="1024">1G</option>
  <option value="2048">2G</option>
</select>
</td>
</tr>
<tr>
<td class="lead">vSWAP</td>
<td>
  <select name="vswap" class="form-control">
  <option value="128">128M</option>
  <option value="256">256M</option>
  <option value="512">512M</option>
  <option value="1">1G</option>
  <option value="2048">2G</option>
</select>
</td>
</tr>
<tr>
<td class="lead">HDD </td>
<td>
  <select name="hdd" class="form-control">
  <option value="10G">10G</option>
  <option value="20G">20G</option>
  <option value="30G">30G</option>
  <option value="40G">40G</option>
  <option value="50G">50G</option>
</select>
</td>
</tr>
<tr>
<td class="lead">CPU cores </td>
<td>
  <select name="cores" class="form-control">
  <option value="1">1 Core</option>
  <option value="2">2 Cores</option>
  <option value="3">3 Cores</option>
  <option value="4">4 Cores</option>
</select>
</td>
</tr>
<tr>
<td class="lead">Operating System</td>
<td>
  <select name="os" class="form-control">
  <option value="centos-6-x86">CentOS 6 32bit</option>
  <option value="debian-7.0-x86">Debian 7 32bit</option>
</select>
</td>
</tr>
<tr>
<td></td>
<td>
  <input type="submit" class="btn btn-primary tip" value="create" data-toogle="tooltip" title="lets do it">
  <a  class="tip" data-toggle="tooltip" title="i am feeling good">hai</a>
</td>
</tr>
</table>

</form>
</div>

          
        </p>
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://webdesigntutsplus.s3.amazonaws.com/tuts/319_bootstrap_pills_tabs/Tabs-Pills-BEGIN/js/bootstrap.min.js"></script>

  </body>
</html>


