<?php
include("conn.php");
 function check_login($conn)
{
   if(isset($_SESSION['user_id']))

   {
     $id=$_SESSION['user_id'];
     $query="select * from users where user_id='$id' limit 1";
     $result=mysqli_query($conn,$query);
    if($result && mysqli_num_rows($result)>0)
    {
        $user_data=mysqli_fetch_assoc($result);
        return $user_data;
    }
   }
   //redirect to login
   header("Location:log.php");
   die;
}
function check_admin_login($conn)
{
   if(isset($_SESSION['admin_id']))
   {
     $id=$_SESSION['admin_id'];
     $query="select * from admins where admin_id='$id' limit 1";

     $admin_result=mysqli_query($conn,$query);

     if($admin_result && mysqli_num_rows($admin_result)>0)
     {
        $admin_data=mysqli_fetch_assoc($admin_result);
       # mysqli_close($conn);
        return $admin_data;
     }
   }
   
   // Close database connection and redirect to login page
   mysqli_close($conn);
   header("Location:adminlogin.php");
   die;
}
function random_num($length)
{
    $text="";
    if($length < 5)
    {
        $length=5;

    }

    $len=rand(4,$length);
    for($i=0; $i<$len; $i++){
        #code ...
        $text .=rand(0,9);

    }
    return $text;



}
function get_users() {
    global $conn;
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>