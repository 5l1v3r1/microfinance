
<div class="box">
  <div class="box-body">
    <?php
         $rs = query("SELECT * FROM department");
         while($row = mysql_fetch_array($rs)){
           $idd = $row['id'];
           $name = $row['dep_name'];
    ?>

<table class="table">
<thead>
  <tr>
    <th>
      <h3>Department:    <?php echo $name; ?></h3>
    </th>
  </tr>
  <tr>
    <th>S/N</th>
    <th>UserId</th>
    <th>FullName</th>
    <th>Monthly Amount</th>
    <th>Balance to Pay</th>
    <th>Total Loan</th>
  </tr>
</thead>
<tbody>
<?php
$result = query("SELECT emp_no, surname, firstname, amort, paid, total FROM customer LEFT JOIN loan ON customer.id=loan.emp_no WHERE dept='$idd'");
$i = 0;
$sum = 0;
while($row = mysql_fetch_array($result)){
$id = $row['emp_no'];
$fullname = $row['firstname'] . $row['surname'];
$amount = $row['amort'];
$paid = $row['paid'];
$total = $row['total'];
$bal = $total - $paid;
$bal -= $amount;
$sum += $total;
?>
<tr>
  <td><?php echo ++$i;?></td>
  <td><?php echo $id;?></td>
  <td><?php echo $fullname;?></td>
  <td><?php echo $amount;?></td>
  <td><?php echo $bal;?></td>
  <td><?php echo $total;?></td>
</tr>
<?php
}
?>
<tr>
  <th>Sum Total</th>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <th><?php echo $sum; ?></th>
</tr>
</tbody>
</table>
<?php
}
 ?>
</div>
</div>
<a href="../print_loan.php" class="btn btn-primary">Print</a>
