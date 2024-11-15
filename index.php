<?php
include 'include/config.php';
include 'include/database.php';
include 'include/functions.php';


include 'include/header.php';

$errorMessage ='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password =$_POST['password'];
    // $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email";
   
    $stement = $conn->prepare($sql);
    $stement->execute(['email' => $email]);
   
    $user = $stement->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_email'] = $user['email'];
        header('Location: dashboard.php');
        die();
    } else {
       $errorMessage = "Please provide correct email or password";
    }
    

}


?>


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 text-center px-5">
            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60" color="#000000"
                    fill="none">
                    <path d="M4 15.5C2.89543 15.5 2 14.6046 2 13.5C2 12.3954 2.89543 11.5 4 11.5" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20 15.5C21.1046 15.5 22 14.6046 22 13.5C22 12.3954 21.1046 11.5 20 11.5"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 7L7 4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    <path d="M17 7L17 4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    <circle cx="7" cy="3" r="1" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    <circle cx="17" cy="3" r="1" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    <path
                        d="M13.5 7H10.5C7.67157 7 6.25736 7 5.37868 7.90898C4.5 8.81796 4.5 10.2809 4.5 13.2069C4.5 16.1329 4.5 17.5958 5.37868 18.5048C6.25736 19.4138 7.67157 19.4138 10.5 19.4138H11.5253C12.3169 19.4138 12.5962 19.5773 13.1417 20.1713C13.745 20.8283 14.6791 21.705 15.5242 21.9091C16.7254 22.1994 16.8599 21.7979 16.5919 20.6531C16.5156 20.327 16.3252 19.8056 16.526 19.5018C16.6385 19.3316 16.8259 19.2898 17.2008 19.2061C17.7922 19.074 18.2798 18.8581 18.6213 18.5048C19.5 17.5958 19.5 16.1329 19.5 13.2069C19.5 10.2809 19.5 8.81796 18.6213 7.90898C17.7426 7 16.3284 7 13.5 7Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    <path d="M9.5 15C10.0701 15.6072 10.9777 16 12 16C13.0223 16 13.9299 15.6072 14.5 15"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9.00896 11H9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M15.009 11H15" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></p>
            <h1 class="fs-2">The Content Land</h1>
            <p class=" fw-normal">Join our community and make knowlwdge accessible!
            </p>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-6 px-5">
            <form class="px-5 py-4 " method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="px-5 text-center py-2">
                    <h4>Welcome back!</h4>
                </div>

                <div class="mb-3 px-5">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email">

                </div>
                <div class="mb-3 px-5">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    <p class="text-sm text-danger pb-2 pt-1"><?=$errorMessage;?></p>
                </div>

                <div class="mb-3 px-5">
                    <button type="submit" class="btn btn-dark w-100">Signin <span><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#e1d5d5"
                                viewBox="0 0 256 256">
                                <path
                                    d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,109.66-32,32a8,8,0,0,1-11.32-11.32L148.69,136H88a8,8,0,0,1,0-16h60.69l-18.35-18.34a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,173.66,133.66Z">
                                </path>
                            </svg></span></button>
                </div>

                <div class="mb-3 px-5">
                    <p class="text-center">Don't have an account? <a href="signup.php">Sign up</a></p>
                </div>

            </form>
        </div>
    </div>
</div>



<?php include 'include/footer.php'; ?>