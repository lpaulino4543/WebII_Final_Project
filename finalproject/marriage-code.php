<!DOCTYPE html>
<html lang="en">

<head>
  <title>Manager/Developer Paulino</title>
  <?php include "bootstrap.head.php";
  include "./utility/DBUtility.php";
  include "./utility/Format.php";
  include "./utility/function.php";
  $dbutility = new DBUtility();
  $sql = "select id, first_name, last_name, salary, description 
        From people_vw 
        Where code = 'S' 
        Order By id";

  $sql2 = "select id, first_name, last_name, salary,description from people_vw where code = 'S'";
  $rows = $dbutility->excute($sql);

  ?>
</head>

<body>

  <div class="container">
    <h2>Top 10 Single People<a href="./"> goto index </a></h2>
    <p>A list of people</p>
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>salary</th>
          <th>description</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $currentRow) { ?>
          <tr>
            <td><?= $currentRow["id"] ?></td>
            <td><?= $currentRow["last_name"] . ', ' . $currentRow["first_name"] ?></td>
            <td><?= money($currentRow["salary"]) ?></td>
            <td><?= $currentRow["description"] ?></td>

          </tr>

        <?php } ?>


      </tbody>
      <tfoot>
        <tr>
          <td>Average Salary: </td>
          <td colspan="4"><?= fmoney(avgSalary($rows)); ?></td>
        </tr>
        <tr>
          <td>Total Salary:</td>
          <td colspan="4"><?= fmoney(sumSalary($rows)); ?></td>
        </tr>
        <tr>
          <td>Maximum Salary:</td>
          <td colspan="4"><?= fmoney(maxSalary($rows)); ?></td>
        </tr>
        <tr>
          <td>Minimum Salary:</td>
          <td colspan="4"><?= fmoney(minSalary($rows)); ?></td>
        </tr>
      </tfoot>
    </table>
  </div>
</body>

</html>