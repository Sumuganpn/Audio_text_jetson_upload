<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>



<!DOCTYPE html>
<html>

  <head>
    <!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    

    <title>AUDIO UPLOAD AND AUDIO PLAY</title>

    <!--Style sheets-->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap.min.css"
    />
    <style>
      @import url(https://fonts.googleapis.com/css?family=Orbitron);
      

      body {
        background-color: #111;
        font-family: "Orbitron", courier, sans-serif;
      }

      p {
        margin-top: 3em;
        font-size: 2em;
      }

      h1 {
        font-size: 3em;
      }
      a {
        text-decoration: none;
        color: rgba(255, 255, 255, 0.3);
      }

      .glow {
        text-align: center;
        color: rgba(0, 230, 215, 0.3);
        text-shadow: 0 0 1px rgba(21, 112, 99, 0.932);

        background: -webkit-linear-gradient(transparent, transparent),
          url(https://i.imgur.com/WyMyxQ6.png) repeat;
        /* clipping webkit magic */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        /* Animation */
        -webkit-animation: glow 1s infinite alternate;
        -moz-animation: glow 1s infinite alternate;
        animation: glow 1s infinite alternate;
        -webkit-animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
        -moz-animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
        animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
      }
      .glowing {
        text-align: center;
        color: rgba(0, 230, 215, 0.3);
        text-shadow: 0 0 1px rgba(21, 112, 99, 0.932);

        height: 40px; 
        border-radius: 25px;
        border-style: solid;
        border-color: white;
        
        background: -webkit-linear-gradient(transparent, transparent),
          url(https://i.imgur.com/WyMyxQ6.png) repeat;
        /* clipping webkit magic */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        /* Animation */
        -webkit-animation: glow 1s infinite alternate;
        -moz-animation: glow 1s infinite alternate;
        animation: glow 1s infinite alternate;
        -webkit-animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
        -moz-animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
        animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
      }

      @-webkit-keyframes glow {
        100% {
          text-shadow: 0 0 2px rgba(255, 255, 255, 0.1),
            0 0 5px rgba(255, 255, 255, 0.1), 0 0 10px rgba(157, 208, 154, 0.3);
        }
      }

      @-moz-keyframes glow {
        100% {
          text-shadow: 0 0 2px rgba(255, 255, 255, 0.1),
            0 0 5px rgba(255, 255, 255, 0.1), 0 0 10px rgba(157, 208, 154, 0.3);
        }
      }

      @keyframes glow {
        100% {
          text-shadow: 0 0 2px rgba(255, 255, 255, 0.1),
            0 0 5px rgba(255, 255, 255, 0.1), 0 0 10px rgba(157, 208, 154, 0.3);
        }
      }
    </style>
    <!--Custom styles-->

    <!--Font icons-->
  </head>
  <body>
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="">BIT_HACKATHON</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                href="upload.php"
                tabindex="-1"
                aria-disabled="true"
                class="btn btn-outline-primary"
                >UPLOAD AUDIO FILES</a
              >
            </li>
            &nbsp;
            &nbsp;
            <a
                href="/signup/hackathon/search.php"
                tabindex="-1"
                aria-disabled="true"
                class="btn btn-outline-success"
                >SEARCH AUDIOS</a
              >
            <!-- <form class="d-flex" action="http://localhost/hackathon/search.php">
            <button class="btn btn-outline-success" type="submit">
              SEARCH AUDIOS
            </button> -->
          </form>
          </ul>
         
          <div></div>
          <span class="d-flex" ><a href="logout.php" class="btn btn-outline-danger">Logout</a></span>
        </div>
      </div>
    </nav>
   <br>
      <h3 class="glowing" >Welcome <?php echo $username;?></h3> 

    <!--Main Container-->
    <div class="container">
    
      <center>
        <p class="glow" >TEAM</p>
        <h1 class="glow">
          #THE UNCALLED 6
        </h1>
		<h1 class="glow">
			BANNARI AMMAN INSTITUTE OF TECHNOLOGY
		</h1>

		<br>
		<br>
		<h1 style="color:  rgb(86, 86, 86)">PROBLEM CODE : 201</h1>
		<h3 style="color: rgb(86, 86, 86);">OPEN INNOVATION CHALLENGE</h3>
      </center>
    </div>

    <!-- Core javascript files-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
      crossorigin="anonymous"
    ></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
