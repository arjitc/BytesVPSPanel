<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IP Address Manager</title>

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
        <h1>IP Address Manager</h1>
</div>
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#pane1" data-toggle="tab"><i class="icon-flag"></i> My IPs</a></li>
    <li><a href="#pane2" data-toggle="tab"><i class="icon-signin"></i> Add IPs</a></li>
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

$result = mysqli_query($con,"SELECT * FROM ipaddr");

echo "<table class='table'>
<tr>
<th>ID</th>
<th>IP Address</th>
<th>Delete IP</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['ipaddr'] . "</td>";
  echo "<td><a href='deleteip.php?ip=".$row['ipaddr']."'>". '<button type="button" class="btn btn-danger">Delete</button>' . "</td>";

  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>
    </div>
    <div id="pane2" class="tab-pane">
    <h4>Add IP address</h4>
    <form action="addip.php" method="post">
      <div class="col-lg-3">
    <input type="text" name="ipaddradd" class="form-control" placeholder="IP address" width="40">
  </div>
<input type="submit" class="btn btn-primary">
</form>
    </div>
  </div><!-- /.tab-content -->
</div><!-- /.tabbable -->

</div>

          
        </p>
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://webdesigntutsplus.s3.amazonaws.com/tuts/319_bootstrap_pills_tabs/Tabs-Pills-BEGIN/js/bootstrap.min.js"></script>
  </body>
</html>


