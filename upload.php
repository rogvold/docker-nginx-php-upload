<?PHP

#header('Access-Control-Allow-Origin: *', true);
#header('Access-Control-Allow-Methods: GET, POST', true);
#header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key, Cache-Control', true);


function randomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = '/var/www/html/files';   //2

if (!empty($_FILES)) {

$ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

$target_file_name = randomString() . "." . $ext;

$target_file = $storeFolder . '/' . $target_file_name;


    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

$result =  move_uploaded_file($tempFile, $target_file); //6

echo $target_file_name;

}
?>
