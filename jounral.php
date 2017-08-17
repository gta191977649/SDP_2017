<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SDP Jouneral</title>

    <!-- Bootstrap -->
    <link href="Assets/bootstrapThemed.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
   	 <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src= "http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <!-- Angular JS -->
   	<script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
    
    

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php 
		require("Assets/php/auth.php");
	
	?>
</head>
<body>
   	<!-- 导航条 -->
  	<nav class="navbar navbar-default">
  	
  		<div class="container">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">
			SDP Jouneral
		  </a>
		</div>
  	
	  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  			<div class="btn-group pull-right ">
			<ul class="nav navbar-nav">
 				<?php if(isLog()) { ?>
  				<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <?php echo getName(); ?> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      	<li><a href="#">Manage</a></li>
    	<li><a href="Assets/php/user_logout.php">Logout</a></li>
    </ul>
  </li> 		
				<?php } else {	?>
					
				<li><a href="login.php">Login</a></li>
				
				<?php } ?>
	  		</ul>
			
			</div>
	  		<ul class="nav navbar-nav">
	  			<li><a href="#">Home</a></li>
	  			<li><a href="#">My Jounerals</a></li>
	  			<li><a href="#">Discovery</a></li>
	  		</ul>
	  		
         <form class="form-inline">
         
          
          <form>
    <div class="input-group pull-right" style="margin-top: 7px;">
      <span class="input-group">
        
      </span>
      <input type="text"class="form-control col-md-5" placeholder="Search">
      <span class="input-group-btn">
  		<select class="form-control selectpicker col-xs-0">
          <option>Word</option>
          <option>Date</option>
        </select>
        <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>
    </div><!-- /input-group -->
    </form>
  
        </form>
        
		</div>
	  

	  </div>
		</div>
  </nav>
  	
	
  	
  		
  
  <div class="container">
   	
   <!-- InstanceBeginEditable name="MainConcent" -->MainConcent<!-- InstanceEndEditable -->
   	  
    
</div>
     <hr/>
      <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Customized by: Le Cai</p>
        <p>Powered by: bootstrap</p>
      </div>
    </footer>

   
  </body>
<!-- InstanceEnd --></html>