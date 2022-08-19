<nav class="navbar navbar-expand-lg bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="./"><?php echo __OSO_APP_NAME__." PORTAL"; ?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
    <a class="nav-link active" aria-current="page" href="./">Home</a>
    <a class="nav-link" href="howtoapply">FAQs</a>
    <a class="nav-link" href="<?php echo APP_ROOT;?>" target="_blank">Student Portal</a>
  </div>
</div>
<a onclick="return confirm('Are you sure you anto to logout?');" href="logout?action=logoutapplicant&applicant=newstudent"><button class="btn btn-outline-danger" type="button">Logout</button></a>

</div>
</nav>
