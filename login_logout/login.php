
<?php
    include 'includes/vars.inc.php';
    include 'includes/connect.inc.php';

    if(isset($_SESSION['status']) && $_SESSION['status'] == true ){
        header("Location:home.php");
    }
    
    $message="";
    if(isset($_POST["submit"])){
        if(!empty($_POST["email"]) && !empty($_POST["password"])){
            $pemail = $_POST["email"];
            $ppassword=$_POST["password"];
            //Query
            $sql = "SELECT * FROM user_table WHERE `email` = '{$pemail}'";
            $result = $pdo->query($sql);
            $rowNo = $result->rowCount();
            if($rowNo == 1){
                $row = $result->fetch();
                $id = $row['id'];
                $email = $row['email'];
                $name = $row['name'];
                $password = $row['password'];
                if($ppassword == $password){
                    $_SESSION["status"] = true;
                    $_SESSION['name'] = $name;
                    header("Location:home.php");
                }else{
                    $message = "You Forgot the Password, Seriously!, I am done with you Civilian. I need to start Civil War.";
                }
                                
            }else{
                $message = "No User with this email registered.";
            }
        }else{
            $message =  "Hey Civilian, Enter all the inputs";
        }
    }
?>


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>COROVER - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center logodiv mb-4">
                    <h1 class="h4 text-white mb-4">
                        <img src="https://res-3.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco/vtvzv6byyjpyo6dayrvt" style="height: 35px;"> x <img src="https://asset21.ckassets.com/themes/ck-storepage-v2/img/logo_v6.png" style="height: 25px;">
                    </h1>
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                        aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password"
                        placeholder="Password">
                    </div>
                    <div>
                    <button  type="submit" name="submit" class="btn btn-primary btn-user btn-block">Login</buttton>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <p class="text-danger"><?php echo $message; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-3">
      </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
