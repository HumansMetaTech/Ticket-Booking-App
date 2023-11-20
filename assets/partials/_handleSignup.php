<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"]))
    {
        // echo "<pre>";
        // var_export($_POST);
        // echo "</pre>";

        $fullName = $_POST["firstName"] . " " . $_POST["lastName"];
        $adminname = $_POST["username"];
        $password = $_POST["password"]; 

        // Check if the adminname already exists
        $admin_exists = exist_admin($conn, $adminname);
        $signup_sucess = false;

        if(!$admin_exists)
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $target_dir = "../user/";
            $target_file = $target_dir . basename($_FILES["pp"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $newfilename = $adminname.".".$imageFileType;
            $target_file = $target_dir.$newfilename;
            move_uploaded_file($_FILES["pp"]["tmp_name"], $target_file);
            $sql = "INSERT INTO `admins` (`admin_name`, `admin_fullname`, `admin_password`, `admin_created`, `pp`) VALUES ('$adminname', '$fullName', '$hash', current_timestamp(), '$newfilename');";
            $result = mysqli_query($conn, $sql);
            
            if($result)
                $signup_sucess = true;
        }

        // Redirect Page
        header("location: ../../admin/signup.php?signup=$signup_sucess&user_exists=$user_exists");
    }

?>