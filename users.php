<?php
include 'include/config.php';
include 'include/database.php';
include 'include/functions.php';

secure();
include 'include/header.php';

// fetch all users from database

$sql = "SELECT * FROM users";

$statement = $conn->prepare($sql);
$statement ->execute();
$users = $statement ->fetchAll(PDO::FETCH_ASSOC);


//  add new users to database

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    echo $email;

    // Error message
    $emailError ='';
    
    if(filter_input(INPUT_POST, $email, FILTER_SANITIZE_EMAIL)){
        $emailError ="Invalid email address";
    }


}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="row d-flex justify-content-between">
                <div class="col-md-10 mt-4">
                    <h2>Current Users</h2>
                    <div class="d-flex gap-4 align-items-center">
                        <a href="dashboard.php">Dashboard</a>
                        <a href="posts.php">Post Management</a>
                    </div>

                </div>
                <div class="col-md-2 d-flex justify-content-end mt-4">
                    <a href="logout.php" class=" ">Logout</a>
                </div>
            </div>

        </div>
        <div class="col-md-12 px-5 mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-end">
                        <a href="add_user.php" type="button" class="btn btn-dark">Add new user</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col">User Id</th> -->
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">User Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Joined</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($users as $user): ?>
                            <tr>
                                <!-- <th scope="row"><?=$user['user_id'];?></th> -->
                                <td><?=$user['username'];?></td>
                                <td><?=$user['email'];?></td>
                                <td><?=$user['role'];?></td>
                                <td>
                                    <?=$user['active'] == 'active' ? '<span class="text-success">Active</span>':'<span class="text-danger">Not Active</span>';?>
                                </td>
                                <!-- <td><?=$user['added'];?></td> -->
                                <td><?=date('F d, Y h:mA', strtotime($user['added']))?></td>
                                <td class="d-flex gap-3 ">
                                    <a href="user_edit.php?user_id=<?=$user['user_id'];?>" type=" button"
                                        class="btn btn-sm btn-dark">Edit</a><a
                                        href="user_delete.php?user_id=<?=$user['user_id'];?>" type="button"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include 'include/footer.php'; ?>