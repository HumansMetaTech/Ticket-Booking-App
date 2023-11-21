<?php
require 'assets/partials/_functions.php';
$conn = db_connect();

if (!$conn)
    die("Connection Failed");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking System</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap"
        rel="stylesheet">
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php
    require 'assets/styles/styles.php'
        ?>
</head>

<body>
    <?php

    if (isset($_GET["booking_added"]) && !isset($_POST['pnr-search'])) {
        if ($_GET["booking_added"]) {
            echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> Booking Added, your PNR is <span style="font-weight:bold; color: #272640;">' . $_GET["pnr"] . '</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            // Show error alert
            echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Booking already exists
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    if (isset($_GET["restricted"])) {
        echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Restricted Access!</strong> Login to Access
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["query-submit"])) {
        $name = $_POST["name"];
        $mail = $_POST["email"];
        $subject = $_POST["subject"];
        $msg = $_POST["message"];
        $sql = "INSERT INTO `queries` (`fullname`, `mail`, `subject`, `msg`, `msg_created`) VALUES('$name', '$mail', '$subject', '$msg', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        // Gives back the Auto Increment id
        $autoInc_id = mysqli_insert_id($conn);
        if ($autoInc_id) {
            $code = rand(1, 99999);
            // Generates the unique adminid
            $query_id = "Q-" . $code . $autoInc_id;

            $query = "UPDATE `queries` SET `query_id` = '$query_id' WHERE `queries`.`id` = $autoInc_id;";
            $queryResult = mysqli_query($conn, $query);
            if (!$queryResult)
                echo "Not Working";
        }
        if ($result) {
            $query_submitted = true;
        }
        if ($query_submitted) {
            // Show success alert
            echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successful!</strong> Query Submitted
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            // Show error alert
            echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Query Not Submitted, Try Againor Contact Administrator
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pnr-search"])) {
        $pnr = $_POST["pnr"];

        $sql = "SELECT * FROM bookings WHERE booking_id='$pnr'";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if ($num) {
            $row = mysqli_fetch_assoc($result);
            $route_id = $row["route_id"];
            $customer_id = $row["customer_id"];

            $customer_name = get_from_table($conn, "customers", "customer_id", $customer_id, "customer_name");

            $customer_phone = get_from_table($conn, "customers", "customer_id", $customer_id, "customer_phone");

            $customer_route = $row["customer_route"];
            $booked_amount = $row["booked_amount"];

            $booked_seat = $row["booked_seat"];
            $booked_timing = $row["booking_created"];
            $admin_name = $row["admin_name"];
            $admin_fullname = get_from_table($conn, "admins", "admin_name", $admin_name, "admin_fullname");


            $dep_date = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_date");

            $dep_time = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_time");

            $bus_no = get_from_table($conn, "routes", "route_id", $route_id, "bus_no");
            ?>

            <div class="alert alert-dark alert-dismissible fade show container_down" role="alert">

                <h4 class="alert-heading">Booking Information!</h4>
                <p>
                    <button class="btn btn-sm btn-success"><a href="assets/partials/_download.php?pnr=<?php echo $pnr; ?>"
                            class="link-light">Download</a></button>
                </p>
                <hr>
                <p class="mb-0">
                <ul class="pnr-details">
                    <li>
                        <strong>PNR : </strong>
                        <?php echo $pnr; ?>
                    </li>
                    <li>
                        <strong>Customer Name : </strong>
                        <?php echo $customer_name; ?>
                    </li>
                    <li>
                        <strong>Customer Phone : </strong>
                        <?php echo $customer_phone; ?>
                    </li>
                    <li>
                        <strong>Route : </strong>
                        <?php echo $customer_route; ?>
                    </li>
                    <li>
                        <strong>Bus Number : </strong>
                        <?php echo $bus_no; ?>
                    </li>
                    <li>
                        <strong>Booked Seat Number : </strong>
                        <?php echo $booked_seat; ?>
                    </li>
                    <li>
                        <strong>Departure Date : </strong>
                        <?php echo $dep_date; ?>
                    </li>
                    <li>
                        <strong>Departure Time : </strong>
                        <?php echo $dep_time; ?>
                    </li>
                    <li>
                        <strong>Booked By : </strong>
                        <?php echo $admin_fullname; ?>
                        <strong> (ID : </strong>
                        <?php echo $admin_name; ?>
                        <strong>)</strong>
                    </li>
                    <li>
                        <strong>Booked Timing : </strong>
                        <?php echo $booked_timing; ?>
                    </li>

                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } else {
            echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Record Doesnt Exist
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }

    ?>

    <header>
        <nav>
            <div id="nav" line-height="3">
                <div>
                    <a href="#" class="nav-item nav-logo">MSRTC</a>
                </div>
                <ul>
                    <li style="color: transparent;">___________________</li>
                    <li><a href="#" class="nav-item">Home</a></li>
                    <li><a href="#about" class="nav-item">About</a></li>
                    <li><a href="#contact" class="nav-item">Contact</a></li>
                </ul>
                <div>
                    <div style="display: inline-block;">
                        <a href="#" class="login nav-item" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                                class="fas fa-sign-in-alt" style="margin-right: 0.4rem;"></i>Login</a>
                    </div>
                    <div style="display: inline-block;">
                        <a href="#pnr-enquiry" class="pnr nav-item">PNR Enquiry</a>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <!-- Login Modal -->
    <?php require 'assets/partials/_loginModal.php';
    require 'assets/partials/_getJSON.php';

    $routeData = json_decode($routeJson);
    $busData = json_decode($busJson);
    $customerData = json_decode($customerJson);
    ?>

    <center><div>
        <section id="home">
            <div id="route-search-form" style="margin-top: 0px;">
                <h1>Simple Bus Ticket Booking System</h1>

                <p class="text-center">Welcome to Simple Bus Ticket Booking System. Login now to manage bus tickets and
                    much more. OR, simply scroll down to check the Ticket status using Passenger Name Record (PNR
                    number)</p>

                <center>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">Administrator Login</button>

                </center>

                <br>
                <center>
                    <a href="#pnr-enquiry"><button class="btn btn-primary">Scroll Down <i
                                class="fa fa-arrow-down"></i></button></a>
                </center>

            </div>
        </section>
    </div></center>
    <div id="block">
        <section id="info-num">
            <figure>
                <img src="assets/img/route.svg" alt="Bus Route Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter" data-target="<?php echo count($routeData); ?>">100</span>
                    <span class="icon-name">routes</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/img/bus.svg" alt="Bus Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter" data-target="<?php echo count($busData); ?>">100</span>
                    <span class="icon-name">bus</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/img/customer.svg" alt="Happy Customer Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter" data-target="<?php echo count($customerData); ?>">100</span>
                    <span class="icon-name">happy customers</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/img/ticket.svg" alt="Instant Ticket Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num"><span class="counter" data-target="20">100</span> SEC</span>
                    <span class="icon-name">Instant Tickets</span>
                </figcaption>
            </figure>
        </section>
        <section id="pnr-enquiry">
            <div id="pnr-form">
                <h2>PNR ENQUIRY</h2>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                    <div>
                        <input type="text" name="pnr" id="pnr" placeholder="Enter PNR">
                    </div>
                    <button type="submit" name="pnr-search">Submit</button>
                </form>
            </div>
        </section>
        <section id="about" background-color="white">
            <div>
                <h1>How This Was Built</h1>
                <h4>Inshort HTML,PHP,CSS,JS,MySQL</h4>
                <p>
                    This System Was Developed as a Term Project for The Subject Database Management System in the Fifth
                    semester. Having gained Knowledge in SQL due to the course and having previous exposure to HTML and
                    CSS. When It Came To Implementing A Project that was the way to go! This Project Implements Classic
                    HTML CSS and Bootstrap for the design of the website. The Database uses MySQL to store data, PHP is
                    Used To Generate Queries for The Database hence acting as a backend and JS is Uesd To Enhance
                    Interactivity of The System. This Entire Project is Hosted Locally and All Data is Stored Locally on
                    the Database Present in the System.
                </p>
            </div>
        </section>
        <section id="contact">
            <div id="contact-form">
                <h1>Contact Us</h1>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="email">Subject</label>
                        <input type="text" name="subject" id="subject">
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" name="query-submit">Submit</button>
                    <div></div>
                </form>
            </div>
        </section>
        <div id="footercl">
            <footer>
                <p>
                    <i class="far fa-copyright"></i>
                    <?php echo date('Y'); ?> - Simple Bus Ticket Booking System | Made with &#10084;&#65039; by Pranav
                    Patil
                </p>
            </footer>
        </div>
    </div>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <!-- External JS -->
    <script src="assets/scripts/main.js"></script>
</body>

</html>