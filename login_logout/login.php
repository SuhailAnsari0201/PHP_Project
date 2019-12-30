
<?php
session_start();
if(isset($_SESSION['status']) && $_SESSION['status'] == true ){
    header("Location:home.php");
}

$message="";
if(isset($_POST["submit"])){
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $connection = mysql_connect("localhost","root","") or die(mysql_error());
        $db = mysql_select_db("php_login_logout") or die("cannot select DB");
        $email = $_POST["email"];
        $password=$_POST["password"];
       
        $query = mysql_query("SELECT * FROM userData WHERE email = '{$email}' AND password='{$password}'");

        $row = mysql_num_rows($query);

        if($row==true){

            $_SESSION["status"] = true;
            header("Location:home.php");
        }
        else{
            $message = "Sorry, your credentials are not valid, Please try again."; 
        }
    }else{
        $message =  "pls enter all the inputs";
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
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
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
                     <hr>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
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
