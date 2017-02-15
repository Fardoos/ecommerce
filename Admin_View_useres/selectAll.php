<?php


$dbhost= 'localhost';
$dbuser= 'root';
$dbpass='iti';
$dbname='ecommerce';
// open connection
$mysqli = new mysqli($dbhost, $dbuser,$dbpass);
$mysqli->select_db($dbname);

$name=$_POST['username'];
if($name == "choose user"){
    
    http_response_code(400);
}

$query="select * from users where username=? and role=0 ";
$stmt = $mysqli->prepare($query);

if(!$stmt){
    echo "preparation failed ".$mysqli->errno." : ".$mysqli->error."<br>";
}



$stmt->bind_param('s',$name );
$stmt->execute();   
$result = $stmt->get_result();
$row = $result->fetch_array();
if($row){
  
    $result = [$row['username'],$row['email'],
               $row['address'],$row['job'],
               $row['birthDate'],$row['creditLimit']];
   
}
else
    return false;

echo json_encode($result);


    
?>