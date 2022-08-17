<?php

@session_start();
@ob_start();
if (isset($_GET['applicant'],$_GET['action'])) {
  if ($_GET['action'] === "logoutapplicant" && $_GET['applicant'] === "newstudent") {
  //destroy all the session applicant info
  unset($_SESSION);
  @session_destroy();
  header("Location: ../");
  exit();

  }
}
