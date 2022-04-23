<?php
      $message='';
      $serverName = "studenattendenceserver2345.database.windows.net"; // update me
      $connectionOptions = array(
        "Database" => "student_databaase", // update me
        "Uid" => "ankit", // update me
        "PWD" => "kumar123#" // update me
      );
      //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn==false){
        die(print_r(sqlsrv_errors(), true));
    }else{
      if(array_key_exists("send",$_POST)){
        $name = $_REQUEST['name'];
        $class = $_REQUEST['class'];
        $roll_no = $_REQUEST['roll_no'];
        $subject = $_REQUEST['subject'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y', time());
        $time = date('H:i:s',time());
        $Time = $date.' ('.$time.')';
        // print($Time);
        $sql="INSERT INTO details(Roll_no,Name,Class,Subject,Time,Attendence)VALUES ('$roll_no','$name','$class','$subject','$Time','Req_p')";
        $results=sqlsrv_query($conn,$sql);
        if($results){
          $message = "Request has been sent";
          // echo "$message";
        }else{
          $message = "Request does not sent";
          // echo "$message";
        }
      }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Attendence-Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

 
    <link rel="stylesheet" type="text/css" href="{% static 'style.css' %}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href='style.css'rel="stylesheet">
  </head>
  <body class="text-center">
    

<main class="form-signin container">
  <form method="POST">
    <?php
      if($message){
        echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>".$message."
        
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
    ?>
    
    <img class="mb-4" src='images.png' alt="" width="130" height="130">
    <h1 class="h3 mb-3 fw-normal">Give Your Attendence</h1>
      <div class="form-floating">
        <input type="text" class="form-control" id="top" placeholder="First Name" name="name">
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="mid" placeholder="Class" name="class">
        <label for="floatingInput">Class</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="mid" placeholder="Roll No" name="roll_no">
        <label for="floatingInput">Roll No</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="bottom" placeholder="Subject" name="subject">
        <label for="floatingInput">Subject</label>
      </div>
      <button class="w-100 btn btn-lg btn-success" type="submit" name="send">Mark me Present</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
      <a href="teacher.php" style="color: blue">Teacher login</a>
  </form>
</main>


    
  </body>
</html>
