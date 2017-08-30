<?php require_once("Assets/php/auth.php"); ?>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">SDP Journal</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">My Journals</a>
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
            <?php if (isLog()) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo getName(); ?> <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Manage</a>
                        <a class="dropdown-item" href="Assets/php/user_logout.php">Logout</a>
                    </div>
                </li> 		
            <?php } else { ?>
                <a class="nav-link" href="login.php">Login</a>


            <?php } ?>
        </ul>



    </div>
</nav>