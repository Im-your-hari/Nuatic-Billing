<?php error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING); ?> 
<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page...
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include('config.php'); //Set up database connection...
//include('https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');

?>








<!DOCTYPE html>

<head>
	<title>Nuvatic-Billing</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />
</head>


<body>


<div class="container py-5 col-sm">

<a href="index.php"><!--img src="nang.png"--><h1>Nuvatic Electrical Equipment Trading</h1></a><br><hr>
<a href="logout.php" class="btn btn-success"><i class="fa fa-lock"></i> Logout</a>
<!--a href="register_student.php" class="btn btn-success"><i class="fa fa-lock"></i> Admission Form</a-->
<a href="export.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Data</a>
<hr>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 bg-info p-4 mt-3">
      <h3 class="text-center text-white "><b>BILL DETAILS</b></h3>
      <form action="invoice.php" method="post" class="form-inline p-3">
        <input 
        type="text" 
        name="product" 
        id="product" 
        value=""
        class="form-control form-control-lg rounded-0" 
        placeholder="Product" 
        style="width:100%;">
        <div style="padding: 30px;
                    display: flex;
                    justify-content: center;
                    align-items: center;">
        <input type="submit" class="text-center bg-danger border-danger text-white p-2" value="Submit" style="width:32%;">
        </div>
        
      </form>
      <div class="col-md-5" style="position:relative;margin-top:-100px;width:100%;">
      <div class="list-group" id="show-list">
        <a href="#" class="list-group-item list-group-item-action border-1 text-center">List1</a>
        <a href="#" class="list-group-item list-group-item-action border-1 text-center">List1</a>
        <a href="#" class="list-group-item list-group-item-action border-1 text-center">List1</a>
      </div>
    </div>
    
    </div>

  </div>
</div>

















    <!-- View modal  -->
<?php 


/*
$get_data = "SELECT * FROM admission_data where username='".$_SESSION['username']."'";
$run_data = mysqli_query($con,$get_data);

$row = mysqli_fetch_array($run_data);

if($row){
echo "<section style="."background-color: #eee;".">
<div class="."container py-5".">
  <div class="."row".">
    <div class="."col-lg-4".">
      <div class="."card mb-4".">
        <div class="."card-body text-center".">
          <img src="."./images/".$row["image"]."" ."
            class="."rounded-circle img-fluid" ."style="."width: 150px; height=150px".">
          <h3 class="."my-3".">".$row["name"]."</h3>
          <h4 class="."my-3".">NANG".(1000+$row["regno"])."</h4>
          <p class="."text-muted mb-4".">@".$_SESSION["username"]."</p>
        </div>
      </div>
    </div>
    <div class="."col-lg-8".">
      <div class="."card mb-4".">
        <div class="."card-body".">
          <div class="."row".">
            <div class="."col-sm-3".">
              <p class="."mb-0".">Full Name</p>
            </div>
            <div class="."col-sm-9".">
              <p class="."text-muted mb-0".">".$row["name"]."</p>
            </div>
          </div>
          <hr>
          <div class="."row".">
            <div class="."col-sm-3".">
              <p class="."mb-0".">Email</p>
            </div>
            <div class="."col-sm-9".">
              <p class="."text-muted mb-0".">".$row["email"]."</p>
            </div>
          </div>
          <hr>
          <div class="."row".">
            <div class="."col-sm-3".">
              <p class="."mb-0".">Date Of Birth</p>
            </div>
            <div class="."col-sm-9".">
              <p class="."text-muted mb-0".">".$row["dob"]."</p>
            </div>
          </div>
          <hr>
          <div class="."row".">
            <div class="."col-sm-3".">
              <p class="."mb-0".">Phone</p>
            </div>
            <div class="."col-sm-9".">
              <p class="."text-muted mb-0".">".$row["phone"]."</p>
            </div>
          </div>
          <hr>
          <div class="."row".">
            <div class="."col-sm-3".">
              <p class="."mb-0".">Address</p>
            </div>
            <div class="."col-sm-9".">
              <p class="."text-muted mb-0".">".$row["address"]."</p>
            </div>
          </div>
          <hr>
          <div class="."row".">
            <div class="."col-sm-3".">
              <p class="."mb-0".">Nationality</p>
            </div>
            <div class="."col-sm-9".">
              <p class="."text-muted mb-0".">".$row["nationality"]."</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>";
}
else{
    echo "<h1>Welcome ".$_SESSION["username"]."</h1><br>";
    
    echo "<marquee><h4>Your'e not registered yet..!<h4></marquee>";
}

*/
?>

</body>
</html>

