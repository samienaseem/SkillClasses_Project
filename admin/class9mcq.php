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
 #snackbar {
  visibility: hidden;
  /*min-width: 250px;*/
  /*margin-left: -125px;*/
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Test Question
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active"> Add Test Question</li>
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
                  <div class="form-group row" id="optional1">
                      <label for="memberid" class="col-md-4 col-form-label text-md-right">Stream</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="" id="stream" value=" ">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="id_sponcer" class="col-md-4 col-form-label text-md-right">Discription</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="" id="desp">
                      </div>
                  </div>
                  <!-- <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">No. of question</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control">
                      </div>
                  </div> -->
                  <!-- <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Total Time of Test (in second)</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control">
                      </div>
                  </div> -->
                  <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;font-size: 16px;">Enter the Question (with option) And Answer</label>
                  </div>
                  <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Question</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="ques">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Option 1</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="op1">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Option 2</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="op2">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Option 3</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="op3">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Option 4</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="op4">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">Correct Answer</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="ans">
                      </div>
                  </div>
                <button type="button" class="btn btn-success btn-flat" onclick="addQuestion()"><i class="fa fa-check-square-o"></i> Add Question</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="snackbar"></div>
    </section>
  </div>
  <script type="text/javascript" src="js/MCQ_question.js"></script>
<!-- written by saquib naseem from 6springBytes -->
  <script type="text/javascript">
    var url=new URLSearchParams(window.location.search);
    var ab=url.get('class');
    var stream1=url.get('stream');
    var c=document.getElementById('optional1');
    if (ab<11) {
      c.style.display="none";
    }
    
  </script>

  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
