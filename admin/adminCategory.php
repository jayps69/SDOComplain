
<?php

session_start()?>
<!DOCTYPE html>
<html lang="en">
<?php ob_start()
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/panel.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <title>SDO CMS Add Category</title>
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
            <form method="POST" enctype="multipart/form-data">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search..."name="txtsearch">
                <button type="submit " name="search" id="search-button"><i class="fas fa-search"></i></button>   
            </div>
            <button type="button" id="unbtn" class="unbtn" data-bs-toggle="modal" data-bs-target="#exampleModal4"><i class="fas fa-plus"></i> Add</button>
            <button type="submit" id="unbtn1" class="unbtn1" name="delete" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO Delete THIS ITEM/S!')"><i class="fas fa-trash-alt"></i> Delete</button>
            <div class="container-fluid px-4">    
            
            <div class="table-container">
                
            <table>
                <thead>
                    <tr> <th></th>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Add Category By</th>
                        <th style="text-align: center;">Date Created</th>
                        <th style="text-align: center;">Update Category By</th>     
                        <th style="text-align: center;">Date Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        $conn = new mysqli('localhost', 'root', '', 'sdocms');

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $search = isset($_POST['search']) ? $_POST['txtsearch'] : '';
                        $sql = "SELECT * FROM category";
                        if (!empty($search)) {
                            $sql .= " WHERE CONCAT(category, categoryby, update_by) LIKE '%$search%'";

                        }
                        $result = $conn->query($sql); // Execute the SQL query

                        // Display data in HTML table
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $catID = $row['catID'];
                                $category = $row['category'];
                                $categoryby = $row["categoryby"];
                                $category_created = $row["category_created"];
                                $update_by = $row["update_by"];
                                $category_updated = $row["category_updated"];
                             

                                echo "<tr>";
                                echo "<td><input type='checkbox' name='check[]' value='" . $row['catID'] . "'>&nbsp;&nbsp;&nbsp;";
                                echo "<td>" . $row['catID'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td>" . $row['categoryby'] . "</td>";
                                echo "<td>" . $row['category_created'] . "</td>";
                                echo "<td>" . $row['update_by'] . "</td>";
                                echo "<td>" . $row['category_updated'] . "</td>";
                                echo "<td><button type='button' class='deleteBtn1' data-bs-toggle='modal' data-bs-target='#exampleModal5' data-id='" . $row['catID'] . "' name='editBtn' value='" . $row['catID'] . "'>Update</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data found</td></tr>";
                        }

                        $conn->close(); // Close the database connection
                    ?>
                        
                    </tr>
                </tbody>
            </table>
            <!--Delete-->
            <?php
                // ...your existing PHP code...
                $conn = new mysqli('localhost', 'root', '', 'sdocms');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_POST['delete'])) {
                    $selectedIds = $_POST['check']; // Retrieve the selected checkbox values

                    foreach ($selectedIds as $catID) {
                        // Perform the delete operation for each ID
                        $deleteQuery = "DELETE FROM category WHERE catID = '$catID '";
                        $result = mysqli_query($conn, $deleteQuery);
                    }

                    // Redirect to the current page to update the table after deletion
                    header("Location: {$_SERVER['REQUEST_URI']}");
                    exit();
                }

                // ...your existing PHP code...
            ?>
            </div>
            </div>
            
            </form>
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
                                        <input type="text" class="form-control" id="catCreate" name="catCreate" placeholder="Enter Category By" value="<?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : ''; ?>" readonly>
                                    </div>
                                <div>
                                    <label for="dateCreate" class="form-label">Date Created:</label>
                                    <input type="date" class="form-control" id="dateCreate" name="dateCreate" placeholder="Enter Date Creation" required>
                                </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addBtn">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!---adding info--->
            <?php


                if (isset($_POST['addBtn'])) {
                    // Database connection
                    $db = mysqli_connect('localhost', 'root', '', 'sdocms') or die("Connection failed: " . mysqli_connect_error());

                    // Get form data
                    $category = mysqli_real_escape_string($db, $_POST['category']);
                    $catCreate = mysqli_real_escape_string($db, $_POST['catCreate']);
                    $dateCreate = mysqli_real_escape_string($db, $_POST['dateCreate']);

                    // You can set "N/A" for the read-only fields here or leave them as they are

                    // Insert data into the database
                    $sql = "INSERT INTO category (category, categoryby, category_created) VALUES ('$category', '$catCreate', '$dateCreate')";

                    if (mysqli_query($db, $sql)) {
                        // Insertion successful
                        echo '<script type="text/javascript">';
                        echo 'alert("Category added successfully!")';
                        echo '</script>';
                        header('Location: ../admin/adminCategory.php');
                        exit();
                    } else {
                        // Insertion failed
                        echo '<script type="text/javascript">';
                        echo 'alert("Error: Category not added. Please try again.")';
                        echo '</script>';
                    }

                    // Close the database connection
                    mysqli_close($db);
                }
                ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2"><img src="../image/sdolog2.png" alt="A beautiful example image" style="width: 50px; height: 50px; padding: 5px"></i>Add Complaint Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    
                                    <input type="text" class="form-control" id="catid1" name="catid1" placeholder="Enter Category" readonly>
                                </div>
                                <div>
                                    <label for="category1" class="form-label">Category:</label>
                                    <input type="text" class="form-control" id="category1" name="category1" placeholder="Enter Category" required>
                                </div>
                                <div>
                                        <label for="catCreate1" class="form-label">Category By:</label>
                                        <input type="text" class="form-control" id="catCreate1" name="catCreate1" placeholder="Enter Category By" readonly>
                                    </div>
                                <div>
                                    <label for="dateCreate1" class="form-label">Date Created:</label>
                                    <input type="date" class="form-control" id="dateCreate1" name="dateCreate1" placeholder="Enter Date Creation" readonly>
                                </div>
                                <div>
                                    <label for="upCreate" class="form-label">Update Category By:</label>
                                    <input type="text" class="form-control" id="upCreate" name="upCreate1"  placeholder="Enter Update Category By" value="<?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : ''; ?>"required>
                                </div>
                                <div>
                                    <label for="dateUpdate" class="form-label">Date Updated:</label>
                                    <input type="date" class="form-control" id="dateUpdate" name="dateUpdate1"  placeholder="Enter Date Updated" required>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="updateBtn">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--Update info-->
            <?php
// Create a database connection
                $conn = new mysqli('localhost', 'root', '', 'sdocms');

                // Check if the connection was successful
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if the "updateBtn" button was clicked
                if (isset($_POST['updateBtn'])) {
                    // Retrieve the updated values from the form
                    $catid1 = $_POST['catid1']; // Make sure this contains the correct catID
                    $category1 = $_POST['category1'];
                    $catCreate1 = $_POST['catCreate1'];
                    $dateCreate1 = $_POST['dateCreate1'];
                    $upCreate1 = $_POST['upCreate1']; // Updated the variable name to match the form field
                    $dateUpdate1 = $_POST['dateUpdate1'];

             
                   
                    // Prepare the SQL statement
                    $sql = "UPDATE `category` SET `category`='$category1', `categoryby`='$catCreate1', `category_created`='$dateCreate1', `update_by`='$upCreate1', `category_updated`='$dateUpdate1' WHERE `catID`='$catid1'";

                    // Execute the SQL query
                    if ($conn->query($sql) === TRUE) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Successfully updated!!!")';
                        echo '</script>';
                        header('Location: ../admin/adminCategory.php');
                        exit();
                    } else {
                        echo "Error: " . $conn->error;
                    }
                }

                // Close database connection
                $conn->close();
                ?>



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
<script>
    // Get all the Edit buttons
    var editBtns = document.getElementsByName('editBtn');

    // Add click event listener to each Edit button
    for (var i = 0; i < editBtns.length; i++) {
        editBtns[i].addEventListener('click', function() {
            // Get the row associated with the clicked Edit button
            var row = this.parentNode.parentNode;

            // Get the values from the row
            var catID = row.cells[1].textContent;
            var category = row.cells[2].textContent;
            var categoryby = row.cells[3].textContent;
            var category_created = row.cells[4].textContent;

            // Assign the values to the textboxes in the modal
            document.getElementById('catid1').value = catID;
            document.getElementById('category1').value = category;
            document.getElementById('catCreate1').value = categoryby;
            document.getElementById('dateCreate1').value = category_created;
        });
    }
</script>
</body>

</html>
