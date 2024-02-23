<?php
    include '../index/dbconnect.inc.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="DELETE FROM `message` where id='$id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Delete Successfull";
            header('location:../index/index_admin.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }

?>