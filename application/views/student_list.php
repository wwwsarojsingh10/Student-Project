<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0,0,0,0.05);
            margin-top: 30px;
        }
        .table thead {
            background: #0d6efd;
            color: white;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body> 

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Students List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo site_url('Student/register') ?>">➕ Add New</a>
                    </li>
                </ul>
                <form class="d-flex" action="<?php echo site_url('student/search') ?>" method="get">
                    <input class="form-control me-2"
                        value="<?php echo isset($search_name) && $search_name != '' ? $search_name : ""; ?>"
                        name="search_name" type="search" placeholder="Search by name" aria-label="Search" />
                    <button class="btn btn-light text-primary border-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Table -->
    <div class="container">
        <div class="table-container">
            <h4 class="mb-4">Student Records</h4>
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Mobile No.</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($students as $key => $value) { ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['mobile'] ?></td>
                            <td><?php echo $value['course'] ?></td>
                            <td>
                                <a class="btn btn-info btn-sm text-white" href="<?php echo site_url('Student/profile?id=' . $value['id']) ?>">View</a>
                                <a class="btn btn-warning btn-sm text-white" href="<?php echo site_url('Student/edit?id=' . $value['id']) ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="<?php echo site_url('Student/delete?id=' . $value['id']); ?>"
                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
