<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queries</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
        $page="queries";
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>

    <!-- Add, Edit and Delete Routes -->
    <?php
        /*
            1. Check if an admin is logged in
            2. Check if the request method is POST
        */
        if($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST["delete"]))
            {
                // DELETE ROUTES
                $id = $_POST["id"];
                // Delete the route with id => id
                $deleteSql = "DELETE FROM `queries` WHERE `queries`.`id` = $id";
                $deleteResult = mysqli_query($conn, $deleteSql);
                $rowsAffected = mysqli_affected_rows($conn);
                $messageStatus = "danger";
                $messageInfo = "";
                $messageHeading = "Error!";

                if(!$rowsAffected)
                {
                    $messageInfo = "Record Doesnt Exist";
                }

                elseif($deleteResult)
                {   
                    // echo $num;
                    // Show success alert
                    $messageStatus = "success";
                    $messageInfo = "Query Details deleted";
                    $messageHeading = "Successfull!";
                }
                else{
                    // Show error alert
                    $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
                }
                // Message
                echo '<div class="my-0 alert alert-'.$messageStatus.' alert-dismissible fade show" role="alert">
                <strong>'.$messageHeading.'</strong> '.$messageInfo.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        ?>    
        <?php
            $resultSql = "SELECT * FROM `queries` ORDER BY msg_created DESC";
                    
            $resultSqlResult = mysqli_query($conn, $resultSql);
            if(!mysqli_num_rows($resultSqlResult)){ ?>
                <!-- Routes are not present -->
                <div class="mt-4 container">
                    <div id="noQueries" class="alert alert-dark " role="alert">
                        <h1 class="alert-heading">No Queries Found!!</h1>
                        <p class="fw-light">Congratulations on Solving Them All!</p>
                    </div>
                </div>
            <?php }
            else { ?>
                <!-- Routes Are present -->
                <section id="query">
                    <div id="head">
                        <h4>Queries Status</h4>
                    </div>
                    <div id="query-results">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th style="width: 8%;">ID</th>
                                <th>Name</th>
                                <th>Mail ID</th>
                                <th>Subject</th>
                                <th style="width: 30%;">Message</th>
                                <th style="width: 11%;">Time Submitted</th>
                                <th style="width: 12%;">Actions</th>
                            </thead>
                            <?php
                                while($row = mysqli_fetch_assoc($resultSqlResult))
                                {
                                        // echo "<pre>";
                                        // var_export($row);
                                        // echo "</pre>";
                                    $id = $row["id"];
                                    $query_id = $row["query_id"];
                                    $fullname = $row["fullname"];
                                    $mail = $row["mail"];
                                    $subject = $row["subject"];
                                    $msg = $row["msg"];
                                    $msg_created = $row["msg_created"];
                                        ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                echo $query_id;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $fullname;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $mail;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $subject;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $msg;
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $msg_created;
                                            ?>
                                        </td>
                                        <td>
                                            <button class="button delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php 
                                                echo $id;?>">Delete</button>
                                                <a href="mailto:<?php echo $mail;?>?subject=RE: <?php echo $subject;?>">
                                                <button class="button reply-button">Reply</button>
                                                </a>
                                        </td>
                                    </tr>
                                <?php 
                                }
                            ?>
                        </table>
                    </div>
                    </section>
                    <footer>
                <p>
                    <i class="far fa-copyright"></i> <?php echo date('Y');?>
                    </p>
            </footer>
                <?php  }
            ?>
            </div>
    </main>
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="text-center pb-4">
                    Are you sure?
                </h2>
                <p>
                    Do you really want to delete and this query? <strong>This process cannot be undone.</strong>
                </p>
                <!-- Needed to pass id -->
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="delete-form"  method="POST">
                    <input id="delete-id" type="hidden" name="id">
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="delete-form" name="delete" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
        </div>
    <!-- External JS -->
    <script src="../assets/scripts/admin_queries.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>