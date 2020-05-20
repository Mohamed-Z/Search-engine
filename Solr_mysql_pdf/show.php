<?php

include "dbconnect.php";


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM files WHERE id='$id' ";

    $result=mysqli_query($conn,$sql);

   	while($row = mysqli_fetch_assoc($result)){
            $file=$row['path_file'];
        }
        header("$file");
        //echo $file;
}else{
	echo "Error";
}

?>