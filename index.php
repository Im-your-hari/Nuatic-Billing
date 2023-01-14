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
        <input
              type="submit" 
              class="text-center bg-danger border-danger text-white p-2" 
              value="Submit" 
              style="width:32%;">
        </div>
        
      </form>
      <div class="col-md-5" style="position:relative;margin-top:-100px;width:100%;">
      <div class="list-group" id="show-list">
        
        
      </div>
    </div>
    
    </div>

  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $("#product").keyup(function() {
        var productName = $(this).val();
        if (productName!=''){
          $.ajax({
            url:'action.php',
            method:'POST',
            data : {query:productName},
            success: function(response){
              $("#show-list").html(response);
            }
          });
        }
        else{
          $("#show-list").html('');
        }
      });
      $(document).on('click','a',function(){
        $("#product").val($(this).text());
        $("#show-list").html('');
      });
    });
</script>
</body>
</html>


