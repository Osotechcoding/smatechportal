<?php 

class Alert {
	protected $alert;
	
	public function alert_msg($msg="",$type="warning"){
		$this->alert ='<div class="alert alert-'.$type.' alert-dismissible" role="alert"><strong>'.$msg.'</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
 		return $this->alert;
	}

	public function alert_toastr($type="warning",$msg="",$title=""){
      $this->response ='<script>
      toastr.'.$type.'("'.$msg.'","'.$title.'",{closeButton:!0,extendedTimeOut:5000,tapToDismiss:!1,progressBar:!0,showMethod:"slideDown",hideMethod:"fadeOut",showDuration:500,timeOut:5000,hideDuration:500})
      </script>';
      return $this->response;
    }
}


 ?>