<!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php
    $pageName = basename($_SERVER['PHP_SELF']);
    
?>
        

          <a class="navbar-brand" href="index.php"  > <i class="icon-cloud"></i> Bytes VPS Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            
            
            <li  class="<?php if($pageName=='index.php')
            {
            echo "active";
          }?>"><a href="index.php"> <i class="icon-home"></i> Home</a></li>

            <li class="<?php if($pageName=='create_instance.php')
            {
            echo "active";
          }?>"><a href="create_instance.php"> <i class="icon-edit-sign"></i> Create New Instance</a></li>
            <li class="<?php if($pageName=='ipman.php')
            {
            echo "active";
          }?>"><a href="ipman.php">  <i class="icon-cogs"></i> IP manager</a></li>
           
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li><a ><i class="icon-user"></i>  <?php echo $_SESSION['user_name']; ?></a></li>
            <li ><a href="./"> <i class="icon-signout"></i> Log out</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   