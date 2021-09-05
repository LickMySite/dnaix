<!DOCTYPE html>
<html lang="en">
<head>
  <?=$this->view("layout/head",$data);?>
</head>  
<body>
<?=show($data);?>

  <header>
    <?=$this->view("layout/nav",$data);?>
  </header>
<h1>This is the <b><?=ucwords($data['page_title'][0])?><b> page</h1>


<?php

//show($URLS);
if(isset($data['page_title'][1])){
  $this->view("page/".$data['page_title'][0]."/".$data['page_title'][1]);
}else{
  $this->view("page/".$data['page_title'][0]);
}
?>

<footer class='footer'>
    <?=$this->view("layout/footer",$data);?>
</footer>

</body>
</html>