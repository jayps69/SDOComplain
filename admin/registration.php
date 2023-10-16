<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/registrationcss.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>SDO Complain Registration </title>
</head>
<body>
<div class="container">
        <div class="logo-header-container">
            <img src="../image/sdolog2.png" alt="A beautiful example image" style="width: 50px; height: 50px; padding: 5px">
            <header>SDO Complain Registration</header>
            <div class="close-button">
            <button type="button" id="closeTab">X</button>
            </div>
        </div>
    

        <form action="#" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Complainant Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>DTS Number</label>
                            <input type="number" name="dts" placeholder="Enter DTS Number" >
                        </div>

                        <div class="input-field">
                            <label>Complainant Full Name</label>
                            <input type="text"name="fname" placeholder="Enter Full Name" >
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="mail" name="mail" placeholder="Enter Email" >
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="contact" placeholder="Enter Mobile Number" >
                        </div>

                        
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Complains Information Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Ticket Reference Number</label>
                            <input type="number" name="trn" placeholder="Enter Ticket Reference Number" >
                        </div>

                        <div class="input-field">
                            <label for="category-dropdown">Category</label>
                            <select id="category-dropdown" name="category">
                                <option value="">-------Select Category-------</option>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sdocms');
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $result = mysqli_query($conn, "SELECT * FROM category ORDER BY category ASC");

                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['catID']; ?>"><?php echo $row['category']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="subcategory-dropdown">Sub Category</label>
                            <select name="subcategory" id="subcategory-dropdown">
                                <option value="">-------Select Sub Category-------</option>
                            </select>
                        </div>
                        <script>
                        document.getElementById('category-dropdown').addEventListener('change', function() {
                            var categoryID = this.value;
                            var subcategoryDropdown = document.getElementById('subcategory-dropdown');
                            subcategoryDropdown.innerHTML = '<option value="">-------Select Sub Category-------</option>';

                            if (categoryID) {
                                // Fetch subcategories based on the selected category from the server using AJAX.
                                // You can use JavaScript frameworks like jQuery or fetch API for this.
                                // Replace the following with your AJAX code.

                                // Example using fetch API
                                fetch('get_subcategories.php?categoryID=' + categoryID)
                                    .then(response => response.json())
                                    .then(data => {
                                        data.forEach(function(subcategory) {
                                            var option = document.createElement('option');
                                            option.value = sub_category.id;
                                            option.text = sub_category.subcategory;
                                            subcategoryDropdown.appendChild(option);
                                        });
                                    })
                                    .catch(error => console.error('Error fetching subcategories: ' + error));
                            } else {
                                // If no category is selected, keep the subcategory dropdown empty.
                            }
                        });
                        </script>

                        
                         <div class="input-field">
                            <label for="source-dropdown"?>Source</label>
                            <select id="source-dropdown" name="source">
                                <option value="">-------Select Source-------</option>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sdocms');

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        $result = mysqli_query($conn, "SELECT * FROM source ORDER BY source ASC"); // Added a semicolon here

                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['source']; ?></option>
                                            <?php
                                        }

                                // Don't forget to close the PHP tag if you don't have additional PHP code below.
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="school-dropdown">School</label>
                            <select id="school-dropdown" name="school">
                                <option value="">-------Select School-------</option>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'sdocms');

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        $result = mysqli_query($conn, "SELECT * FROM school ORDER BY school ASC"); // Added a semicolon here

                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['school']; ?></option>
                                            <?php
                                        }

                                // Don't forget to close the PHP tag if you don't have additional PHP code below.
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Date Recieved</label>
                            <input type="date" name="daterecieved" placeholder="Enter Date Recieved" >
                        </div>
                    </div>                   
                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Complaint Report Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Details</label>
                            <textarea placeholder="Enter Details" name="details" required style="width: 840px; height: 335px; padding:10px;"></textarea>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button type="submit" name="submit" class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    <?php
     /*if (isset($_POST['submit'])) {


        $db = mysqli_connect('localhost', 'root', '', 'sdocms') or die("Connection failed: " . mysqli_connect_error());

        $dts = $_POST["dts"];
        $fname = $_POST["fname"];
        $mail = $_POST["mail"];
        $contact = $_POST["contact"];
        $ticketRefNumber = $_POST["trn"];
        $category = $_POST["category"];
        $subcategory = $_POST["subcategory"];
        $source = $_POST["source"];
        $school = $_POST["school"];
        $dateReceived = $_POST["daterecieved"];
        $details = $_POST["details"];

       
        $sql = "INSERT INTO complaint (dts, name, email, contact, trn, category, subcategory, source, school, recieved, details) 
        VALUES ('$dts', '$fname', ' $mail' , ' $contact', ' $ticketRefNumber', ' $category', ' $subcategory', ' $source', ' $school', ' $dateRecieved', ' $details')";
     }*/
    ?>
    
    <script src="../js/regisscript.js"></script>
    <script>
        // Function to close the current tab/window and redirect
        function closeAndRedirect() {
            window.close();
            window.location.href = "complaint.php"; // Replace with your desired URL
        }

        // Add a click event listener to the close button
        document.getElementById("closeTab").addEventListener("click", closeAndRedirect);
    </script>
</body>
</body>
</html>
