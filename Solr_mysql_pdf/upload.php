<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
</head>
<body>
 <h2>Upload</h2>
<form method="post" enctype="multipart/form-data">
    <p>
        <label>Title</label>
        <input type="text" name="title">
    </p>
     <p>
        <label>Description</label>
        <input type="text" name="description">
    </p>
    <p>
        <label>File Upload</label>
        <input type="File" name="file">
    </p>
    <p>
        <input type="submit" name="submit">
    </p>
    <p><a href="index.php">Search</a></p>
    
</form>
</body>
</html>
 
<?php 

header('Content-type: text/html; charset=UTF-8');

include "./dbconnect.php";
 
if (isset($_POST["submit"]))
 {
     #retrieve file title
    $title = $_POST["title"];

    
     
    #file name with a random number so that similar dont get replaced
     $pname = $_FILES["file"]["tmp_name"];
        
    #file name to store file
    $tname = mysqli_real_escape_string($conn,$_FILES["file"]["name"]);

   

    

    #file type
    $type = mysqli_real_escape_string($conn,$_FILES["file"]["type"]);

    
    
     #retrieve file decription
    $description = $_POST["description"]; 
    //$keywords = $description." ".$title." ".$tname." ".$type;

   

    #sql query to insert into database
    $sql = "INSERT into filespdf(title,name,description,type,date_up) VALUES('$title','$tname','$description','$type',now())";
 
    if(mysqli_query($conn,$sql)){
        $last_id = $conn->insert_id;

        $path = "upload/$last_id-$tname";
        move_uploaded_file($pname, $path);
        $sql2="UPDATE filespdf SET path_file='$path' WHERE id='$last_id'";
        if(mysqli_query($conn,$sql2)){
            echo "<p style='color:green'>File Sucessfully uploaded</p>";
        }
        else{
            echo "<p style='color:red'>Error !!!</p>";
        }
    }
    else{
        echo "<p style='color:red'>Error !!</p>";
    }
    
}

?>