<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
	<section class="login_panel">
    	<div class="row">
    		<div class="col-md-12">
    			    <img src="../dist/img/account_icon.png">
    			    <h2>ADMIN LOGIN</h2>
    			    <form class="login100-form validate-form" form action="login.php" method="POST">
    			<?php
                   if(isset($_SESSION['error'])){
                    echo "
                        <div class='callout callout-danger text-center mt20'>
                        <p style='color:white' >".$_SESSION['error']."</p>
                    </div>
                    ";
                    unset($_SESSION['error']);
                  }
                ?>
    			    	<div class="row">
    			    		<div class="col-md-12 validate-input wrap-input100" data-validate="Enter Username">
    			        		<input class="input100" placeholder="Username" name="username" type="text" autofocus />
    			        	</div>
    			        	<div class="col-md-12 validate-input wrap-input100" data-validate="Enter password">
    			        		<input class="input100" placeholder=" Password" type="password" name="password" autofocus />
    			        	</div>
    			        <div class="container-login100-form-btn col-md-12">
                        <button type="submit" name="adminlogin" class="login100-form-btn" ><i class="fa fa-sign-in"></i>Login</button>
                    </div>
    			 </form>
    		</div>
    	</div>
    </section>
<?php include 'includes/scripts.php' ?>
</body>
</html>
