<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/panel.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <title>SDO CMS Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="../image/sdolog2.png" alt="A beautiful example image" style="width: 50px; height: 50px; padding: 5px"></i>SDO CMS</div>
            <div class="list-group list-group-flush my-3">
                <a href="../admin/adminDashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="../admin/complaint.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-wrench me-2"></i>Manage Complaints</a>
                <a href="../admin/adminCategory.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tag me-2"></i>Add Category</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-folder-plus me-2"></i>Add Sub Category</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-school me-2"></i>Add School</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-plus me-2"></i>Add Source</a>
                <a href="../admin/adminManageUser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-times me-2"></i>Manage Account</a>
                <a href="../index.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Add Category</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>ADMIN
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search...">
                <button id="search-button"><i class="fas fa-search"></i></button>   
            </div>
            <button type="button" id="unbtn" class="unbtn" data-bs-toggle="modal" data-bs-target="#exampleModal4"><i class="fas fa-plus"></i> Add</button>
            <button type="button" id="unbtn1" class="unbtn1"><i class="fas fa-trash-alt"></i> Delete</button>
            <div class="container-fluid px-4">    
            
            <div class="table-container">
                
            <table>
                <thead>
                    <tr> 
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Add Category By</th>
                        <th style="text-align: center;">Date Created</th>
                        <th style="text-align: center;">Update Category By</th>
                        <th style="text-align: center;">Date Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                        <td style="text-align: center;">Abused</td>
                        <td style="text-align: center;">Leica Guzman</td>
                        <td style="text-align: center;">09-23-2023</td>
                        <td style="text-align: center;">Leica Guzman</td>
                        <td style="text-align: center;">09-24-2023</td>
                    </tr>
                </tbody>
            </table>
            </div>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2"><img src="../image/sdolog2.png" alt="A beautiful example image" style="width: 50px; height: 50px; padding: 5px"></i>Add Complaint Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <input type="text" class="form-control" id="catid" name="catid" placeholder="Enter Company ID Number" hidden>
                                </div>
                                <div>
                                    <label for="category" class="form-label">Category:</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" required>
                                </div>
                                <div>
                                    <label for="catCreate" class="form-label">Category By:</label>
                                    <input type="text" class="form-control" id="catCreat" name="catCreat" placeholder="Enter Category By" required>
                                </div>
                                <div>
                                    <label for="dateCreate" class="form-label">Date Created:</label>
                                    <input type="date" class="form-control" id="dateCreate" name="dateCreate1" placeholder="Enter Date Creation" required>
                                </div>
                                <div>
                                    <label for="upCreate" class="form-label">Update Category By:</label>
                                    <input type="text" class="form-control" id="aupCreate" name="upCreate" value="N/A" placeholder="Enter Update Category By" readonly>
                                </div>
                                <div>
                                    <label for="dateUpdate" class="form-label">Date Updated:</label>
                                    <input type="date" class="form-control" id="dateUpdate" name="dateUpdate"  placeholder="Enter Date Updated" readonly>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="updateBtn">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="../js/chart1.js"></script>
    <script src="../js/chart2.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        
    </script>
</body>

</html>