<!DOCTYPE html>
<html>
<head>
 <meta charSet="utf-8"/>
  <title>Загрузка файлов</title>
</head>
<body>
  <form enctype="multipart/form-data" action="index.php" method="POST">
    <p>Загрузите ваш файл</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "/var/www/html/files/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    $base = "https://os.mipt.ru/upload/files/";

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      $url =  $base . basename( $_FILES['uploaded_file']['name']);
      echo "<h3><a target='_blank' href='" .  $url . "' >" . $url . "</a></h3>" ;
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>
