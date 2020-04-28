<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-yellow sidebar-mini">
	<link rel="stylesheet" type="text/css" href="../dist/css/menubar-2.css">
	<div class="wrapper">
		<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar_2.php'; ?>

  	<div class="content-wrapper">

  		<div class="container-fluid">

  			<div class="row filter-bar">

  				<div class="col-lg-6 col-xs-6">
  					<label for="Subject"> Select a subject</label>

  				<select id="subjects" onchange="myfunction()">
  					<option value="None">None</option>
  					<option value="Physics">Physics</option>
  					<option value="Chemistry">Chemistry</option>
  					<!-- <option value="Maths">Maths</option> -->
  					<option value="Biology">Biology</option>
  				</select>
  				</div>
  				
  		<!-- <div class="dropdown">

  			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Subject
  				<span class="caret"></span></button>

  				<ul class="dropdown-menu">
  					<li><a>Maths</a></li>
  					<li><a>Maths</a></li>
  					<li><a>Maths</a></li>
  					<li><a>Maths</a></li>
  					<li><a>Maths</a></li>
  				</ul>
  			
  		</div> -->


  	</div>
  	<div class="row" id="res1">

  					<!-- <div class="col-lg-3 col-xs-6 boxing" ></div>
  					<div class="col-lg-3 col-xs-6 boxing" ></div>
  					<div class="col-lg-3 col-xs-6 boxing" ></div>
  					<div class="col-lg-3 col-xs-6 boxing" ></div>
  					<div class="col-lg-3 col-xs-6 boxing" ></div> -->
  					
  				</div>

  				<div class="row">
  					<div id="res2">
  						
  					</div>
  				</div>
  			
  		</div>

  		
  			<script type="text/javascript" src="js/getvideos.js"></script>
  			<script type="text/javascript">
  				function clickfunction(argument) {

  					alert(argument);
  					// body...
  				}
  			</script>
  	</div>



	</div>




<?php include 'includes/scripts.php'; ?>
</body>