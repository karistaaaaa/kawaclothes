<?php
    require 'function.php';

    if(!isset($_SESSION['login'])){

    } else {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background: #3E5879;
                background-size: cover;
                background-position: center;
            }
            .card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                background: #FFFFFF;
                color: black;
            }
            .card:hover {
                transform: scale(1.05);
            }
            .btn-primary {
                transition: all 0.3s ease;
                font-weight: bold;
                letter-spacing: 1px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }
            .btn-primary:hover {
                background-color: #3E5879 !important;
                transform: scale(1.05);
            }
            .form-control {
                border-radius: 10px;
                box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .card-header {
                background: linear-gradient(to right, #A9B5DF, #6E7EBF);
                color: white;
                padding: 30px;
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                text-align: center;
            }
            .card-header i {
                color: #fff;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
                font-size: 120px;
                margin-bottom: 10px;
            }
            .footer-text {
                text-align: center;
                color: white;
                margin-top: 20px;
                font-size: 14px;
                opacity: 0.8;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header d-flex flex-column align-items-center">
                            <i class="fa-solid fa-user-circle"></i>
                            <h3 class="text-center font-weight-bold my-3">Login</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmailAddres" name="username" type="text" placeholder="Enter username" required/>
                                    <label for="inputEmail">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter password" required/>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                    <button type="submit" name="login" class="btn btn-primary px-5 py-2" style="background-color: #3E5879; border-radius: 10px;">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="footer-text">© 2025 KaWaWeb ★ KaWa Clothes</p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>