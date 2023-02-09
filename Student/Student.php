<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Melati Hostel Registration System</title>

    <!-- favicon -->
    <link rel="website icon" type="png" href="/Melati HRS/images/favicon.png">

    <!-- Link CSS file -->
    <link rel="stylesheet" href="StyleRecord.css">

    <!-- FontAwesome for icon -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.3/css/all.min.css">-->
    <script src="https://kit.fontawesome.com/2fcc26b571.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- import database connection file -->
    <?php 
        include("../Dbconn.php"); 
    ?>
</head>

<body>
    <!-- navigation bar -->
    <nav>
        <ul>
            <li>
                <a href="Home.php" class="logo">
                    <img src="/Melati HRS/images/Melati Round.png" alt="melati logo"><br>
                    <span class="nav-item"> Melati HRS </span>
                </a>
            </li>
            
            <hr>

            <p class="title"> Hostel </p>

            <hr>
            
            <!-- Hostel Information -->
            <li>
                <a href="Home.php" class="menu-list">
                    <i class="fas fa-solid fa-house"></i>
                    <span class="nav-item"> Home </span>
                </a>
            </li>
            
            <!-- link for rule page -->
            <li>
                <a href="Rule.php" class="menu-list">
                    <i class="fas fa-balance-scale"></i>
                    <span class="nav-item"> Hostel Rule </span>
                </a>
            </li>

            <!-- link for About Us page -->
            <li>
                <a href="About.php" class="menu-list">
                    <i class="fas fa-solid fa-circle-info"></i>
                    <span class="nav-item"> About Us </span>
                </a>
            </li>

            
            <!-- link for Contact Us page -->
            <li>
                <a href="Contact.php" class="menu-list">
                    <i class=" fas fa-solid fa-location-dot"></i>
                    <span class="nav-item"> Contact Us </span>
                </a>
            </li>
            
            <hr>

            <p class="title"> Features </p>

            <hr>
            
            <!-- System features -->
            <div class="box">
                <!-- link for student record -->
                <li>
                    <a href="Student.php" class="menu-list">
                        <i class="fas fa-solid fa-book"></i>
                        <span class="nav-item"> Student record </span>
                    </a>
                </li>
            </div>
            
            <!-- logout button -->
            <li>
                <a onclick="out()" href="/Melati HRS/Logout.php" class="menu-list logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item"> Logout </span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="contentBox">
        <div class="topbar">
            <!-- MHRS box -->
            <div class="welcomeBox">
                <p>Melati Hostel Registration System</p>
            </div>

            <!-- User name and DP -->
            <div class="user">
                <div class="username">
                    <!--retrieve user information via session-->
                    <?php
                        if (isset($_SESSION["log"]) && ($_SESSION["log"] == 1)) {
                            echo '<p class="name">' . $_SESSION["stud_fname"] . ' ' . $_SESSION["stud_lname"] .'</p>';
                            echo '<p class="email">' . $_SESSION["stud_email"] .'</p>';
                        }
                        else
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Login.php\"/>";
                    ?>
                </div>
                <div class="userDP">
                    <img src="/Melati HRS/images/userdp.png" alt="Profile picture">
                </div>
            </div>
        </div>

        <!-- Search process -->
        <?php
            $txtSearch = "";
            if (isset($_POST['search'])) {
                $txtSearch = $_POST['studSearch'];
            }

            $sql = "SELECT * FROM student WHERE studID LIKE '" . $txtSearch . "%'";
            $query = mysqli_query($connection, $sql) or die("Search not found");
        ?>

        <div class="mainBox">
            <!-- Search box -->
            <div class="searchBox">
                <div class="cari">
                    <form class="formSearch" action="Student.php" method="POST">
                    <!-- Search input -->
                    <input class="searchInput" type="text" name="studSearch" size="10" maxlength="10" placeholder="Enter student ID">

                    <!-- Submit button as icon -->
                    <button type="submit" name="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                </div>

                <!--<div class="pergi">
                    <button onclick="document.location='StudentRegister.php'">Add new student</button>
                </div>-->
            </div>

            <div class="firstBox">
                <!-- List of room in table-->
                <table>
                    <tr>
                        <th>no</th>
                        <th>id</th>
                        <th>full name</th>
                        <th>Address</th>
                        <th>phone number</th>
                        <th>email</th>
                        <th>room number</th>
                        <th>room type</th>
                        <th>check-in date</th>
                    </tr>

                    <?php
                        $sql = "SELECT *
                                FROM student
                                JOIN register ON student.studID = register.studID
                                JOIN room ON register.roomID = room.roomID";
                        $query = mysqli_query($connection, $sql) or die("not found");

                        //count "NO" in column
                        $count = 1;
                        while ($row= mysqli_fetch_array($query)) {
                    ?>

                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row["studID"] ?></td>
                        <td><?php echo $row["studFname"] ?> <?php echo $row["studLname"] ?></td>
                        <td><?php echo $row["studAddr"] ?></td>
                        <td><?php echo $row["studPhoneNum"] ?></td>
                        <td><?php echo $row["studEmail"] ?></td>
                        <td><?php echo $row["roomID"] ?></td>
                        <td><?php echo $row["roomType"] ?></td>
                        <td><?php echo $row["regisDate"] ?></td>
                    </tr>

                    <?php
                        $count++;
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Error prevention for logout -->
    <script type="text/javascript">
        function out() {
            var result = confirm('Are you sure to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>