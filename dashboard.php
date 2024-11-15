<?php
include 'include/config.php';
include 'include/database.php';
include 'include/functions.php';

secure();
include 'include/header.php';



?>

<div class="container">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="row d-flex justify-content-between">
                <div class="col-md-9 mt-4">
                    <h2>Dashboard</h2>
                    <p>Welcome,
                        <?php
                        if( $_SESSION['user_role']=='admin' ){
                           echo "<span class='text-success fw-medium'>Admin</span>";
                        }else{
                          echo ucfirst($_SESSION['user_name']);
                        }
                    
                    ?>
                    </p>
                    <div class="d-flex gap-4 align-items-center">
                        <a href="users.php">User Management</a>
                        <a href="posts.php">Post Management</a>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-end mt-4">
                    <a href="logout.php" class=" ">Logout</a>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include 'include/footer.php'; ?>