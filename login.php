<?php
	use Phppot\Member;

	if (! empty($_POST["login-btn"])) {
		require_once __DIR__ . '/Model/Member.php';
		$member = new Member();
		$loginResult = $member->loginMember();
	}
?>

<HTML>
<HEAD>
<TITLE>Login</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
	@import url(https://fonts.googleapis.com/css?family=Orbitron);
      

      body {
        background-image: url("images/login_background.jpg");
        font-family: "Orbitron", courier, sans-serif;
	    place-items: center;
      }

	.sign-up-container{
	    background-image: linear-gradient(to right, #ff0030 , #790975);
	}
	.form-label{
	    color:white !important;
	}
	#login-btn{
		color:white;
		font-weight:bold;
		background: #343a40;
	}
	.module-border-wrap {
		text-align:center;
		border-radius: 25px;
		border-width: 10px;	
		position: relative;
		background: linear-gradient(to right, red, purple);
		top: 30px;
		padding: 3px;
    }

     .module {
		border-style: solid;
		border-radius: 40px;
		border-width : 6px;
		font-size: 25px;
		font-weight:bold;
		background-image: url("images/login_background.jpg");
		color:#21201e;
		padding: 1rem;
    }
	
</style>
</HEAD>


<BODY>
	<div>
		
	<div class="module-border-wrap">
		<div class="module" >
             #TEAM THE UNCALLED 6	
        </div>
    </div>
		
		<div class="sign-up-container" 
		     style="text-align: center;
                    border-radius: 25px;
                    border-style: solid;
                    border-color: white;
                    position:relative;
                    left:0px; 
                    top: 100px;" >
					
			<div class="login-signup">
				<a href="user-registration.php" style="color:white;">Sign up</a>
			</div>
			<div class="signup-align">
				<form name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading"  style="color:white;">Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg" style="color:black;"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info" ></span>
							</div>
							<input class="input-box-330" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info" ></span>
							</div>
							<input class="input-box-330" type="password"
								name="login-password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn btn-dark" type="submit" name="login-btn"
							id="login-btn" value="Login Now">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login-password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
