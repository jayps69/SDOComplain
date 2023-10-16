
<?php

session_start()?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/panel.css" />
    <title>SDO CMS Manage Complaints</title>
    
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
                <a href="../admin/complaint.php" class="list-group-item list-group-item-action bg-transparent second-text active submenu-trigger "><i
                        class="fas fa-tachometer-alt me-2"></i>Manage Complaints</a>
                        <style>
                            /* Add CSS for the red box with arrow */
                            .red-box {
                                display: inline-block;
                                background-color: white;
                                color: red;
                                padding: 5px 10px;
                                border-radius: 5px;
                                margin-right: 10px;
                            }
                        </style>
                        <a href="../admin/complaint.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                            <span class="red-box">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <i class="fas fa-spinner fa-spin me-2"></i>Recieved
                        </a>
                        <a href="#submenu-link-2" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            <span class="red-box">
                                <i class="fas fa-arrow-right"></i>
                            </span><i class="fas fa-check me-2"></i>Referred
                        </a>
                        <a href="#submenu-link-3" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            <span class="red-box">
                                <i class="fas fa-arrow-right"></i>
                            </span><i class="fas fa-hand-paper me-2"></i>Replied
                        </a>
                        <a href="#submenu-link-4" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            <span class="red-box">
                                <i class="fas fa-arrow-right"></i>
                            </span><i class="fas fa-trophy me-2"></i>Submitted
                        </a>
                      
                        
                        
                
                <a href="../admin/adminCategory.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tag me-2"></i>Add Category</a>
                <a href="../admin/adminSubCategory.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-folder-plus me-2"></i>Add Sub Category</a>
                <a href="../admin/addschool.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-school me-2"></i>Add School</a>
                <a href="../admin/adminSource.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-plus me-2"></i>Add Source</a>
                <a href="../admin/adminManageUser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-times me-2"></i>Manage Account</a>
                <a href="../index.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Manage Complaints</h2>
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
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['admin_name']; ?>
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
            <button id="unbtn9" class="class="btn btn-success" onclick="window.location.href = '../admin/registration.php'"><i class="fas fa-plus"></i> Add</button>
            <button type="submit" id="unbtn10" class="unbtn10" name="delete" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO Delete THIS ITEM/S!')"><i class="fas fa-trash-alt"></i> Delete</button>
            <div class="container-fluid px-4">    
            
            <div class="table-container">
                
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">DTS NO.</th>
                        <th style="text-align: center;">NAME</th>
                        <th style="text-align: center;">CONTACT EMAILS</th>
                        <th style="text-align: center;">CONTACT DETAILS</th>
                        <th style="text-align: center;">TICKET REFERENCE NUMBER</th>
                        <th style="text-align: center;">CATEGORY</th>
                        <th style="text-align: center;">SUB CATEGORY</th>
                        <th style="text-align: center;">SOURCE</th>
                        <th style="text-align: center;">NAME OF SCHOOL or SECTION</th>
                        <th style="text-align: center;">DATE RECEIVED</th> 
                        <th style="text-align: center;">COMPLAINT DETAILS</th> 
                        <th style="text-align: center;">DATE BEFORE LAPSE</th>
                        <th style="text-align: center;">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                       
                    </tr>
                </tbody>
            </table>
            </div>
            </div>
            <button id="unbtn11" class="unbtn11" onclick="openModal()"><i class="fas fa-file-import"></i> Import Excel</button>
            <button type="submit" id="unbtn12" class="unbtn12"><i class="fas fa-file-export"></i> Export Excel</button>
            

            
             <div id="fileImportModal" class="modal-overlay">
             <style>
                /* Styles for the modal overlay */
                .modal-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center; /* Center horizontally */
                align-items: center; /* Center vertically */
                z-index: 1000; 
                margin: 20px; /* Add margin to create space */

                /* Styles for the modal content */
                }
                .modal-content {
                    background: white;
                    padding: 20px;
                    box-sizing: border-box;
                    border: 2px solid #ccc; /* Add border style */
                    border-radius: 5px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
                    max-width: 400px;
                    width: 100%;
                }
            </style>
                <!-- Modal content -->
                <div class="modal-content">
                    <h2>Import a File</h2>
                    <input type="file" id="fileInput" accept=".xls, .xlsx" style="margin-bottom: 10px;margin-top: 10px;">
                    <button type="submit" name="submit" onclick="importFile()" style="margin-bottom: 10px;">Import</button>
                    <button onclick="closeModal()">Cancel</button>
                </div>
            </div>
            <script>
                // Function to open the modal
                function openModal() {
                    document.getElementById('fileImportModal').style.display = 'flex';
                }

                // Function to close the modal
                function closeModal() {
                    document.getElementById('fileImportModal').style.display = 'none';
                }

                // Function to handle file import
                function importFile() {
                    const fileInput = document.getElementById('fileInput');
                    const selectedFile = fileInput.files[0];

                    if (selectedFile) {
                        // You can perform actions with the selected file here.
                        console.log('File selected:', selectedFile.name);
                    }

                    closeModal();
                }
            </script>

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
