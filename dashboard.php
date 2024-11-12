<?php
include 'include/config.php';
include 'include/database.php';
include 'include/functions.php';

secure();
include 'include/header.php';



?>

<div class="container">
    <div class="row" style="background-color: #FFF0D1;">
        <div class="col-md-12 px-5">
            <div class="row d-flex justify-content-between">
                <div class="col-md-9"></div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="logout.php" class="btn btn-dark btn-small">Logout</a>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include 'include/footer.php'; ?>