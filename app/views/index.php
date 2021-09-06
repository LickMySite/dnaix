<!DOCTYPE html>
<html lang="en">
<head>
  <?=$this->view("layout/head",$data);?>
</head>  
<body>

  <header>
    <?=$this->view("layout/nav",$data);?>
  </header>
<h1><b><?=pageTitle($data['page'])?><b></h1>
<div class='big'>
<?php
$this->view($data['page'], $data);
li_files_folders('../app/views/page/');


?>
</div>
<footer class='footer'>

    <?php
    $this->view("layout/footer",$data);
    
  
    ?>

</footer>

</body>
</html>