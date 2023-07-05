<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="src/resources/icons/logo.ico">
  <link rel="stylesheet" href="src/css/style.css"/>
  <link rel="stylesheet" href="src/css/report.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
  <script src="/key_quest/src/js/script.js" type="text/javascript"></script>
  <title>Basket</title>
</head>
<body>
<?php include_once 'headband.php'; ?>
<main>
  <?php
  require_once File ::buildPath([
    'model',
    'Model.php'
  ]);

  $pdo = Model ::getPDO();

  $tables = ['Products', 'Users', 'Baskets', 'Items', 'Favorites'];

  foreach ($tables as $table) {
    // Prepare the SQL statement
    $sql = "SELECT * FROM $table";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_ASSOC);

    // Display the table heading
    echo "<h2 class='table-heading'>$table :</h2>";

    if (!empty($results)) {
      // Display the table data
      echo "
        <div class='table-wrapper'>
          <table class='table-style'>
            <thead>
              <tr>
      ";

      // Retrieve the column names from the first result
      $columnNames = array_keys($results[0]);
      foreach ($columnNames as $columnName) {
        echo "<th>$columnName</th>";
      }

      echo "
            </tr>
          </thead>
        <tbody>
      ";

      // Display each row of data
      foreach ($results as $result) {
        echo "<tr>";
        foreach ($result as $value) {
          echo "<td class='ellipsis'>$value</td>";
        }
        echo "</tr>";
      }

      echo "
            </tbody>
          </table>
        </div>
      ";
    } else {
      // No data available in the table
      echo "<p style='margin-left: 20px'>No data available in this table.</p>";
    }
  }
  ?>
</main>
</body>
</html>
