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
<h1>This is the <b><?=ucwords($data['page_title'])?><b> page</h1>

<?=$this->view("page/".$data['page_title']);?>

<footer class='footer'>
    <?=$this->view("layout/footer",$data);?>
</footer>

</body>
</html>