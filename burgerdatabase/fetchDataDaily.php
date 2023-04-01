<?php
require("conn.php");
$db=$connect;
$tableName="burgertbl";
$columns= ['id', 'fullname','burger','qty','day', 'month','year'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
date_default_timezone_set('Asia/Manila');
$day = date('d'); //-m-y h:i:s
$month = date('m');
$year = date('y'); 
$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." WHERE day LIKE '%$day%' AND month LIKE '%$month%' AND year LIKE '%$year%' ORDER BY id DESC";
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>