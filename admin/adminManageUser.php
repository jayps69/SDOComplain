<!DOCTYPE html>
<html lang="en">
<?php ob_start()
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/panel.css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
     <!-- Add your meta tags and title here -->
    

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
                <a href="../admin/complaint.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-wrench me-2"></i>Manage Complaints</a>
                <a href="../admin/adminCategory.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tag me-2"></i>Add Category</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-folder-plus me-2"></i>Add Sub Category</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-school me-2"></i>Add School</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-plus me-2"></i>Add Source</a>
                <a href="../admin/adminManageUser.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-user-times me-2"></i>Manage Account</a>
                <a href="../index.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Manage Accounts</h2>
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
            <button type="button" id="unbtn" class="unbtn" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fas fa-plus"></i> Add</button>
            <button id="unbtn1" class="unbtn1"><i class="fas fa-trash-alt"></i> Delete</button>

            <div class="container-fluid px-4">
            <div class="table-container">
                <table>
                <thead>
                    <tr><th></th>
                      
                        <th style="text-align: center;">ID Number</th>
                        <th style="text-align: center;">Admin Name</th>
                        <th style="text-align: center;">Username</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Contact</th>
                        <th style="text-align: center;">Password</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Admin Role</th>
                        <th style="text-align: center;">Account Created</th>
                        <th></th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Add your table rows and data here -->
                    <tr>    
                    <?php
                        $conn = new mysqli('localhost', 'root', '', 'sdocms');

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM users";

                        $result = $conn->query($sql); // Execute the SQL query

                        // Display data in HTML table
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $admin_idnum = $row['admin_idnum'];
                                $admin_name = $row["admin_name"];
                                $user_username = $row["user_username"];
                                $user_email = $row["user_email"];
                                $admin_contact = $row["admin_contact"];
                                $user_password = $row["user_password"];
                                $admin_image = base64_encode($row['admin_image']);
                                $admin_role = $row["admin_role"];
                                $created_at = $row["created_at"];

                                echo "<tr>";
                                echo "<td><input type='checkbox' name='check[]' value='" . $row['id'] . "'>&nbsp;&nbsp;&nbsp;";
                                echo "<td>" . $row['admin_idnum'] . "</td>";
                                echo "<td>" . $row['admin_name'] . "</td>";
                                echo "<td>" . $row['user_username'] . "</td>";
                                echo "<td>" . $row['user_email'] . "</td>";
                                echo "<td>" . $row['admin_contact'] . "</td>";
                                echo "<td>" . $row['user_password'] . "</td>";
                                echo "<td><img src='../image/" . $row['admin_image'] . "' alt='Student Image' width='40' height='40'></td>";
                                echo "<td>" . $row['admin_role'] . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td><button type='button' class='deleteBtn1' data-bs-toggle='modal' data-bs-target='#exampleModal3' data-id='" . $row['id'] . "' name='editBtn' value='" . $row['id'] . "'>Update</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data found</td></tr>";
                        }

                        $conn->close(); // Close the database connection
                    ?>

                    </tr>
                    
                    <!-- Add more rows and data as needed -->
                </tbody>
            </table>
            
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2"><img src="../image/sdolog2.png" alt="A beautiful example image" style="width: 50px; height: 50px; padding: 5px"></i>Create SDO Employees Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div>
                                    <label for="id" class="form-label">Company ID Number:</label>
                                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter Company ID Number" required>
                                </div>
                                <div>
                                    <label for="adminname" class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" id="adminname" name="adminname" placeholder="Enter Your Full Name" required>
                                </div>
                                <div>
                                    <label for="adminuname" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="adminuname" name="adminuname" placeholder="Enter Username" required>
                                </div>
                                <div>
                                    <label for="adminemail" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="adminemail" name="adminemail" placeholder="Enter Your Email" required>
                                </div>
                                <div>
                                    <label for="admincontactnumber" class="form-label">Contact:</label>
                                    <input type="tel" class="form-control" id="admincontactnumber" name="admincontactnumber" placeholder="Enter Your Contact Number" required>
                                </div>
                                <div>
                                    <label for="adminpass" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="adminpass" name="adminpass"  placeholder="Enter Password" required>
                                </div>
                                <div>
                                    <label for="myImage" class="form-label">Image:</label>
                                    <input type="file" class="form-control" id="myImage" name="myImage" accept="image/*" >
                                </div>
                                
                                <div>
                                    <label for="adminrole" class="form-label">Status:</label>
                                    <select class="form-select" id="adminrole" name="adminrole" required>
                                        <option value="" style=text-align:center;>Select Role</option>
                                        <option value="Head Admin"style=text-align:center;>Head Admin</option>
                                        <option value="Admin Encode"style=text-align:center;>Admin Encoder</option>
                                        <option value="Admin"style=text-align:center;>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="saveBtn">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <?php
                $conn = new mysqli('localhost', 'root', '', 'sdocms');

                // Check if the form is submitted
                if (isset($_POST['saveBtn'])) {
                    // Get image data
                    $imageName = $_FILES["myImage"]["name"];
                    $imageData = file_get_contents($_FILES["myImage"]["tmp_name"]);
                    $imageType = $_FILES["myImage"]["type"];

                    // Check if the uploaded file is an image
                    if (substr($imageType, 0, 5) == "image") {
                        // Get other form data
                        $id = $_POST['id'];
                        $adminname = $_POST['adminname'];
                        $adminuname = $_POST['adminuname'];
                        $adminemail = $_POST['adminemail'];
                        $admincontactnumber = $_POST['admincontactnumber'];
                        $adminpass =  md5($_POST['adminpass']);
                        $adminrole = $_POST['adminrole'];

                        // Check if connection was successful
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Prepare statement
                        $stmt = mysqli_prepare($conn, "INSERT INTO users (admin_idnum, admin_name, user_username, user_email, admin_contact, user_password, admin_image, admin_role, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

                        // Bind parameters
                        mysqli_stmt_bind_param($stmt, "isssisss", $id, $adminname, $adminuname, $adminemail, $admincontactnumber, $adminpass, $imageName, $adminrole);

                        // Execute statement
                        if (mysqli_stmt_execute($stmt)) {
                            // Create the uploads directory if it doesn't exist
                            $targetDirectory = "../image/";
                            if (!is_dir($targetDirectory)) {
                                mkdir($targetDirectory, 0777, true);
                            }

                            // Move uploaded image to target directory
                            $targetFile = $targetDirectory . basename($_FILES["myImage"]["name"]);
                            if (move_uploaded_file($_FILES["myImage"]["tmp_name"], $targetFile)) {
                                echo '<script type="text/javascript">';
                                echo 'alert("Successfully added!!!")';
                                echo '</script>';
                                header('Location: ../admin/adminManageUser.php');
                                exit();
                            } else {
                                echo "Error moving uploaded image.";
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }

                        // Close statement
                        mysqli_stmt_close($stmt);

                        // Close database connection
                        mysqli_close($conn);
                    } else {
                        echo "Only images are allowed.";
                    }
                }
                ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2"><img src="../image/sdolog2.png" alt="A beautiful example image" style="width: 50px; height: 50px; padding: 5px"></i>Create SDO Employees Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div>
                                    <label for="id" class="form-label">Company ID Number:</label>
                                    <input type="text" class="form-control" id="id1" name="id1" placeholder="Enter Company ID Number" readonly>
                                </div>
                                <div>
                                    <label for="adminname" class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" id="adminname1" name="adminname1" placeholder="Enter Your Full Name" required>
                                </div>
                                <div>
                                    <label for="adminuname" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="adminuname1" name="adminuname1" placeholder="Enter Username" required>
                                </div>
                                <div>
                                    <label for="adminemail" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="adminemail1" name="adminemail1" placeholder="Enter Your Email" required>
                                </div>
                                <div>
                                    <label for="admincontactnumber" class="form-label">Contact:</label>
                                    <input type="tel" class="form-control" id="admincontactnumber1" name="admincontactnumber1" placeholder="Enter Your Contact Number" required>
                                </div>
                                <div>
                                    <label for="adminpass" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="adminpass1" name="adminpass1"  placeholder="Enter Password" required>
                                </div>
                                <div>
                                    <label for="myImage" class="form-label">Image:</label>
                                    <input type="file" class="form-control" id="myImage1" name="myImage1" accept="image/*" >
                                </div>
                                <div>
                                <img id="previewImage" name="previewImage" src="" alt="Preview Image" style="width: 300px; height: 300px; display: block; margin: 0 auto;">
                                </div>
                                <div>
                                    <label for="adminrole" class="form-label">Status:</label>
                                    <select class="form-select" id="adminrole1" name="adminrole1" required>
                                        <option value="" style=text-align:center;>Select Role</option>
                                        <option value="Head Admin"style=text-align:center;>Head Admin</option>
                                        <option value="Admin Encode"style=text-align:center;>Admin Encoder</option>
                                        <option value="Admin"style=text-align:center;>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="updateBtn">update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <?php
// Create a connection to the database
                $conn = new mysqli('localhost', 'root', '', 'sdocms');

                // Check if the connection was successful
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if the "updateBtn" button was clicked
                if (isset($_POST['updateBtn'])) {
                    // Retrieve the updated values from the form
                    $id1 = $_POST['id1'];
                    $adminname1 = $_POST['adminname1'];
                    $adminuname1 = $_POST['adminuname1'];
                    $adminemail1 = $_POST['adminemail1'];
                    $admincontactnumber1 = $_POST['admincontactnumber1'];
                    $adminpass1 = md5($_POST['adminpass1']);
                    $adminrole1 = $_POST['adminrole1'];

                    // Check if a new image was uploaded
                    if ($_FILES['myImage1']['size'] > 0) {
                        // Define the target directory where you want to store uploaded images
                        $targetDirectory = '../image/'; // Replace with your actual target directory path

                        // Get image data
                        $imageName = $_FILES["myImage1"]["name"];
                        $imageTmpPath = $_FILES["myImage1"]["tmp_name"];
                        $imageType = $_FILES["myImage1"]["type"];

                        // Generate a unique name for the uploaded image
                        $uniqueImageName = uniqid() . '_' . $imageName;

                        // Construct the full path to the target directory
                        $targetFilePath = $targetDirectory . $uniqueImageName;

                        // Check if the uploaded file is an image
                        if (substr($imageType, 0, 5) == "image") {
                            // Move the uploaded image to the target directory
                            if (move_uploaded_file($imageTmpPath, $targetFilePath)) {
                                // Update the database with the new image file name or path
                                $stmtImage = $conn->prepare("UPDATE users SET admin_image=? WHERE admin_idnum=?");
                                $stmtImage->bind_param("si", $uniqueImageName, $id1);
                                $stmtImage->execute();
                                $stmtImage->close();
                            } else {
                                echo "Failed to move the uploaded image to the target directory.";
                                $stmt->close();
                                $conn->close();
                                exit();
                            }
                        } else {
                            echo "Only images are allowed.";
                            $stmt->close();
                            $conn->close();
                            exit();
                        }
                    }

                    // Prepare statement for updating other fields
                    $stmt = $conn->prepare("UPDATE users SET admin_name=?, user_username=?, user_email=?, admin_contact=?, user_password=?, admin_role=? WHERE admin_idnum=?");

                    // Bind parameters
                    $stmt->bind_param("ssssssi", $adminname1, $adminuname1, $adminemail1, $admincontactnumber1, $adminpass1, $adminrole1, $id1);

                    // Execute statement
                    if ($stmt->execute()) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Successfully updated!!!")';
                        echo '</script>';
                        header('Location: ../admin/adminManageUser.php');
                        exit();
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    // Close statement
                    $stmt->close();
                }

                // Close database connection
                $conn->close();
                ?>

                    
            <!-- Include jQuery before Bootstrap JavaScript -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Rest of your HTML -->

            <script>
                $(document).ready(function () {
                    // When the button is clicked, show the modal
                    $("#unbtn").click(function () {
                        $("#exampleModal2").modal("show");
                    });
                });
            </script>

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
            var admin_idnum = row.cells[1].textContent;
            var admin_name = row.cells[2].textContent;
            var user_username = row.cells[3].textContent;
            var user_email = row.cells[4].textContent;
            var admin_contact = row.cells[5].textContent;
            var user_pass = row.cells[6].textContent;
            var admin_image = row.cells[7].querySelector('img').src;
            var admin_role = row.cells[8].textContent;
            var created_at = row.cells[9].textContent;

            // Assign the values to the textboxes in the modal
            document.getElementById('id1').value = admin_idnum;
            document.getElementById('adminname1').value = admin_name;
            document.getElementById('adminuname1').value = user_username;
            document.getElementById('adminemail1').value = user_email;
            document.getElementById('admincontactnumber1').value = admin_contact;
            document.getElementById('adminpass1').value = user_pass;
            document.getElementById('adminrole1').value = admin_role;

            // Set the image source and link in the previewImage field
            var myImageField = document.getElementById('myImage');
            myImageField.setAttribute('value', admin_image);
            var previewImage = document.getElementById('previewImage');
            previewImage.setAttribute('src', admin_image);
        });
    }
</script>



           

</body>

</html>