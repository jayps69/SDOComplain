<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
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
    

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Complainant Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Complainant Fullname</label>
                            <input type="text" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Age</label>
                            <input type="number" placeholder="Enter your age" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Complains Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nature of the Complaint</label>
                            <input type="text" placeholder="Enter Nature of the Complaint" required>
                        </div>

                        <div class="input-field">
                            <label>Locahon Happened</label>
                            <input type="text" placeholder="Enter Locahon Happened" required>
                        </div>

                        <div class="input-field">
                            <label>Date Happened</label>
                            <input type="date" placeholder="Enter Date Happened" required>
                        </div>

                        <div class="input-field">
                            <label>Time Happened</label>
                            <input type="time" placeholder="Enter Time Happened" required>
                        </div>

                        <div class="input-field">
                            <label>Supporting Evidence/Documents</label>
                            <input type="file" placeholder="Attach Supporting Evidence/Documents" required>
                        </div>

                        <div class="input-field">
                            <label>Relationship to the school</label>
                            <input type="text" placeholder="Enter Relationship to the School" required>
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
                    <span class="title">Complaint Category</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Category</label>
                            <input type="text" placeholder="Enter Category" required>
                        </div>

                        <div class="input-field">
                            <label>Sub Category</label>
                            <input type="text" placeholder="Enter Sub Category" required>
                        </div>

                        <div class="input-field">
                            <label>Person of Interest</label>
                            <input type="text" placeholder="Enter Person of Interest" required>
                        </div>

                        <div class="input-field">
                            <label>School</label>
                            <input type="text" placeholder="Enter your School" required>
                        </div>

                        <div class="input-field">
                            <label>School Location</label>
                            <input type="text" placeholder="Enter School Location" required>
                        </div>

                        <div class="input-field">
                            <label>Urgency Type</label>
                            <select required>
                                <option disabled selected>Select Urgency Type</option>
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                            </select>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">Witness Information</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Name of Witness</label>
                            <input type="text" placeholder="Enter Name of Witness " required>
                        </div>

                        <div class="input-field">
                            <label>Age of Witness</label>
                            <input type="number" placeholder="Enter Witness Age" required>
                        </div>

                        <div class="input-field">
                            <label>Relationship to Complainant</label>
                            <input type="text" placeholder="Enter Relationship to Complainant" required>
                        </div>

                        <div class="input-field">
                            <label>Witness Contact</label>
                            <input type="text" placeholder="Enter Witness Contact" required>
                        </div>

                        <div class="input-field">
                            <label>Witness email</label>
                            <input type="email" placeholder="Enter Witness email" required>
                        </div>

                        <div class="input-field">
                            <label>Sworn letter of the Witness</label>
                            <input type="file" placeholder="Sworn letter of the Witness" required>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

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