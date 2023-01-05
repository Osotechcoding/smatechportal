<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./"><img src="<?php echo $Osotech->get_schoolLogoImage(); ?>" class="img-fluid"
        width="50" style="margin-right: 3px;"> <?php echo "E-RESULT"; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?php echo APP_ROOT; ?>">HOME</a>

        <a class="nav-link" href="<?php echo EPORTAL_ROOT; ?>" target="_blank">LOGIN</a>
      </div>
    </div>
    <a onclick="return confirm('Are you sure you anto to logout?');"
      href="logout?action=logout&student=cstudent"><button class="btn btn-dark" type="button"
        style="color: #fff;">Logout</button></a>

  </div>
</nav>