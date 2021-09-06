<!DOCTYPE html>
<html lang="en">
<head>
  <?=$this->view("layout/head",$data);?>
</head>  
<body>

  <header>
    <?=$this->view("layout/nav",$data);?>
  </header>
<h1>This is the <b><?=ucwords($data['page_title'])?><b> page</h1>
<h2>create/index</h2>
<div class='big'>

<form method='POST'>
<label for="folder_name">Folder Name: </label>
<input type="text" name="folder_name">
<input type="submit">
</form>

<p style="font-size:18px;color:green;"><?php msg() ?></p>
<p style="font-size:18px;color:red;"><?php check_error() ?></p>

<?php
//show($data['page']);
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