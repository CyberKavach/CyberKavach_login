<?php
include "connectdb.php";
$username = $_POST["username"];
$x= $_POST["password"];
$password = hash('md5',$x);
$sql= "SELECT `USERNAME`,`PASSWORD` FROM `USERS`";
$result = mysqli_query($conn,$sql);
$sqlo= "SELECT `EMAIL`,`PASSWORD` FROM `USERS` WHERE `USERNAME`='$username'";
$result1 = mysqli_query($conn,$sqlo);
set_time_limit(0);
$m=0;
$crow = mysqli_fetch_assoc($result1);
while($row = mysqli_fetch_assoc($result)){
if($row["USERNAME"]==$username){
    if($row["PASSWORD"]==$password){
$m++;
session_start();
$_SESSION['name'] = $username;
$_SESSION['id'] = $crow["EMAIL"];
$_SESSION['pass'] = $_POST['password'];
$_SESSION['Points'] = $crow["POINTS"];
header("Location: https://cyberkavach.epizy.com/home.php");
}}
}
if($m==0){
echo "USER NAME OR PASSWORD IS NOT CORRECT OR YOU MIGHT HAVE NOT REGISTERED";
header("Location: https://cyberkavach.epizy.com/index.php");
}
?>