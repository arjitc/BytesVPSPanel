<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VPS Panel - Delete IP</title>

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
$ipaddr=$_GET["ip"];
?> 

      <div class="jumbotron">
        <h1>IP <?php echo $ipaddr; ?> deleted</h1>
</div>

<?php
$con=mysqli_connect("localhost","root","JgoETevM","login");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_query($con,"DELETE FROM ipaddr WHERE ipaddr='$ipaddr'");
  echo "<center><i class='icon-spinner icon-spin icon-large'></i></center><br>";
  header('Refresh: 1; URL=ipman.php');

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


