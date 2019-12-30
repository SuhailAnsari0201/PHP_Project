
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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" action="" method="POST">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <div>
              <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
             </form>
          </div>
        </div>
        <?php echo "<span>".$message."</span>";?>
      </div>
    </div>
  </div>
</body>
