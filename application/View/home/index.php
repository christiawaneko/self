<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
  
    foreach($data['inidata'] as $key){
      echo $key->judul.'<br>';
      echo $key->dokumen.'<br>';
    }
    
  ?>
</body>
</html>