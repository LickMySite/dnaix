<!DOCTYPE html>
<html lang="en">
<head>
  <?=$this->view("layout/head",$data);?>
</head>  
<body>
  <div class='text-align'>
      <h1>404 Error!</h1>
  </div>

<div class='error-container'>
  <h2>The URL <em>"<?=ROOT.$data['page_title'][0]?>"</em> dose not exists.</h2>
<p>Please check url and try again.</p>
<div class='text-align'>
<a href="<?=ROOT?>" class='button'>back to site</a>
</div>
</div>
<hr>
</body>
</html>

