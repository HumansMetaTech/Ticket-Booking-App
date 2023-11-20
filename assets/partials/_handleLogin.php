<?php
    require '_functions.php';
    $conn = db_connect();

    if (!$conn) {
        die("Oh Shoot!! Connection Failed");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $adminname = $_POST['adminname'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `admins` WHERE admin_name='$adminname';";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            $hash = $row['admin_password'];
            if (password_verify($password, $hash)) {
                // Login Successful
                session_start();
                $_SESSION["loggedIn"] = true;
                $_SESSION["admin_id"] = $row["admin_id"];

                header("location: ../../admin/dashboard.php");
                exit;
            }
        }

        // Login failure
        echo "<script>";
        echo "alert('Invalid credentials. Please try again.');";
        echo "window.location.href = '../../index.php';";
        echo "</script>";
        exit;
    }
?>
