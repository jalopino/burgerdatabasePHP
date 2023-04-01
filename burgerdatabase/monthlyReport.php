<?php
include("fetchDataMonthly.php");
date_default_timezone_set('Asia/Manila');
$date = date('d-m-y h:i:s');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<h1 class="ml-5 mt-2">Monthly Reports</h1>
<p class="ml-5">Date today: <?php echo $date ?></p>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         <th>Full Name</th>
         <th>Burger</th>
         <th>Qty</th>
         <th>Price</th>
         <th>Day</th>
         <th>Month</th>
         <th>Year</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['fullname']??''; ?></td>
      <td><?php echo $data['burger']??''; ?></td>
      <td><?php echo $data['qty']??''; ?></td>
              <!-- Price Code -->

              <td>$<?php 
      $string = $data['qty']??'';
      $converted = intval($string);
      echo $converted * 7; 
      ?></td>

        <!-- Price Code -->
      <td><?php echo $data['day']??''; ?></td>
      <td><?php echo $data['month']??''; ?></td>
      <td><?php echo $data['year']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>