<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "bootstrap.head.php"; ?>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Company Investments</h1>
</div>
  
<?php include "./utility/DBUtility.php";
      include "./utility/function.php";
      $sql = "select * from investment_summary_vw";
      $dbutility = new DBUtility();
      $rows = $dbutility->excute($sql);
?>

<div class="container">
  <div class="row">
  <?php foreach($rows as $index => $currentRow){
    $companyId = $currentRow["id"];
    $total = $currentRow["total"];
    $count = $currentRow["count"];
    $maximum = $currentRow["maximum"];
    ?>
    <div class="col-sm-4">
      <h4>Report <?=$index + 1?></h4>
      <p><a href="custom-report.php?companyId=<?=$companyId?>"> goto </a> <?= $currentRow["companyName"]?></p>
      <p>The company above has a total investments of <?= fmoney($total)?>
        and total <?= $count?> accounts. The largest company is worth <?= fmoney($maximum)?>.
      </p>
    </div>
      <?php } ?>

      <div class="col-sm-4">
          <h4>8 Marriage Report</h4>
          <p><a href="marriage-code.php"> goto </a></p>
          <p>This report contains the following codes: Single, Married, and Head of House Hold </p>
        </div>
  </div>
</div>


</body>
</html>
