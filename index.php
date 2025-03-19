<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="css/custom.css">

  <title>OSMS</title>
  <style>
    body {
      background-color: #f0f0f0; 
    }

    .service-container {
      background-color: #d3d3d3; 
      padding: 20px; 
      border-radius: 15px; 
      text-align: center;
      width: 100%; 
      margin: 20px 0; 
      position: relative; 
      overflow: hidden; 
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    }

    .service-container:before {
      content: '';
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      border-radius: 15px; 
      border: 4px solid rgba(220, 53, 69, 0.7); 
      animation: glow-red 2s infinite; 
      pointer-events: none; 
      opacity: 0.5; /
    }

    @keyframes glow-red {
      0% {
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.7);
      }
      25% {
        box-shadow: 5px 5px 20px rgba(220, 53, 69, 1);
      }
      50% {
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.7);
      }
      75% {
        box-shadow: -5px -5px 20px rgba(220, 53, 69, 1);
      }
      100% {
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.7);
      }
    }

    .contact-form input,
    .contact-form textarea {
      width: 150%; 
      margin: 10px 0; 
    }

    .button-container {
      background-color: #d4edda; 
      padding: 15px; 
      text-align: center; 
      border-radius: 10px; 
      margin-top: 20px; 
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-10 fixed-top">
    <a href="index.php" class="navbar-brand">OSMS</a>
    <span class="navbar-text">Customer's Happiness is our Aim</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>

        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">User_Login</a></li>
      </ul>
    </div>
  </nav>

  <header>
    <div class="welcome-box">
      <h1 class="text-uppercase text-danger font-weight-bold">Welcome to OSMS</h1>
    </div>
  </header>
  <div class="button-container">
     
    </div>
    <?php include('userRegistration.php'); ?>
  <div class="container">
    <div class="service-container">
      <h3 class="text-center">OSMS Services</h3>
      <p>
        OSMS Services is India’s leading platform connecting you with skilled professionals across a wide range of services. Whether you need a carpenter, electrician, plumber, driver, or any other service, we are here to meet your needs. Our mission is to enhance your user experience by providing reliable and efficient services tailored to keep your home and office running smoothly.

        With a network of well-trained and certified professionals, we ensure high-quality service at competitive prices. Our extensive range of services is designed to offer you great convenience, allowing you to book various services online with just a few clicks.

        From routine maintenance to urgent repairs, OSMS Services is your one-stop solution for all your service requirements. Now, you can easily schedule your service and enjoy peace of mind knowing that you’re in good hands.
      </p>
    </div>
    <div class="service-container">
      <h2 class="text-center mb-4">Contact Us</h2>
      <div class="row">
        <div class="col-md-8 offset-md-2 contact-form">
          <?php include('contactform.php'); ?>
        </div>
      </div>
    </div>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-6">
          <div class="service-container">
            <h4>Kovai Branch:</h4>
            <p>
              OSMS Pvt Ltd,<br>
              Othakalmandabam,<br>
              Coimbatore - 656964<br>
              Phone: +91 9845763228<br>
              <a href="#" target="_blank">www.osms.com</a>
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="service-container">
            <h4>Chennai Branch:</h4>
            <p>
              OSMS Pvt Ltd,<br>
              T Nagar,<br>
              Chennai - 600036<br>
              Phone: +91 6578395747<br>
              <a href="#" target="_blank">www.osms.com</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="button-container">
     
    </div>
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
      <div class="row py-3">

        <div class="col-md-7 text-right">
        <small style="color: orange;">Designed by OSMS &copy; 2024.</small>
          <small class="ml-2"><a href="Admin/login.php" style="color: pink;">Admin Login</a></small>
        </div>
      </div>
    </div>
  </footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
