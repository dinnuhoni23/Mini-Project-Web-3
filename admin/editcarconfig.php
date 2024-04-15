<?php
session_start();
include_once('../config/connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_car_config_submit'])) {
        // Process form submission
        $carModel = $_POST['carModel'];
        $carType = $_POST['carType'];
        $carColor = $_POST['carColor'];
        
        // Check if carFeatures is set, otherwise initialize an empty array
        $carFeatures = isset($_POST['carFeatures']) ? implode(", ", $_POST['carFeatures']) : [];

        // Query to update car configuration
        $update_query = "UPDATE car_configurations SET car_model = ?, car_type = ?, car_color = ?, car_features = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssssi", $carModel, $carType, $carColor, $carFeatures, $id);
        $stmt->execute();

        $_SESSION['alert'] = "success"; // Set alert success
        header("Location: configuration.php"); // Redirect back to car configuration page
        exit();
    }

    // Query to retrieve car configuration details by ID
    $query = "SELECT * FROM car_configurations WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // You can use the fetched data to pre-fill the form for editing
        $carModel = $row['car_model'];
        $carType = $row['car_type'];
        $carColor = $row['car_color'];
        $carFeatures = explode(", ", $row['car_features']);
    } else {
        // If no car configuration found with the given ID, redirect back to car configuration page
        $_SESSION['alert'] = "error";
        header("Location: configuration.php");
        exit();
    }
} else {
    // If no ID provided, redirect back to car configuration page
    $_SESSION['alert'] = "error";
    header("Location: configuration.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>

<body>

  <?php include 'header.php'; ?>

  <!-- Car Configuration Form for Editing -->
  <div class="container container-fluid pt-4 pb-4 px-5">
    <h2 class="text-center">Edit Car Configuration</h2>
    <form class="row g-3 mt-3" id="carConfigForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="col-md-6">
        <label for="inputCarModel" class="form-label">Car Model</label>
        <select id="inputCarModel" class="form-select" name="carModel" required>
          <option value="creta" <?php if ($carModel == "creta") echo "selected"; ?>>Creta</option>
          <option value="stargazer" <?php if ($carModel == "stargazer") echo "selected"; ?>>Stargazer</option>
          <option value="ioniq 5" <?php if ($carModel == "ioniq 5") echo "selected"; ?>>Ioniq 5</option>
          <option value="palisade" <?php if ($carModel == "palisade") echo "selected"; ?>>Palisade</option>
          <option value="sante fe" <?php if ($carModel == "sante fe") echo "selected"; ?>>Sante Fe</option>
          <option value="ioniq 6" <?php if ($carModel == "ioniq 6") echo "selected"; ?>>Ioniq 6</option>
          <option value="staria" <?php if ($carModel == "staria") echo "selected"; ?>>Staria</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputCarType" class="form-label">Car Type</label>
        <select id="inputCarType" class="form-select" name="carType" required>
          <option value="SUV" <?php if ($carType == "SUV") echo "selected"; ?>>SUV</option>
          <option value="Sedan" <?php if ($carType == "Sedan") echo "selected"; ?>>Sedan</option>
          <option value="Hatchback" <?php if ($carType == "Hatchback") echo "selected"; ?>>Hatchback</option>
          <option value="Convertible" <?php if ($carType == "Convertible") echo "selected"; ?>>Convertible</option>
          <option value="MPV" <?php if ($carType == "MPV") echo "selected"; ?>>MPV</option>
          <option value="Truck" <?php if ($carType == "Truck") echo "selected"; ?>>Truck</option>
          <option value="Coupe" <?php if ($carType == "Coupe") echo "selected"; ?>>Coupe</option>
          <option value="Van" <?php if ($carType == "Van") echo "selected"; ?>>Van</option>
          <option value="Crossover" <?php if ($carType == "Crossover") echo "selected"; ?>>Crossover</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputCarColor" class="form-label">Car Color</label>
        <input type="color" class="form-control" id="inputCarColor" name="carColor" value="<?php echo $carColor; ?>" required>
      </div>
      <div class="col-md-6">
        <label for="inputCarFeatures" class="form-label">Car Features</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="sunroof" id="sunroof" name="carFeatures[]" <?php if (in_array("sunroof", $carFeatures)) echo "checked"; ?>>
          <label class="form-check-label" for="sunroof">
            Sunroof
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="leather seats" id="leatherSeats" name="carFeatures[]" <?php if (in_array("leather seats", $carFeatures)) echo "checked"; ?>>
          <label class="form-check-label" for="leatherSeats">
            Leather Seats
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="backup camera" id="backupCamera" name="carFeatures[]" <?php if (in_array("backup camera", $carFeatures)) echo "checked"; ?>>
          <label class="form-check-label" for="backupCamera">
            Backup Camera
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="bluetooth" id="bluetooth" name="carFeatures[]" <?php if (in_array("bluetooth", $carFeatures)) echo "checked"; ?>>
          <label class="form-check-label" for="bluetooth">
            Bluetooth Connectivity
          </label>
        </div>
      </div>
      <div class="col-12">
        <input type="submit" class="btn btn-primary" id="submitBtn" name="edit_car_config_submit" value="Update Configuration">
      </div>
    </form>
  </div>

  <?php include '../footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>

</html>
