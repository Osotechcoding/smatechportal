   <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./"><img src="<?php echo $Osotech->get_schoolLogoImage();?>" class="img-fluid" width="50"><?php echo __OSO_APP_NAME__; ?> <?php echo __OSO_APP_VERSION__ ?> Documentation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="./">Admin</a>
        <a class="nav-link" href="./staffdoc">Staff</a>
        <a class="nav-link" href="./studentdoc">Student</a>
      </div>
    </div>
    <form class="d-flex" role="search" method="get">
     <input class="form-control me-5" type="search" name="q" placeholder="Search" aria-label="Search">
     <button class="btn btn-outline-dark btn-md" type="search">Search</button>
   </form>

  </div>
</nav>