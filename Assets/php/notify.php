

<?php

function notify($title,$body,$url,$type="panel-primary")
{

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Logout...</title>
    <link href="../bootstrapThemed.min.css" rel="stylesheet">
  </head>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">

    <div class="panel <?php echo $type; ?>" style="margin-top:50px;">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title;?></h3>
      </div>
      <div class="panel-body">
        <?php echo $body; ?>

      </div>
    </div>

    <?php
    //跳转页面
    header('Refresh: 3; URL = '.$url);
    ?>
    </div>
  </div>
</div>
</html>

<?php
}
 ?>
