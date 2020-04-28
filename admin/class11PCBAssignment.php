<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
 .myprofile{
   padding: 2%;
   background-color: white;
 }
 input:active{
   border: 1px solid black;
 }
 input{
   border: 1px solid black;
 }
</style>
<script type="text/javascript" src="js/uploader3.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assignment
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active">Assignment</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="container">
            <div class="myprofile">
              <form method="POST">
                  <div class="form-group row">
                      <label for="memberid" class="col-md-4 col-form-label text-md-right">Subject</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="sub" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="id_sponcer" class="col-md-4 col-form-label text-md-right">Assignment Discription</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="desp">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Upload Assignment</label>
                      <div class="col-md-6">
                        <input type="file" class="form-control" name="file1" id="file1" accept="application/pdf,application/vnd.ms-excel">
                      </div>
                  </div>
                </div>
                <button type="button" class="btn btn-success btn-flat" onclick="uploadFile2('11')"><i class="fa fa-check-square-o" style="padding-right: 10px"></i>Upload Assignment</button>
              </form>


              <script type="text/javascript">
                function uploadFile3(argument) {

                  var a = document.getElementById('stream').data('stream');
                  console.log(a);

                  // body...
                }
              </script>
              <!-- <div class="progressbar" style="margin-top: 20px">


                

                  <progress value="0" max="100" id="progressBar" style="border: 1px solid red; width: 100%; background-color: transparent;">value</progress>
                  <h3 id="status"></h3>
                  <p id="loaded_n_total"></p>

              
                
              </div> -->
               <div class="progress">

                  <div id="pp" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                 <!--   -->
                  
            </div>
            <p id="loaded_n_total"></p>
            <h3 id="status"></h3>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
