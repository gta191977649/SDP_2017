<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
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
        <!-- Angular JS -->
        <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
    </head>

    <body ng-app="">
        <?php require("Templates/navbar.php"); ?> 		
        <div class="container">
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-4">
                    <h1 class="text-center">Register</h1>
                    <p class="text-center">Please enter you wished username & password.</p>
                    <form action="Assets/php/user_reg.php" method="post" name="regForm" >

                        <div class="alert alert-danger" role="alert" ng-show="pwd != pwd_again">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            You entered password does not match each other!
                        </div>

                        <div class="alert alert-danger" role="alert" ng-show="regForm.mail.$invalid && regForm.mail.$dirty">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Please enter vailed email.
                        </div>


                        <div class="form-group" >

                            <label for="usr">Username:</label>
                            <input type="text" class="form-control" name="usr" ng-model="usr" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="pwd" ng-model="pwd" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password Comform:</label>
                            <input type="password" class="form-control" name="pwd_again" ng-model="pwd_again" required>

                        </div>
                        <div class="form-group">
                            <label for="pwd">Gender:</label>
                            <div class="form-group">
                                <label class="radio-inline"><input type="radio" name="gender" value="M">Male</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="F">Female</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="S" checked="true">Secret</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <input type="email" class="form-control" name="mail" ng-model="mail" required>
                        </div>

                        <p class="text-right"><a href="login.php">Already have a account?</a></p>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary pull-right" value="Register" ng-disabled="regForm.usr.$invalid || regForm.pwd.$invalid || regForm.pwd_again.$invalid || regForm.mail.$invalid || pwd != pwd_again"/>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"> </div>
            </div>
        </div>
    </body>
</html>
