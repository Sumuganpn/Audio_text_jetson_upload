<!DOCTYPE html>
<html>
<head>
	<!-- Responsive meta tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>UPLOAD SONGS</title>

	<!--Style sheets-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<!--Custom styles-->

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
        color: rgba(5, 255, 238, 0.3);
        text-shadow: 0 0 1px rgba(157, 208, 154, 0.3);

        background: -webkit-linear-gradient(transparent, transparent),
          url(https://i.imgur.com/WyMyxQ6.png) repeat;
        /* clipping webkit magic */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        /* Animation */
        -webkit-animation: glow 2s infinite alternate;
        -moz-animation: glow 2s infinite alternate;
        animation: glow 2s infinite alternate;
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

</head>

<body>

	<!--Navigation bar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/signup/hackathon/">BIT_HACKATHON</a>
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
    </nav>
    &nbsp;
	<!--Main Container-->
	<div class="container">
		<div class="upload">
		<h3 class="glow">#UPLOAD AUDIOS</h3>
		<hr style = 'color: white;'/>
			<?php
			if (isset($_GET['success'])) {
				# code...
				?>
				<div class="alert alert-success">Music have been uploaded!</div>
				<?php
			}elseif (isset($_GET['error'])) {
				# code...
				?>
				<div class="alert alert-danger">Music failed to upload!</div>
				<?php
			}else{

			}
			?>
			<form method="post" action="action.php" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<label style= 'color:white;'>Audio name</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-music"></i></span>
							<input type="text" class="form-control" placeholder="Enter song name" aria-label="Enter song name" aria-describedby="basic-addon1" name="song_name" required>
						</div>
					</div>
					<div class="col-md-6">
						<label style= 'color:white;'>Audio File <small><b>( MP3 )</b></small></label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
							<input type="file" class="form-control" placeholder="Enter song name" aria-label="Enter song name" aria-describedby="basic-addon1" name="song_file" accept="audio/*" required>
						</div>
					</div>
					&nbsp;
					<div class="col-md-6">
						<label style= 'color:white;'>Text File <small><b>( .TXT )</b></small></label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
							<input type="file" class="form-control" placeholder="Enter song name" aria-label="Enter song name" aria-describedby="basic-addon1" name="song_text" accept="text/*" required>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label>Cover art <small><b>(JPG, PNG, BMP)</b></small></label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-image"></i></span>
							<input type="file" class="form-control" placeholder="Enter song name" aria-label="Enter song name" aria-describedby="basic-addon1" name="cover_art" accept="image/*" required>
						</div>
					</div> -->
					<!-- <div class="col-md-6">
						<label>Song Artiste</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-microphone"></i></span>
							<input type="text" class="form-control" placeholder="Enter artiste name" aria-label="Enter artiste name" aria-describedby="basic-addon1" name="artise_name" required>
						</div>
					</div> -->
					<!-- <div class="col-md-6">
						<label>Select song category</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
							<select class="form-control" name="category" required>
								<option value="">--Select Categories--</option>
								<option value="Blues Test">Blues Test</option>
							</select>
						</div>
					</div> -->
					<!-- <div class="col-md-12">
						<label>Uploader [No Email here]</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" placeholder="Enter your name((EG John Doe) [*No Email Address]" aria-label="Enter song name" aria-describedby="basic-addon1" name="song_uploader" required>
						</div>
					</div> -->
					<!-- <div class="col-md-12">
						<div class="orm-group">
							<label class="alert alert-info" style="width: 100%">
								<b><input type="checkbox" name="Terms" value="yes" required> Pleas agree to the below terms</b><br>
								*I have read and accepted all Website rules and regulations<br>
								*You should not add email address or phone to song name or file, else song will be deleted from our website
							</label>
						</div>
					</div> -->
					&nbsp;
					&nbsp;
					<div class="col-md-6">
						<button type="submit" class="btn btn btn-primary" name="btn-upload">Upload now</button>
					</div>
				</div>
			</form>
		</div>
		
	</div>

<!-- Core javascript files-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>