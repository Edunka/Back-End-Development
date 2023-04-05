<?php
$link = mysqli_connect("sdb-57.hosting.stackcp.net", "student46-353031357e6a", "ua92-studentAc", "student46-353031357e6a");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}
?>
<!-- when submit button is clicked 
stored variable will be updated in mysql tables-->

<?php
if (isset($_POST['submit'])){

  $id = $_POST['id'];
  $capacity = $_POST['capacity'];
  $room = $_POST['room'];
  $name = $_POST['name'];
  

  $sql = "UPDATE Classes SET  Capacity = '$capacity', Room = '$room', ClassName = '$name'  WHERE ClassID = '$id' ";

  if (mysqli_query($link, $sql)) {
    echo "Updated Successfully";
  } else {
    echo "Error updating record "; 
  }
}
?>

<!-- when delete button is clicked the selected ID and its corresponding information in the mysql table will be deleted -->
<?php
  if (isset($_POST['delete'])){

    $cid = $_POST['cid'];
    $sql = "DELETE FROM Classes WHERE ClassID = '$cid' ";

    if (mysqli_query($link, $sql)) {
      echo "Deleted Successfully";
    } else {
      echo "Error deleting record "; 
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
    <!-- link to stylesheet -->
    <link rel="stylesheet" href="style.css">
    <title>View & Edit Class</title>
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
<!-- body content-->
<!-- image -->
      <div class="container-fluid text-center mt-5">
        <img class="img-fluid logo img-thumbnail" src="images\logo1.png" alt="Rishton academy primary school logo">
      </div>
<!-- data table -->
      <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Class ID</th>
                    <th scope="col">Teacher ID</th>
                    <th scope="col">Pupil ID</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Room</th>
                    <th scope="col">Class Name</th>


                </tr>
            </thead>
            <tbody>
                <?php
                // shows information from a selected table in mysql and outputs the data into the table
                $sql = mysqli_query($link, "SELECT ClassID, TeacherID, PupilID, Capacity, Room, ClassName FROM Classes");
                while ($row = $sql->fetch_assoc()){
                echo "
                <tr>
                    <th>{$row['ClassID']}</th>
                    <th>{$row['TeacherID']}</th>
                    <th>{$row['PupilID']}</th>
                    <th>{$row['Capacity']}</th>
                    <th>{$row['Room']}</th>
                    <th>{$row['ClassName']}</th>
                    
                    
                </tr>";
                }
                ?>
            </tbody>
        </table>
      </div>

      <form action="view-edit-class.php" method="post" class="container-fluid text-center w-50 mb-2 border border-dark border-5 p-2 rounded">
            <h2>UPDATE A Class</h2>
            <div class="">
              <label for="id">ID</label>
              <input type="text" class="form-control" id="id" placeholder="Class ID"
                  alt="id" name="id" required>
          </div>

              <div class="">
                  <label for="capacity">Capacity</label>
                  <input type="text" class="form-control" id="capacity" name="capacity"
                      placeholder="Class Capacity" alt="Class Capacity" required>
              </div>

              <div class="">
                  <label for="room">Room:</label>
                  <input type="text" class="form-control" id="room" name="room"
                      placeholder="Room" alt="room" required>
              </div>

              <div class="">
                  <label for="name">Class Name:</label>
                  <input type="text" class="form-control" id="name" name="name"
                      placeholder="Class Name" alt="name" required>
              </div>
              <br>
            
              <input type="submit" name="submit">
          </form>

          <!-- Delete Form -->
          <form class="container-fluid text-center w-50 mb-2 border border-dark border-5 p-2 rounded" 
          action="view-edit-class.php" method="post">
            <h2>Delete A Class</h2>
            <label for="cid"></label>
              <select name="cid">
                
    <?php
      // shows the available id's within that data table
    $sql = mysqli_query($link, "SELECT ClassID  FROM Classes");
    while ($row = $sql->fetch_assoc()){
    echo "
    
        <option>{$row['ClassID']}</option>
        
        
    ";
    }
    ?>
    <input type="submit" name="delete">
  </select>
</form>
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