<?php
require_once "Database.php";
require_once "Configuration.php";
class Bus
{
	private $dbh;
	protected $stmt;
	protected $response;
	protected $config;
	protected $bus_table = "visap_bus_tbl";
	protected $route_table = "visap_routes_tbl";
	protected $driver_table = "visap_driver_tbl";

	public function __construct()
	{
		$this->dbh = osotech_connect();
		$this->alert = new Alert();
		$this->config = new Configuration();
	}

	public function createBusRoute($data)
	{
		$vehicle_id = $this->config->Clean($data['vehicle_id']);
		$driver_id = $this->config->Clean($data['driver_id']);
		$route_desc = $this->config->Clean($data['route_name']);
		$busstops = $this->config->Clean($data['busstops']);
		$price = $this->config->Clean($data['price']);
		$auth_pass = $this->config->Clean($data['auth_code']);

		if ($this->config->isEmptyStr($route_desc) || $this->config->isEmptyStr($busstops) || $this->config->isEmptyStr($vehicle_id) || $this->config->isEmptyStr($driver_id) || $this->config->isEmptyStr($price)) {

			$this->response = $this->alert->alert_toastr("error", "All fields are Required!, Please try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {

			$this->response = $this->alert->alert_toastr("info", " Authentication Code is Required, Please try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {

			$this->response = $this->alert->alert_toastr("info", "Invalid Authentication Code, Please try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->check_single_data($this->route_table, "route_desc", $route_desc) === true) {

			$this->response = $this->alert->alert_toastr("error", "$route_desc already Exists!, Please try again!", __OSO_APP_NAME__ . " Says");
		} else {
			//create the fresh route desc
			try {
				$created_at = date("Y-m-d");
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("INSERT INTO `{$this->route_table}` (`route_desc`,`bus_stops`,`route_price`, `driverId`,`vehicleId`,`created_at`) VALUES (?,?,?,?,?,?);");
				if ($this->stmt->execute([$route_desc, $busstops, $price, $driver_id, $vehicle_id, $created_at])) {
					$this->dbh->commit();
					$this->dbh = null;
					$this->response = $this->alert->alert_toastr("success", "$route_desc Created Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
		//$this->dbh = null;

	}

	public function getAllBusRoutes()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->route_table}` ORDER BY route_desc ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}


	public function createNewVehicle($data, $file)
	{
		$vehicle_desc = $this->config->Clean($data['vehicle_name']);
		$vehicle_plate_no = $this->config->Clean($data['plate_no']);
		$vehicle_capacity = $this->config->Clean($data['capacity']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		$photo_temp = $file['vehicleImage']['tmp_name'];
		$photoName = $file['vehicleImage']['name'];
		$photo_size = $file['vehicleImage']['size'] / 1024;
		$photo_error = $file['vehicleImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg", "jpeg", "png");
		$name_div = explode(".", $photoName);
		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		if ($this->config->isEmptyStr($vehicle_desc) || $this->config->isEmptyStr($vehicle_plate_no) || $this->config->isEmptyStr($vehicle_capacity) || $this->config->isEmptyStr($photoName)) {

			$this->response = $this->alert->alert_toastr("error", "Invalid form Submission, Pls try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {

			$this->response = $this->alert->alert_toastr("info", "Please enter an Authentication code to proceed!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("info", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} elseif (!in_array($image_ext, $allowed)) {

			$this->response = $this->alert->alert_toastr("error", "Your file format is not supported, Please check and try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($photo_size > 200) {

			$this->response = $this->alert->alert_toastr("error", "Vehicle Image Size should not exceed 200KB, Selected Image Size is :" . number_format($photo_size, 2) . "KB", __OSO_APP_NAME__ . " Says");
		} elseif ($photo_error !== 0) {

			$this->response = $this->alert->alert_toastr("error", "There was an error Uploading Vehicle Image, Try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->check_single_data($this->bus_table, "vehicle_desc", $vehicle_desc) === true) {
			$this->response = $this->alert->alert_toastr("error", "$vehicle_desc already Exists!, Please try again!", __OSO_APP_NAME__ . " Says");
		} else {
			$vehicle_image = uniqid('', true) . "." . $image_ext;
			$file_destination = "../vehicles/" . $vehicle_image;
			try {
				$created_at = date("Y-m-d");
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("INSERT INTO `{$this->bus_table}` (vehicle_desc,vehicle_plate_no,vehicle_capacity,vehicle_image,created_at) VALUES (?,?,?,?,?);");
				if ($this->stmt->execute(array($vehicle_desc, $vehicle_plate_no, $vehicle_capacity, $vehicle_image, $created_at))) {
					if ($this->config->move_file_to_folder($photo_temp, $file_destination)) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success", "$vehicle_desc created successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
					}
				} else {
					$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				if (file_exists($file_destination)) {
					unlink($file_destination);
				}
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
		$this->dbh = null;
	}

	public function getAllVehicles()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->bus_table}` ORDER BY vehicle_desc ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function createNewVehicleDriver($data, $file)
	{
		$auth_pass = $this->config->Clean($data['auth_code']);
		$driver_name = $this->config->Clean($data['name']);
		$phone = $this->config->Clean($data['phone']);
		$email = $this->config->Clean($data['email']);
		$license_no = $this->config->Clean($data['license_no']);
		$address = $this->config->Clean($data['address']);

		$photo_temp = $file['driverImage']['tmp_name'];
		$photoName = $file['driverImage']['name'];
		$photo_size = $file['driverImage']['size'] / 1024;
		$photo_error = $file['driverImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg", "jpeg", "png");
		$name_div = explode(".", $photoName);
		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		//
		if ($this->config->isEmptyStr($driver_name) || $this->config->isEmptyStr($phone) || $this->config->isEmptyStr($email) || $this->config->isEmptyStr($photoName) || $this->config->isEmptyStr($license_no) || $this->config->isEmptyStr($address)) {

			$this->response = $this->alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {

			$this->response = $this->alert->alert_toastr("info", "Please enter an Authentication code to proceed!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("info", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} elseif (!$this->config->is_Valid_Email($email)) {
			$this->response = $this->alert->alert_toastr("warning", "$email is not valid e-mail address! check and try again", __OSO_APP_NAME__ . " Says");
		} elseif (!in_array($image_ext, $allowed)) {

			$this->response = $this->alert->alert_toastr("error", "Your file format is not supported, Please check and try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($photo_size > 50) {

			$this->response = $this->alert->alert_toastr("error", "Your Image Size should not exceed 50KB, Selected image size is :" . number_format($photo_size, 2) . "KB", __OSO_APP_NAME__ . " Says");
		} elseif ($photo_error !== 0) {

			$this->response = $this->alert->alert_toastr("error", "There was an error Uploading Image, Try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->check_single_data($this->driver_table, "driver_name", $driver_name) === true) {
			$this->response = $this->alert->alert_toastr("error", "$driver_name already Exists!, Please try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->check_single_data($this->driver_table, "driver_email", $email) === true) {
			$this->response = $this->alert->alert_toastr("error", "$email already Exists!, Please try again!", __OSO_APP_NAME__ . " Says");
		} else {
			$driver_image = $license_no . uniqid() . "." . $image_ext;
			$file_destination = "../vehicles/" . $driver_image;
			try {
				$created_at = date("Y-m-d");
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("INSERT INTO `{$this->driver_table}` (driver_name,driver_phone,driver_email,driver_address,driver_license_no,driver_image,created_at) VALUES (?,?,?,?,?,?,?);");
				if ($this->stmt->execute(array($driver_name, $phone, $email, $address, $license_no, $driver_image, $created_at))) {
					if ($this->config->move_file_to_folder($photo_temp, $file_destination)) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success", "$driver_name created successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
					}
				} else {
					$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				if (file_exists($file_destination)) {
					unlink($file_destination);
				}
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
		$this->dbh = null;
	}

	public function getAllVehiclesDrivers()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->driver_table}` ORDER BY `driver_name` ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}


	public function getAllVehiclesInDropDown()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->bus_table}` ORDER BY vehicle_desc ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->busId . '">' . $row->vehicle_desc . ' &raquo; ' . $row->vehicle_capacity . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
		$this->dbh = null;
	}

	public function getAllVehiclesDriversInDropDown()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->driver_table}` ORDER BY driver_name ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->dId . '">' . $row->driver_name . ' &raquo; ' . $row->driver_phone . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
		$this->dbh = null;
	}

	public function getAllBusRoutesInDropDown()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->route_table}` ORDER BY route_desc ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->id . '">' . $row->route_desc . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
		$this->dbh = null;
	}

	public function fetchRouteDataById($routeId)
	{
		$this->stmt = $this->dbh->prepare("SELECT rt.*,v.vehicle_desc,d.driver_name,d.dId,v.busId FROM `{$this->route_table}` as rt,`{$this->driver_table}` as d, `{$this->bus_table}` as v WHERE rt.id=? AND rt.vehicleId=v.busId AND rt.driverId=d.dId LIMIT 1");
		$this->stmt->execute([$routeId]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return json_encode($this->response);
			$this->dbh = null;
		}
	}

	public function countDataByTableColumn($table, $field)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`{$field}`) as cnt FROM `{$table}`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getSingleValue($table, $field1, $val1)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$table}` WHERE `{$field1}`=? LIMIT 1");
		$this->stmt->execute([$val1]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return ($this->response);
			$this->dbh = null;
		}
	}

	public function updateBusDriverById($data)
	{
		$auth_pass = $this->config->Clean($data['auth_code']);
		$driver_name = $this->config->Clean($data['dname']);
		$phone = $this->config->Clean($data['dphone']);
		// these tow fields do not need update
		//$email = $this->config->Clean($data['demail']);
		//$license_no = $this->config->Clean($data['dlicense_no']);
		$address = $this->config->Clean($data['daddress']);
		$driverId = $this->config->Clean($data['dhiddenId']);
		if ($this->config->isEmptyStr($driver_name) || $this->config->isEmptyStr($phone) || $this->config->isEmptyStr($driverId) || $this->config->isEmptyStr($address) || $this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("info", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} else {
			//do the update
			try {
				$created_at = date("Y-m-d");
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `{$this->driver_table}` SET driver_name=?,driver_phone=?, driver_address=? WHERE dId=? LIMIT 1");
				if ($this->stmt->execute([$driver_name, $phone, $address, $driverId])) {
					$this->dbh->commit();
					$this->dbh = null;
					$this->response = $this->alert->alert_toastr("success", "$driver_name details Updated Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}

		return $this->response;
	}

	public function deleteBusDriverById($id)
	{
		if (!$this->config->isEmptyStr($this->config->Clean($id))) {
			$details = self::getSingleValue("visap_driver_tbl", "dId", $id);
			if ($details != NULL || $details != "") {
				try {
					// grab the details info
					$imagePath = "../vehicles/" . $details->driver_image;
					//delete driver 
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("DELETE FROM `{$this->driver_table}` WHERE dId=? LIMIT 1");
					if ($this->stmt->execute([$id])) {
						if (file_exists($imagePath)) {
							if (unlink($imagePath)) {
								$this->dbh->commit();
								$this->dbh = null;
								$this->response = $this->alert->alert_toastr("success", "Removed Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
							}
						}
					}
				} catch (Exception $e) {
					$this->dbh->rollback();
					$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
			// code...
		} else {
			$this->response = $this->alert->alert_toastr("info", "Unknown Error Occurred!", __OSO_APP_NAME__ . " Says");
		}
		return ($this->response);
	}

	//delete school bus
	public function deleteSchoolBusById($id)
	{
		if (!$this->config->isEmptyStr($this->config->Clean($id))) {
			$details = self::getSingleValue("visap_bus_tbl", "busId", $id);
			if ($details != NULL || $details != "") {
				try {
					// grab the details info
					$imagePath = "../vehicles/" . $details->vehicle_image;
					//delete driver 
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("DELETE FROM `{$this->bus_table}` WHERE busId=? LIMIT 1");
					if ($this->stmt->execute([$id])) {
						if (file_exists($imagePath)) {
							if (unlink($imagePath)) {
								$this->dbh->commit();
								$this->dbh = null;
								$this->response = $this->alert->alert_toastr("success", "Removed Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
							}
						}
					}
				} catch (Exception $e) {
					$this->dbh->rollback();
					$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
			// code...
		} else {
			$this->response = $this->alert->alert_toastr("info", "Unknown Error Occurred!", __OSO_APP_NAME__ . " Says");
		}
		return ($this->response);
	}

	public function updateSchoolBusById($data)
	{
		$auth_pass = $this->config->Clean($data['auth_code']);
		$busName = $this->config->Clean($data['busName']);
		$busNumber = $this->config->Clean($data['busNumber']);
		$busCapacity = $this->config->Clean($data['busCapacity']);
		$bId = $this->config->Clean($data['bushiddenId']);
		if ($this->config->isEmptyStr($busName) || $this->config->isEmptyStr($busNumber) || $this->config->isEmptyStr($bId) || $this->config->isEmptyStr($busCapacity) || $this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("info", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} else {
			//do the update
			try {
				//$created_at = date("Y-m-d");
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `{$this->bus_table}` SET vehicle_desc=?,vehicle_plate_no=?, vehicle_capacity=? WHERE busId=? LIMIT 1");
				if ($this->stmt->execute([$busName, $busNumber, $busCapacity, $bId])) {
					$this->dbh->commit();
					$this->dbh = null;
					$this->response = $this->alert->alert_toastr("success", "$busName details Updated Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}

		return $this->response;
	}
	public function assign_student_bus_route($data)
	{
	}
	public function update_student_bus_payment($data)
	{
	}
	public function delete_bus_route($data)
	{
	}
	//School Bus management methods end



}