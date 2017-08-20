<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SDP Jouneral</title>
    <!-- Bootstrap -->
    <link href="https://bootswatch.com/4-alpha/cerulean/bootstrap.min.css" rel="stylesheet">
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
  	<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">SDP Jouneral</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">My Jounerals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Discovery</a>
          </li>
         
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
			  
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        
        
        <ul class="nav navbar-nav">
 				<?php if(isLog()) { ?>
  				<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo getName(); ?> <span class="caret"></span>
    </a>
     <div class="dropdown-menu" aria-labelledby="dropdown01">
      	<a class="dropdown-item" href="#">Manage</a>
    	<a class="dropdown-item" href="Assets/php/user_logout.php">Logout</a>
    </div>
  </li> 		
				<?php } else {	?>
					 <a class="nav-link" href="login.php">Login</a>
			
				
				<?php } ?>
	  		</ul>
			
        
        
      </div>
    </nav>

  	
	
  	
  		
  
  <div class="container">
   	
   <!-- InstanceBeginEditable name="MainConcent" -->
  	   <div class="card text-xs-center">
    	  <div class="card-header">
    		What do you think?
  		  </div>
		  <div class="card-block">
		  <div class="media">
  <div class="media-left"   >
    <div class="cal" ng-app="dateDisplay" ng-controller="datCtrl">
    	<div class="cal-tite" >{{ today | date :  "EEE"  }}</div>
		<div class="cal-date" >{{ today | date :  "dd" }}</div>
    </div>
  </div>
  <div class="media-body">
   
  </div>
</div>
			<form style="padding-top: 5px;">
				<a href="#">Switch to editor mode</a>
				<div class="form-group">
				  <textarea class="form-control" rows="5" id="comment"></textarea>
				</div>
			  <button type="submit" class="btn btn-primary pull-right">Publish</button>
				
			</form>
		  </div>
	</div>
  	    <div class="card text-xs-center">
    	  <div class="card-header">
    		Commcnets
  		  </div>
  		  
		  <div class="card-block">
			<div class="row">
        <div class="col-sm-12">
          <h2>Dodhaiduhwa</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-secondary" href="#" role="button">Detail &raquo;</a></p>
        </div>
        <div class="col-sm-12">
          <h2>Jifhdifj</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-secondary" href="#" role="button">Detail &raquo;</a></p>
       </div>
        <div class="col-sm-12">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-secondary" href="#" role="button">Detail &raquo;</a></p>
        </div>
      </div>
		  </div>
	</div>
 	 <script>
	var app = angular.module('dateDisplay', []);
	app.controller('datCtrl', function($scope) {
		$scope.today = new Date();
	});
	</script>
  	  <!-- InstanceEndEditable -->
   	  
    
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