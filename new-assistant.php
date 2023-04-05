<?php
// connects file to mysql account
$link = mysqli_connect("sdb-57.hosting.stackcp.net", "student46-353031357e6a", "ua92-studentAc", "student46-353031357e6a");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}
?>

<!-- when submit button is clicked 
stored variable will be added into the fields chosen e.g name address will be inputted into mysql -->
<?php
if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $background = $_POST['background'];
    $teacher = $_POST['teacher'];
    $dinner = $_POST['dinner'];
    $books = $_POST['books'];


$sql = "INSERT INTO TeacherAssistant (TeacherID, AssistantName, Birthday, Gender, AssistantAddress, Email, Telephone, DinnerMoney, LibraryBooks, Salary, BackgroundCheck) VALUES ('$teacher', '$name', '$birth', '$gender', '$address', '$email', '$number', '$dinner', '$books', '$salary', '$background')";
if (mysqli_query($link, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error adding record ";
}

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links to bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Add an Assistant</title>
</head>

<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-sm" style="background-color:black;">
        <!-- home/contact buttons -->
        <div><button class="home btn btn-dark"><a href="index.html" style="color: white;">Homepage</a></button></div>
        <div><button class="contact btn btn-dark"><a href="contact.html" style="color: white;">Contact Us</a></button></div>
        <!--  -->
      <!-- code which creates button for dropdown when on mobile or small screen -->
        <div class="container-fluid">
          <div class="container-fluid text-center btn-line">
          <button class="navbar-toggler btn-line" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-light"></span>
          </button>
          </div>
          <div class="collapse navbar-collapse" id="navbarNav">
    <!-- code which creates button for dropdown when on mobile or small screen -->
            
            <!-- container for buttons in nav bar
            some code from https://getbootstrap.com/ and recoded for my own use -->
            <div class="container text-center">
              <div class="row">
            <div class="dropdown-center col-sm-2">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Student
                </button>
                <!-- dropdown list for each button with links -->
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="addstudent.php">Add New Student</a></li>
                  <li><a class="dropdown-item" href="view-edit-student.php">View & Edit Student</a></li>
                  
                </ul>
              </div>

              <div class="dropdown-center col-sm-2">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Parent
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="new-parent.php">Add New Parent</a></li>
                  <li><a class="dropdown-item" href="view-edit-parent.php">View & Edit Parent</a></li>
                </ul>
              </div>

              <div class="dropdown-center col-sm-2">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Teacher
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="new-teacher.php">Add New Teacher</a></li>
                  <li><a class="dropdown-item" href="view-edit-teacher.php">View & Edit Teacher</a></li>
                </ul>
              </div>

              <div class="dropdown-center col-sm-2">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Class
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="new-class.php">Add New Class</a></li>
                  <li><a class="dropdown-item" href="view-edit-class.php">View & Edit Class</a></li>
                </ul>
              </div>

              <div class="dropdown-center col-sm-2">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Assistant
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="new-assistant.php">Add New Assistant</a></li>
                  <li><a class="dropdown-item" href="view-edit-assistant.php">View & Edit Assistant</a></li>
                </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
<!-- navbar -->
    <!-- body content -->


    <div class="container">
        <div class="row">
            <!-- image -->
            <div class="container-fluid text-center col-md-6" style="margin-top: 145px;">
                <img class="img-fluid img-thumbnail logo" src="images\logo1.png"
                    alt="Rishton academy primary school logo">
            </div>
            <!-- image -->
            <!-- add new student form/ used getbootstrap.com for ideas on code written
     basic labels and input fields -->

            
                
                <form action="new-assistant.php" method="post" class="container-fluid student-form col-md-6">
                    <h2>Add Teacher Assistant</h2>
                    <div class="">
                        <label for="name">Full Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name"
                            alt="full name"required>
                    </div>

                    <div>
                        <label for="birth">Date of Birth</label>
                        <input type="text" class="form-control" alt="date of birth" required name="birth" placeholder="year-month-day">
                    </div>
                    <div class="">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address"
                            placeholder="Full Address including post code" alt="Full Address including post code" name="address" required>
                    </div>

                    <div class="">
                        <label for="gender">Gender:</label>
                        <input type="text" class="form-control" id="gender" name="gender"
                            placeholder="Male/Female" alt="gender" required>
                    </div>

                    <div>
                        <label for="phone">Telephone Number</label>
                        <input type="number" class="form-control" id="phone" placeholder="+44" alt="phone number" name="number" required>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="John.Smith@email.com" alt="email"required>
                    </div>

                    <div class="">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="Salary" alt="Salary"required>
                    </div>
                    <div class="">
                        <label for="background-check">Background Check:</label>
                        <input type="text" class="form-control" id="background-check" name="background" placeholder="Background Check" alt="Background Check" required>
                    </div>

                    <div class="">
                        <label for="dinner">Dinner Money:</label>
                        <input type="text" class="form-control" id="dinner" name="dinner" placeholder="Dinner Money" alt="Dinner Money">
                    </div>

                    <div class="">
                        <label for="books">Library Books:</label>
                        <input type="text" class="form-control" id="books" name="books" placeholder="books" alt="books">
                    </div>
                    <br>
                    <label for="teacher">Teacher</label>
                    <select name="teacher">
                    <?php
                    // links teacher id to the new assistant
				            $sql = mysqli_query($link, "SELECT TeacherID, TeacherName FROM Teachers");
				            while ($row = $sql->fetch_assoc()){
				            echo "<option value='{$row['TeacherID']}'>{$row['TeacherName']}</option>";
				            }
				            ?>
                    </select>
                    <br> <br>
                    
                  
                    <input type="submit" name="submit">
                

                
                </form> 
            </div>
        </div>
 




    <!-- body content -->
</body>
<!-- Footer 
      classes adapted from 
    https://getbootstrap.com/docs/5.3/getting-started/introduction/-->
<footer class="text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3">
        © 2023 Copyright: Rishton Academy Primary School

    </div>
    <!-- Copyright -->
</footer>

</html>