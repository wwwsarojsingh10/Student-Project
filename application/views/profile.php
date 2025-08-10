<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .profile-card {
      max-width: 600px;
      margin: auto;
      margin-top: 50px;
      background: white;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    .profile-pic {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #007bff;
    }

    .profile-name {
      font-size: 1.8rem;
      font-weight: bold;
    }

    .profile-info {
      font-size: 1rem;
      color: #6c757d;
    }
  </style>
</head>

<body>

  <div class="profile-card text-center">
    <h3 class="profile-name mt-3"><?php echo strtoupper($student['name']); ?></h3>
    <hr>

    <div class="text-start">
      <p><strong>Course : </strong><?php echo strtoupper($student['course']); ?></p>
      <p><strong>Email : </strong> <?php echo strtoupper($student['email']); ?></p>
      <p><strong>Phone : </strong><?php echo strtoupper($student['mobile']); ?></p>
    </div>

    <a href="<?php echo site_url('Student/edit?id='.$student['id']) ?>" class="btn btn-primary mt-3">Edit Profile</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>