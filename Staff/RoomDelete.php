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
    <link rel="stylesheet" href="StyleRR.css">

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
                
                <!-- link for student registration -->
                <li>
                    <a href="StudentRegister.php" class="menu-list">
                        <i class="fas fa-solid fa-bed"></i>
                        <span class="nav-item"> Student register </span>
                    </a>
                </li>
                
                <!-- link for list of room -->
                <li>
                    <a href="Room.php" class="menu-list">
                        <i class="fas fa-solid fa-book-bookmark"></i>
                        <span class="nav-item"> Room record </span>
                    </a>
                </li>

                <!-- link for room register -->
                <li>
                    <a href="RoomAdd.php" class="menu-list">
                        <i class="fas fa-solid fa-building"></i>
                        <span class="nav-item"> Room register </span>
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
        <?php
            if (isset($_GET['roomID'])) {
                $room_id = $_GET['roomID'];

                $sql = "SELECT * FROM ROOM WHERE roomID = '" . $room_id . "'";
                $query = mysqli_query($connection, $sql) or die("Query Fail");
                $data = mysqli_fetch_array($query);
        ?>

        <div class="container">
            <fieldset>
                <legend>
                    Room Registration
                </legend>
                
                <form action="RoomDeleteProcess.php" method="POST">
                    <div class="user-details">
                        
                        <div class="input-box">
                            <i class="fa fa-light fa-house-circle-check"></i>
                            <span class="details">Room Number</span>
                            <input type="text" 
                                   placeholder="Enter room number"
                                   name="room_number"
                                   required
                                   value="<?php echo $data["roomID"]; ?>"
                                   readonly>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-solid fa-hashtag"></i>
                            <span class="details">Room Available</span>
                            <input type="text" 
                                   placeholder="Enter room availabality"
                                   name="room_avai"
                                   required
                                   value="<?php echo $data["roomAvail"]; ?>"
                                   readonly>
                        </div>

                        <div class="input-box">
                            <i class="fa fa-solid fa-building"></i>
                            <span class="details">Room block</span>
                            <input type="text" 
                                   placeholder="Enter room block"
                                   name="room_block"
                                   required
                                   value="<?php echo $data["roomBlock"]; ?>"
                                   readonly>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-solid fa-building"></i>
                            <span class="details">Room floor</span>
                            <input type="text" 
                                   placeholder="Enter room floor"
                                   name="room_floor"
                                   required
                                   value="<?php echo $data["roomFloor"]; ?>"\
                                   readonly>
                        </div>
                    </div>

                    <script type ="text/javascript" >
                        var aCheck;
                        var bCheck;
                        var cCheck;

                        function check(){
                            aCheck=document.getElementById ("dot-1").checked;
                            bCheck=document.getElementById ("dot-2").checked;
                            cCheck=document.getElementById ("dot-3").checked;
                        }

                        function unchange(){
                            document.getElementById ("dot-1").checked=aCheck;
                            document.getElementById ("dot-2").checked=bCheck;
                            document.getElementById ("dot-3").checked=cCheck;
                        }
                    </script>
                    
                    <div class="room-details">
                        <input type="radio" name="room" id="dot-1" value="2" <?php if ($data['roomType'] == '2') { echo 'checked'; } ?> onclick ="unchange()">
                        <input type="radio" name="room" id="dot-2" value="4" <?php if ($data['roomType'] == '4') { echo 'checked'; } ?> onclick ="unchange()">
                        <input type="radio" name="room" id="dot-3" value="8" <?php if ($data['roomType'] == '8') { echo 'checked'; } ?> onclick ="unchange()">
                        <i class="fa fa-bed"></i>
                        <span class="room-type">Room type</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="room">2 Person Room</span>
                            </label>
                            
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="room">4 Person Room</span>
                            </label>
                            
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="room">8 Person Room</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="button">
                        <input onclick="return confirmDelete();" type="submit" value="Delete" name="deleteRoom" id="deleteRoom">
                    </div>
                </form>
            </fieldset>
        </div>
        <?php
            } else {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=Room.php\"/>";
            }
        ?>
    </div>

    <script type="text/javascript">
        function confirmDelete() {
            var result = confirm('Are you sure to delete the data?');
            if (result == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

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