<?php
include ("session.php");
?>
<!DOCTYPE html>
<!--
++++++++++++++++++++++++++++++++++++++++++++++++++++++
AUTHOR : Rakesh
PROJECT :humanize
++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HUMANIZE</title>
	
	<!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

	<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel ="stylesheet" type="text/css" href="library/vegas/vegas.min.css">
	<!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
        
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/color/green.css">
        
</head>
<body >
<!-- [ LOADERs ]
================================================================================================================================-->	
    <div class="preloader">
    <div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">
    
 <!-- [NAV]
 ============================================================================================================================-->    
   <!-- Navigation
    ==========================================-->
    <nav  class="amd-menu navbar navbar-default navbar-fixed-top theme_background_color fadeInDown">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php">HUMANIZE<span class="black">Extension</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <ul class="nav navbar-nav navbar-right">           
			 <li><a href="index.php" class="page-scroll">Home</a></li>
			 <li><a href="logout.php" class="page-scroll">Log Out</a></li>
             </ul> </div><!-- /.container-fluid -->
    </nav>


   <!-- [/NAV]
 ============================================================================================================================-->    
    
    
    
    
    
  
 
 <!-- [SUBSCRIBE]
=============================================================================================================================-->
 <section class="contactus" id="contact">
     <div class="container">
         <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="testimonial-area-heading">
                        <h2 class="grey">welcome</h2>
<p><?php session_start();echo $_SESSION['username']; ?></p>
                    </div>
                </div>
            </div>
         <div class="gap"></div>
     <div class="row">
                    <!-- /contact info -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <!-- contact form -->
                      <h2 class="grey">URL LIST</h2>
					  <table width="600" border="1" cellpadding="1" cellspacing="1">
					  <tr>
					  <th>ID NO</th>
					  <th>URL</th>
					  <th>POST ID</th>
                                            <th>DESCRIPTION</th>
					  <
					  </tr>
					  <?php
					     require "connect.php";
					    $sql = "SELECT * FROM user_url";
                         $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                         // output data of each row
                         while($row = $result->fetch_assoc()) {
							 echo "<tr>";
							 echo "<td>".$row["ID"]."</td>";
							 echo "<td>".$row["urls"]."</td>";
							 echo "<td>".$row["postids"]."</td>";
					                  echo "<td>".$row["description"]."</td>";
                            }
                            } else {
                          echo "0 results";
                        }
					  ?>
					  </table>
                      <!-- /contact form -->
                    </div>
                  </div>
     </div>
	 <div class="row">
	               <div class="col-md-12 col-sm-12 col-xs-12">
	                <form  method="POST" action="posttopage.php">
                        <div class="row form-group">
                          <div class="col-xs-6">
                            <input type="text" name="id" placeholder="Enter ID to post" id="id" class="form-control">
                          </div>
						</div>
                        <button type="submit" class="btn btn-style blue">post this on facebook</button>
                       <span class="form-message" style="display: none;"></span>
                      </form>
	 </div>
		<div class="row">
	               <div class="col-md-12 col-sm-12 col-xs-12">
	                <form  method="POST" action="postget.php">
                        <div class="row form-group">
                          <div class="col-xs-6">
                            <input type="text" name="id" placeholder="Enter ID to post" id="id" class="form-control">
                          </div>

						</div>
                        <button type="submit" class="btn btn-style blue">Get Comment</button>
                       <span class="form-message" style="display: none;"></span>
                      </form>
	 </div>		  
 </section>
 <!--  [CONTACT INFO ENDS ]-->
 <!-- [/SUBSCRIBE]
=============================================================================================================================-->
 
 <!-- [FOOTER]
=============================================================================================================================-->
 <footer class="footer">
  
					<div class="container">
						<div class="footer-info col-md-12 text-center">
							<ul>
								<li><a href="#">Dept. Of CS, Pondicherry University</a></li>
								<li><a href="#">Chinna Kalapet-605014</a></li>
								<li><a href="#">rsn4rsn@gmail.com</a></li>
							</ul>
						</div>						
					</div>
				  
     
     
 </footer>
 
 <section class="sub-footer">
					<div class="container">
						<div class="copyright-text col-md-6 col-sm-6 col-xs-12">
							<p>© 2016 HUMANIZE. All rights reserved.</p>
						</div>
						<div class="designed-by col-md-6 col-sm-6 col-xs-12">
							<p>Designed by: <a href="#">RAKESH S NAIR</a></p>
						</div>
					</div>
				</section>
 
 <!-- [/FOOTER]
=============================================================================================================================-->
 
 
 
 
 
 
 
 
 
</div>
 

<!-- [ /WRAPPER ]
=============================================================================================================================-->

	<!-- [ DEFAULT SCRIPT ] -->
	<script src="library/modernizr.custom.97074.js"></script>
	<script src="library/jquery-1.11.3.min.js"></script>
        <script src="library/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script src="library/vegas/vegas.min.js"></script>
	<!-- [ PLUGIN SCRIPT ] -->
        
	<script src="js/plugins.js"></script>
        <script src="js/fappear.js"></script>
       <script src="js/jquery.countTo.js"></script>
	<script src="js/scrollreveal.js"></script>
       	 <!-- [ COMMON SCRIPT ] -->
	<script src="js/common.js"></script>
  
</body>


</html>