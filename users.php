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

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="row d-flex justify-content-between">
                <div class="col-md-10 mt-4">
                    <h2>Current Users</h2>
                    <div class="d-flex gap-4 align-items-center">
                        <a href="dashboard.php">Dashboard</a>
                        <a href="users.php">User Management</a>
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
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Add new user</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col">User Id</th> -->
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
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
                                <td><?php 
                                   if($user['active'] ==1){
                                   echo '<span class="text-success fw-bold">Active</span>';
                                }else{
                                 echo '<span class="text-danger fw-bold">Inactive</span>';
                                }
                                ?></td>
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
    <div class="row">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">

                            <form class=" py-3 ">
                                <div class="px-5 text-center">
                                    <h4>Create New User</h4>
                                </div>
                                <div class="mb-3 px-5">
                                    <label for="exampleInputPassword1" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 px-5">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                                <div class="mb- px-5">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 px-5">
                                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'include/footer.php'; ?>