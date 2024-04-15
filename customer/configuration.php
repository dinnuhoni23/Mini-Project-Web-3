<?php
session_start();
include_once('../config/connect.php');

$fullName = "";
$phoneNumber = "";

if (isset($_SESSION['alert'])) {
    if ($_SESSION['alert'] == "success") {
        echo '<div class="alert alert-success" role="alert">Car configuration added successfully!</div>';
    } elseif ($_SESSION['alert'] == "error") {
        echo '<div class="alert alert-danger" role="alert">Please select your car model first. Please try again.</div>';
    }
    unset($_SESSION['alert']);
}


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM customer WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['postal_code'] = $row['postal_code'];
        $_SESSION['city'] = $row['city'];
        
        $fullName = $row['firstname'] . ' ' . $row['lastname'];
        $phoneNumber = $row['phone'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php'; ?>
</head>

<body>

  <?php include 'header.php'; ?>

  <!-- Car Configuration Form -->
  <div class="container container-fluid pt-4 pb-4 px-5">
    <h2 class="text-center">Car Configuration</h2>
    <form class="row g-3 mt-3" id="carConfigForm" action="processcarconfig.php" method="POST">
      <div class="col-md-6">
        <label for="inputFullName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="inputFullName" name="fullName" value="<?php echo htmlspecialchars($fullName); ?>" readonly required>
      </div>
      <div class="col-md-6">
        <label for="inputPhoneNumber" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="inputPhoneNumber" name="phoneNumber" value="<?php echo htmlspecialchars($phoneNumber); ?>" readonly required>
      </div>
      <div class="col-md-6">
        <label for="inputCarType" class="form-label">Car Type</label>
        <select id="inputCarType" class="form-select" name="carType" required>
          <option selected disabled>Choose...</option>
          <option value="SUV">SUV</option>
          <option value="Sedan">Sedan</option>
          <option value="Hatchback">Hatchback</option>
          <option value="MPV">MPV</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputCarModel" class="form-label">Car Model</label>
        <select id="inputCarModel" class="form-select" name="carModel" required>
          <option selected disabled>Choose Car Type First</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputCarColor" class="form-label">Car Color</label>
        <input type="color" class="form-control" id="inputCarColor" name="carColor" required>
      </div>
      <div class="col-md-6">
        <label for="inputCarFeatures" class="form-label">Car Features</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="sunroof" id="sunroof" name="carFeatures[]">
          <label class="form-check-label" for="sunroof">
            Sunroof
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="leather seats" id="leatherSeats" name="carFeatures[]">
          <label class="form-check-label" for="leatherSeats">
            Leather Seats
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="backup camera" id="backupCamera" name="carFeatures[]">
          <label class="form-check-label" for="backupCamera">
            Backup Camera
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="bluetooth" id="bluetooth" name="carFeatures[]">
          <label class="form-check-label" for="bluetooth">
            Bluetooth Connectivity
          </label>
        </div>
      </div>
      <div class="col-12">
        <input type="submit" class="btn btn-primary" id="submitBtn" name="car_config_submit" value="Submit Configuration">
      </div>
    </form>
  </div>

  <?php include '../footer.php'; ?>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Ambil elemen select untuk tipe mobil dan model mobil
      const carTypeSelect = document.getElementById("inputCarType");
      const carModelSelect = document.getElementById("inputCarModel");

      // Daftar opsi model mobil berdasarkan tipe
      const carModels = {
        SUV: ["Palisade", "Sante Fe", "Creta"],
        Sedan: ["Ioniq 6"],
        Hatchback: ["Ioniq 5"],
        MPV: ["Staria", "Stargazer"]
      };

      // Fungsi untuk mengupdate opsi model mobil berdasarkan tipe yang dipilih
      function updateCarModels() {
        const selectedCarType = carTypeSelect.value;
        const models = carModels[selectedCarType] || [];

        // Kosongkan opsi model mobil yang ada
        carModelSelect.innerHTML = '<option selected disabled>Choose...</option>';

        // Tambahkan opsi model mobil yang sesuai dengan tipe yang dipilih
        models.forEach(function(model) {
          const option = document.createElement('option');
          option.value = model.toLowerCase().replace(/\s+/g, '');
          option.textContent = model;
          carModelSelect.appendChild(option);
        });
      }

      // Panggil fungsi updateCarModels() ketika nilai tipe mobil berubah
      carTypeSelect.addEventListener("change", updateCarModels);

      // Panggil updateCarModels() saat halaman dimuat untuk pertama kalinya
      updateCarModels();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>
</html>
