<?php
session_start();
$db=mysqli_connect("localhost", "root", "", "drug_account");

if (isset($_POST['btn'])){
    $username=mysqli_real_escape_string($db,$_POST['user_id']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $radio=mysqli_real_escape_string($db,$_POST['end_user']);
    $txt="customer";
    if($radio=$txt){
    $sql="SELECT * FROM Customer WHERE user_id='$username' && password='$password'";
    $result=mysqli_query($db, $sql);

    if (mysqli_num_rows($result)>0){
        header("location: home.html");
    }else{
        echo "<p>Username/Password Combination Is Incorrect...</p>";
    }
    }else{
        $sql="SELECT * FROM Pharmacist WHERE user_id='$username' && password='$password'";
        $result=mysqli_query($db, $sql);

    if (mysqli_num_rows($result)>0){
        header("location: home.html");
    }else{
        echo "<p>Username/Password Combination Is Incorrect...</p>";
    }
    }
}
  
?>
<?php
$db=mysqli_connect("localhost", "root", "", "drug_account");

if (isset($_POST['sbtn'])){
    $susername=filter_input(INPUT_POST,'user_id');
    $semail=filter_input(INPUT_POST,'email_id');
    $smobile=filter_input(INPUT_POST,'mobile_no');
    $spassword=filter_input(INPUT_POST,'password1');
    $sradio=filter_input(INPUT_POST,'end_user');
    $stxt="customer";

    if($sradio=$stxt){
            $sql="INSERT INTO Customer(user_id, email, mobile, password) VALUES('$susername', '$semail', '$smobile', '$spassword') ";
            mysqli_query($db,$sql);
            echo "<p>Your Account Has Been Successfully Created...</p>";
    }else{
            $sql="INSERT INTO Pharmacist(user_id, email, mobile, password) VALUES('$susername', '$semail', '$smobile', '$spassword') ";
            mysqli_query($db,$sql);
            echo "<p>Your Account Has Been Successfully Created...</p>";
    }
}
?>

<?php
$db=mysqli_connect("localhost", "root", "", "drug_account");

    
    if (isset($_POST['dbtn'])){
        $name=filter_input(INPUT_POST,'name');
        $dname=filter_input(INPUT_POST,'dname');
        $dosage=filter_input(INPUT_POST,'dosage');
        $age=filter_input(INPUT_POST,'age');
        $desc=mysqli_real_escape_string($db,$_POST['desc']);
    
        $sql="INSERT INTO drugs(pharmacist, drug_name, dosage, age, description) VALUES('$name', '$dname', '$dosage', '$age', '$desc') ";
        mysqli_query($db,$sql);
        header("location: phome.html");
        echo"shshshj";
        
    }
    ?>

<?php

$db=mysqli_connect("localhost", "root", "", "drug_account");
if (isset($_POST['upbtn'])){
$name=mysqli_real_escape_string($db,$_POST['name']);
$dname=mysqli_real_escape_string($db,$_POST['dname']);
$radio=mysqli_real_escape_string($db,$_POST['chk']);
$up=filter_input(INPUT_POST,'updata');
$t1="Dosage";

if($radio==$t1){
    $sql = "UPDATE drugs SET dosage='$up' WHERE pharmacist='$name' AND drug_name='$dname' ";
}
else{
    $sql = "UPDATE drugs SET age='$up' WHERE pharmacist='$name' AND drug_name='$dname'";
}


mysqli_query($db, $sql);
header("location: phome.html");
}

mysqli_close($db);
?>

<?php

$db=mysqli_connect("localhost", "root", "", "drug_account");
if (isset($_POST['delbtn'])){
$name=mysqli_real_escape_string($db,$_POST['name']);
$dname=mysqli_real_escape_string($db,$_POST['dname']);


$sql = "DELETE FROM drugs WHERE pharmacist='$name' AND drug_name='$dname'";

mysqli_query($db, $sql);
header("location: phome.html");
}
mysqli_close($db);
?>
