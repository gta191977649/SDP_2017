<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <!-- Bootstrap -->
        <link href="https://bootswatch.com/4-alpha/cerulean/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet" type="text/css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
    </head>

    <body ng-app="">
       <?php require("Templates/navbar.php"); ?> 		
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1 class="text-center">Login</h1>
                    <p class="text-center">Please enter your name & password.</p>
                    <form action="Assets/php/user_login.php" method="post" name="loginForm">

                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" name="usr" ng-model="usr" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="pwd" ng-model="pwd" required>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                        <p class="text-right"><a href="register.php">Do not have a account?</a></p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right" ng-disabled="loginForm.usr.$invalid || loginForm.pwd.$invalid">Login</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>
