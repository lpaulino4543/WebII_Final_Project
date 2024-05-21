<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manager/Developer Paulino</title>
  <?php include "bootstrap.head.php"; 
        include "./utility/DBUtility.php";
        include "./utility/Format.php";
        $dbutility = new DBUtility();
        $sql = "select id, symbol, issuerName, sharesValue 
        From investments 
        Where companyId = 'B002' AND sharesValue > 5
        Order By issuerName 
        limit 50";

      $sql2 = "select id, company_name from company_name where id = 'B002'";
      $rows = $dbutility->excute($sql);
      $rowWCompanyName = $dbutility->excute($sql2);
      $manager = $rowWCompanyName[0]["company_name"];
  ?>
</head>
<body>

<div class="container">
  <h2>Managed by <?= $manager?> <a href="./"> goto index </a></h2>
  <p>A list of companies that are worth more than 5 billion dollars</p>            
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>symbol</th>
        <th>issuer name</th>
        <th>shares value</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($rows as $currentRow){ ?>
          <tr>
            <td><?= $currentRow["id"]?></td>
            <td><?= $currentRow["symbol"]?></td>
            <td><?= $currentRow["issuerName"]?></td>
            <td class="money"><?= money($currentRow["sharesValue"])?></td>
      </tr>
        
        <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
