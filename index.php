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
    $path = "/data/uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "Файл ".  basename( $_FILES['uploaded_file']['name']).
      " был загружен. Ссылка на файл: https://os.mipt.ru/files/" . basename( $_FILES['uploaded_file']['name']) ;
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>
