<!DOCTYPE HTML>
<html>
<head>
    <title>Create Article</title>
     
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' ,
  plugins: "media link",
  apply_source_formatting : true,
  forced_root_block: false});
  </script>     
</head>

<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Create Article</h1>
        </div>
     
    <!-- html form here where the product information will be entered -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database1.php';
 
    try{
     
        // insert query
$query = "INSERT INTO products
            SET name=:name, description=:description,
                price=:price, image=:image, created=:created";
 
// prepare query for execution
$stmt = $con->prepare($query);

$con=mysqli_connect("localhost","root","","1phpbeginnercrudlevel1");

$name=htmlspecialchars(strip_tags($_POST['name']));
$description=mysqli_real_escape_string($con, $_POST["myeditor"]);
$price=htmlspecialchars(strip_tags($_POST['price']));
 
// new 'image' field
$image=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
        : "";
$image=htmlspecialchars(strip_tags($image));
 
// bind the parameters
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':image', $image);
 
// specify when this record was inserted to the database
$created=date('Y-m-d H:i:s');
$stmt->bindParam(':created', $created);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";}else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
			// now, if image is not empty, try to upload the image
if($image){
 
    // sha1_file() function is used to make a unique file name
    $target_directory = "uploads/";
    $target_file = $target_directory . $image;
    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
 
    // error message is empty
    $file_upload_error_messages="";
	// make sure that file is a real image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check!==false){
    // submitted file is an image
}else{
    $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
}
// make sure certain file types are allowed
$allowed_file_types=array("jpg", "jpeg", "png", "gif");
if(!in_array($file_type, $allowed_file_types)){
    $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
}
// make sure file does not exist
if(file_exists($target_file)){
    $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
}
// make sure submitted file is not too large, can't be larger than 1 MB
if($_FILES['image']['size'] > (4096000)){
    $file_upload_error_messages.="<div>Image must be less than 4 MB in size.</div>";
}
// make sure the 'uploads' folder exists
// if not, create it
if(!is_dir($target_directory)){
    mkdir($target_directory, 0777, true);
}
// if $file_upload_error_messages is still empty
if(empty($file_upload_error_messages)){
    // it means there are no errors, so try to upload the file
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        // it means photo was uploaded
    }else{
        echo "<div class='alert alert-danger'>";
            echo "<div>Unable to upload photo.</div>";
            echo "<div>Update the record to upload photo.</div>";
        echo "</div>";
    }
}
 
// if $file_upload_error_messages is NOT empty
else{
    // it means there are some errors, so show them to user
    echo "<div class='alert alert-danger'>";
        echo "<div>{$file_upload_error_messages}</div>";
        echo "<div>Update the record to upload photo.</div>";
    echo "</div>";
}
 
}
        
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Title</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Content</td>
            <td><textarea name="myeditor" id="myeditor" rows="10" cols="80"></textarea></td>
        </tr>
        <tr>
            <td>Category</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
        <tr>
    <td>Photo</td>
    <td><input type="file" name="image" /></td>
</tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read articles</a>
            </td>
        </tr>
    </table>
</form>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/jquery-3.0.0.min.js"></script>
  
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="libs/bootstrap-3.3.6/js/bootstrap.min.js"></script>
 
</body>
</html>