<?php include 'inc/header.php'; ?>

<?php
// Set vars to empty values
$position = $company = $description = $salary = '';
$positionErr = $companylErr = $descriptionErr = $salaryErr = '';

// Form submit
if (isset($_POST['submit'])) {
  // Validate name
  if (empty($_POST['position'])) {
    $positionErr = 'Position is required';
  } else {
   
    $position = filter_input(
      INPUT_POST,
      'position',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }

  // Validate company name
  if (empty($_POST['company'])) {
    $companyErr = 'Company Name is required';
  } else {
    
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($_POST['salary'])) {
    $salaryErr = 'Salary required';
  } else {
   
    $salary = (int)filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_SPECIAL_CHARS);
    
  }

  // Validate body
  if (empty($_POST['description'])) {
    $descriptionErr = 'Description is required';
    
  } else {
    $description = filter_input(
      INPUT_POST,
      'description',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    
  }

  if (empty($positionErr) && empty($companyErr) && empty($salaryErr) && empty($descriptionErr)) {
    // add to database
    // $sql = "INSERT INTO jobcool (position, company, ) VALUES ('$position', '$company', '$salary', $description')";
    $sql = "INSERT INTO job (position, company, salary, description) VALUES ('$position' , '$company', '$salary', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      // success
      header('Location:job.php');
    } else {
      // error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}
?>

    <img id="img1" src="/jobcool/img/logo.jpeg" class="w-25 mb-3 mt-5" alt="" style="border-radius: 30px;">
    <h2>Jobcool</h2>
   
    <p class="lead text-center">Create a job here</p>

    <form method="POST" action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
    ); ?>" class="mt-4 w-75">
      <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <input type="text" class="form-control <?php echo !$positionErr ?:
          'is-invalid'; ?>" id="position" name="position" placeholder="Enter the position" value="<?php echo $position; ?>">
        <div id="validationServerFeedback" class="invalid-feedback">
          Please insert the position
        </div>
      </div>
      <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <input type="text" class="form-control <?php echo !$companyErr ?:
          'is-invalid'; ?>" id="company" name="company" placeholder="Enter the company name" value="<?php echo $company; ?>">
            <div id="validationServerFeedback" class="invalid-feedback">
          Please insert company name.
        </div>
      </div> 
      <div class = "mb-3">
        <label for = "salary" class = "form-label ">Salary</label>
        <input type="number" class="form-control <?php echo !$salaryErr ?:
          'is-invalid'; ?>" id="salary" name="salary" placeholder="Enter the salary" value="<?php echo $salary; ?>">
          <div id="validationServerFeedback" class="invalid-feedback">
          Please insert salary
        </div>
      </div>
      <div class="mb-3">
        <label for="des" class="form-label">Description</label>
        <textarea class="form-control <?php echo !$descriptionErr ?:
          'is-invalid'; ?>" id="description" name="description" placeholder="Enter your description"><?php echo $description; ?></textarea>
            <div id="validationServerFeedback" class="invalid-feedback">
            Please insert description
          </div>
      </div> <br> <br>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-warning w-100">
      </div>
    </form>
<?php include 'inc/footer.php'; ?>


<!-- <h2>Rounded Image</h2>

<p>Use the border-radius property to create rounded images:</p>

<img src="paris.jpg" alt="Paris" width="300" height="300"> -->

</body>
</html>