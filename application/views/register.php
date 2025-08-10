<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .register-card {
      max-width: 500px;
      margin: auto;
      margin-top: 50px;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      font-weight: bold;
      color: #007bff;
    }
  </style>
</head>

<body>

  <div class="register-card">
    <h3 class="text-center form-title mb-4">Student <?php echo isset($student) && $student['id'] > 0 ? 'Edit' : 'Registration' ?></h3>

    <form action="<?php echo isset($student) && $student['id'] > 0 ? site_url('student/update') : site_url('student/register') ?>" method="post">
      <input type="hidden" name="id" value="<?php echo isset($student) ? $student['id'] : '' ?>" >
      <!-- Student Name -->
      <div class="mb-3">
        <label class="form-label">Student Name</label>
        <input type="text" name="name" class="form-control"  pattern="[A-Za-z\s]+" value="<?php echo isset($student) && $student['name'] !='' ? $student['name'] : "" ?>" placeholder="Enter full name" required>
      </div>

      <!-- Student Email -->
      <div class="mb-3">
        <label class="form-label">Student Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo isset($student) && $student['email'] !='' ? $student['email'] : "" ?>" placeholder="Enter email address" required>
      </div>

      <!-- Student Mobile -->
      <div class="mb-3">
        <label class="form-label">Student Mobile</label>
        <input type="tel" name="mobile" class="form-control" value="<?php echo isset($student) && $student['mobile'] !='' ? $student['mobile'] : "" ?>" placeholder="Enter mobile number"
          pattern="[0-9]{10}" required>
      </div>

      <!-- Student Course -->
      <div class="mb-3">
        <label class="form-label">Student Course</label>
        <select name="course" class="form-select" required>
          <option value="">Select Course</option>
          <option value="BCA" <?php echo isset($student) && $student['course'] =='BCA' ? "selected" : "" ?>>BCA</option>
          <option value="B.Tech" <?php echo isset($student) && $student['course'] =='B.Tech' ? "selected" : "" ?>>B.Tech</option>
          <option value="MCA" <?php echo isset($student) && $student['course'] =='MCA' ? "selected" : "" ?>>MCA</option>
          <option value="MBA" <?php echo isset($student) && $student['course'] =='MBA' ? "selected" : "" ?>>MBA</option>
        </select>
      </div>

      <!-- Submit Button -->
      <div class="d-grid">
        <button type="submit" name="submit" class="btn btn-primary"><?php echo isset($student) && $student['id'] > 0 ? 'Update' : 'Register' ?></button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>