<?php
    try {
        include("../../.database.php");
        session_start();
        $_SESSION['message'] = null;
        if(isset($_SESSION["admin_SESSION"]))
        {
            header('Location: index.php');
            exit();
        }elseif(isset($_POST['password']) && isset($_POST['email'])){
            $password = $_POST['password'];
            
            $email = addslashes($_POST['email']);
            $password =  md5($password);
            $requet = "SELECT * FROM administrateur WHERE password LIKE '$password' AND ( email LIKE '$email' OR username LIKE '$email' )";
            $admins = select($requet);
            if(count($admins) > 0)
            {
                $_SESSION["admin"] = $admins[0];
                $_SESSION["admin_SESSION"] = $admins[0][0];
                header('Location: index.php');
                exit();
            }else
                $_SESSION['message'] = ['خطأ في الولوج المرجو اعادة المحاولة','noValid'];
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Projet de stage">
        <meta name="author" content="MQAM YOUNESS">
        <link href="img/logo.jpg" rel="icon">
        <title>Login</title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-8 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">ادارة مجموعة مدارس الحكيم</h1>
                                        </div>
                                        <form class="user" method="POST" action="login.php">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address Or Username..." required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" >
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <hr>
                                        </form>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="msg_modal_session" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اشعار</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2" id="modal_icon"></div>
                            <div class="col-sm ml-auto" id="modal_msg"></div>
                        </div>    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">حسنا</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script>
            $(document).ready(function(){
                <?php
                    if($_SESSION['message'] != null){
                        echo "$('#modal_msg').html('<h3>".$_SESSION['message'][0]."</h3>');";
                        if ($_SESSION['message'][1] == 'valide') {
                            echo "$('#modal_icon').html('<a class=\"btn btn-success btn-circle btn-lg\"><i class=\"fas fa-check\"></i></a>');";
                        } else {
                            echo "$('#modal_icon').html('<a class=\"btn btn-warning btn-circle btn-lg\"><i class=\"fas fa-exclamation-triangle\"></i></a>');";
                        }
                        echo "$('#msg_modal_session').modal('show');";
                        $_SESSION['message'] = null;
                    }
                ?>
            });
        </script>

    </body>
</html>