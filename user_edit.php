<?php
include 'include/config.php';
include 'include/database.php';
include 'include/functions.php';


include 'include/header.php';

$errorMessage ='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);

    // echo $confirm_password."<br>";
    // echo $password;
    // echo $email;
    // echo $username;

//    check if user already exists
    $sql = "SELECT * FROM users WHERE email = :email AND active = 1";
    $stement = $conn->prepare($sql);
    $stement->execute(['email' => $email]);
    $user = $stement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $errorMessage = "User already exists";
    }else{
        // insert user into database
          $sql = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";
            $stement = $conn->prepare($sql);
            $stement->execute(['email' => $email, 'password' => $password, 'username' => $username]);
            header('Location: index.php');
            die();
    }
    

}


?>

<div class="container">

    <div class="row d-flex justify-content-center">
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
        <div class="col-md-6 px-5">
            <form class="px-5 py-3 " method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="px-5 text-center mb-5">
                    <h4>Update User Information</h4>
                </div>
                <div class="mb-3 px-5">
                    <label for="exampleInputPassword1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="username">
                </div>
                <div class="mb-3 px-5">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" required>

                </div>
                <div class="mb-4 px-5">
                    <label for="exampleInputPassword1" class="form-label">User status</label>

                    <select class="form-select form-select-sm" aria-label="Small select example" name="active">
                        <option value="1">Active</option>
                        <option value="2">Not Active</option>

                    </select>
                </div>

                <div class="mb-4 px-5">
                    <label for="exampleInputPassword1" class="form-label">User role</label>

                    <select class="form-select form-select-sm" aria-label="Small select example" name="role">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>

                    </select>
                </div>
                <!-- <div class="mb-3 px-5">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password">
                    
                </div> -->
                <div class="mb-3 px-5"><button type="submit" class="btn btn-dark w-100">Update infomation <span><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#e1d5d5"
                                viewBox="0 0 256 256">
                                <path
                                    d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,109.66-32,32a8,8,0,0,1-11.32-11.32L148.69,136H88a8,8,0,0,1,0-16h60.69l-18.35-18.34a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,173.66,133.66Z">
                                </path>
                            </svg></span></button></div>
            </form>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>