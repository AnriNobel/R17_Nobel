<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/doctor.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare doctor object
$doctor = new Doctor($db);
 
// set doctor property values
$doctor->id = $_POST['id'];
$doctor->nama = $_POST['name'];
$doctor->jabatan = $_POST['jabatan'];
$doctor->jenis_kelamin = $_POST['jenis_kelamin'];
$doctor->alamat = $_POST['alamat'];
 
// create the doctor
if($doctor->update()){
    $doctor_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $doctor_arr=array(
        "status" => false,
        "message" => "ID already exists!"
    );
}
print_r(json_encode($doctor_arr));
?>