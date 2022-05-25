<!DOCTYPE html>
<html>
<head>
  <title>Upload your files - Version 1</title>
</head>
<body>
  <form enctype="multipart/form-data" action="index.php" method="POST">
    <p>HI!! rajat  Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP

   echo "<br/>List of uploaded files";
    $files = scandir("/var/www/html/uploads/");
    $results = array();
    $i = 1;
    foreach ($files as $key => $value) {
       $path = realpath("/var/www/html/uploads/" . DIRECTORY_SEPARATOR . $value);
       if (!is_dir($path)){
	   echo "</br>" . $i . "------" .  $path;
	   $i++;	
	}
}  
if(!empty($_FILES['uploaded_file']))
  {
    $path = "/var/www/html/uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
    }

?>
