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

<div class='big'>

<form method='POST'>
<label for="folder_name">Folder Name: </label>
<input type="text" name="folder_name">
<input type="submit">
</form>


<form method='POST'>
  <label for="folder_list">Choose a folder:</label>
    <select id="folder_list" name="folder_list">
    <option value="<?= isset($_REQUEST['folder_list']) ? $_REQUEST['folder_list'] : '';?>"><?= isset($_REQUEST['folder_list']) ? $_REQUEST['folder_list'] : '';?></option>
      <?=list_folders($data['page']);?>
    </select>
  <label for="page_name">Page Name: </label>
    <input type="text" name="page_name" value="<?= isset($_REQUEST['page_name']) ? $_REQUEST['page_name'] : '';?>">
  <input type="submit">
</form>

<p style="font-size:18px;color:green;"><?php msg() ?></p>
<p style="font-size:18px;color:red;"><?php check_error() ?></p>

<?php
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