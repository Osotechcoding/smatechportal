<?php

class Alert
{
	protected $response;

	public function alert_msg($msg = '', $type = 'warning')
	{
		$this->response = '<div class="alert alert-' . $type . ' alert-dismissible text-center" role="alert"><strong>' . $msg . '</strong></div>';
		return $this->response;
	}

	public function alert_toastr($type = 'error', $msg ='', $title = '')
	{
		$this->response = '<script type="text/javascript">
      toastr.' . $type . '("' . $msg . '","' . $title . '",{closeButton:!0,extendedTimeOut:5000,tapToDismiss:!1,progressBar:!0,showMethod:"slideDown",hideMethod:"fadeOut",showDuration:500,timeOut:5000,hideDuration:500});
      </script>';
		return $this->response;
	}
}