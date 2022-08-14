<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Online Registration Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMATECH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="howtoapply">FAQs</a>
        <a class="nav-link" href="http://localhost/smatechportal/eportal/" target="_blank">Student Portal</a>
      </div>
    </div>
  <button class="btn btn-outline-danger" type="button">Logout</button>

  </div>
</nav>
<br>
    <div class="accordion mt-1" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        How To Apply
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>

</div>
<br>
<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->
<br>
<div class="col-md-12">
  <form>
      <h3 class="text-center">Scratch Card Information</h3>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label">Scratch Card Pin</label>
          <input type="text" name="" class="form-control form-control-lg" placeholder="**********">
          <div id="cardHelp" class="form-text text-danger">Enter the Card Pin and Serial in the space provided</div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="cardserial" class="form-label">Card Serial</label>
          <input type="text" autocomplete="off" name="cardserial" id="cardserial" class="form-control form-control-lg" placeholder="**********">
        </div>
      </div>

        <h3 class="mt-3 text-info text-center">Academic Information</h3>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="student_email" class="form-label">Email address</label>
          <input type="text" autocomplete="off" name="student_email" class="form-control form-control-lg" placeholder="student@smatechportal.edu.com">
            <div id="emailHelp" class="form-text text-danger">I don't have e-mail <a href="#"> Create Email Account</a></div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="student_username" class="form-label">Father's Name (Username)</label>
          <input type="text" autocomplete="off" name="student_username" class="form-control form-control-lg" placeholder="@osotech">
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label">Phone</label>
          <input type="text" autocomplete="off" name="" class="form-control form-control-lg" placeholder="080-0000-0000">
          <div id="phoneHelp" class="form-text text-danger">Allowed phone format 080-2311-3432 </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="student_class" class="form-label"> Class Level</label>
          <select class="custom-select form-control form-control-lg" id="student_class" name="student_class">
            <option value="pry" selected>Primary</option>
            <option value="jnr">Junior </option>
            <option value="snr">Senior</option>
          </select>
        </div>
      </div>
    </div>


    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Agree to Terms &amp; Conditions</label>
    </div>
    <button type="submit" class="btn btn-dark btn-lg btn-round mb-5" style="float:right">Submit &amp; Continue</button>
  </form>
</div>
<br>



<!-- Footer -->
<?php
if (file_exists("footer.php")) {
require_once ("footer.php");
}
 ?>
<!-- Footer -->
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="" charset="utf-8"></script>
  </body>
</html>
