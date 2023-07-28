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
$doctor->nama = $_POST['nama'];
$doctor->jabatan = $_POST['jabatan'];
$doctor->jenis_kelamin = $_POST['jenis_kelamin'];
$doctor->alamat = $_POST['alamat'];

// create the doctor
if($doctor->create()){
    $doctor_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $doctor->id,
        "nama" => $doctor->nama,
        "jabatan" => $doctor->jabatan,
        "jenis_kelamin" => $doctor->jenis_kelamin,
        "alamat" => $doctor->alamat,
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