<?php
  // require "../src/models/Car.php";
  // require "../src/controllers/CarController.php";
  require "../vendor/autoload.php";

  use Jorge\Cars\Controllers\CarController;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars</title>
</head>
<body>
  <h1>Ejercicio de coches</h1>
  <?php
    $controller = new CarController();
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($_GET["action"])) {
      $action = $_GET["action"];
      if ($action == "delete") {
        $controller->delete($id);
      }
    }else {
      $controller->show($id);
    }
  }else {
    $controller->create();
    $controller->list();
  }
  ?>
</body>
</html>