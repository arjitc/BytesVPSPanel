
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="var/www/assets/ico/favicon.png">

    <title>Welcome to Bytes VPS panel</title>

    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootswatch/3.0.0/cosmo/bootstrap.min.css" rel="stylesheet">
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
<link rel="shortcut icon" href="www/download.jpg"/>


  </head>

  <body >


    <?php include 'header.php' ?>
    <br>
    <br>
    <br>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->

      <div>
    <!-- if you need user information, just put them into the $_SESSION variable and output them here -->
</div>

<div>
    <!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
    
</div>

      <div class="jumbotron">
        <h1>Server status</h1>


    </div> <!-- /container -->
            <div class = "well">
          
  <div class="lead"> <i class="icon-keyboard"></i>
<?php
$ramfree = exec("grep -we 'Cached' /proc/meminfo");
$subject = $ramfree;
$search = 'Cached:';
$trimmed = str_replace($search, '', $subject);
$search2 = 'kB';
$trimmed_final_total = str_replace($search2, '', $trimmed);
$trimmed_final_total_mb = $trimmed_final_total/1024;
$trimmed_final_totalfree_mb_output = sprintf('%0.2f', $trimmed_final_total_mb);
echo $trimmed_final_totalfree_mb_output;
?>
 MB of RAM used / Total :
<?php
$ramtotal = exec("grep 'MemTotal' /proc/meminfo");
$subject = $ramtotal;
$search = 'MemTotal:';
$trimmed = str_replace($search, '', $subject);
$search2 = 'kB';
$trimmed_final_total = str_replace($search2, '', $trimmed);
$trimmed_final_total_mb = $trimmed_final_total/1024;
$trimmed_final_total_mb_output = sprintf('%0.2f', $trimmed_final_total_mb);
echo $trimmed_final_total_mb_output;
$perc=($trimmed_final_totalfree_mb_output/$trimmed_final_total_mb_output)*100;
$leftperc=100-$perc;
?> MB
</div>

          
        </p>
          <script type="text/javascript">
$(function()
  {
    $(".tip").tooltip();
});

 
  </script>
        <div class="progress">
  <div class="progress-bar progress-bar-warning tip" title="RAM used" data-toggle="tooltip" style="width: <?php echo $leftperc; ?>%" >
    <span class="sr-only"><?php echo $leftperc; ?>% left</span>
  </div>
  <div class="progress-bar progress-bar-success tip" title="RAM available" data-toggle="tooltip" style="width: <?php echo $perc; ?>%">
    <span class="sr-only"><?php echo $perc; ?>% used</span>
  </div>
</div>

      </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://webdesigntutsplus.s3.amazonaws.com/tuts/319_bootstrap_pills_tabs/Tabs-Pills-BEGIN/js/bootstrap.min.js"></script>

  </body>
</html>


