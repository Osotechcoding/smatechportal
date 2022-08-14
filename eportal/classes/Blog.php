<?php
@session_start();
require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";
class Blog {
	private $dbh;
	protected $stmt;
	protected $query;
	protected $response;
	protected $config;
	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}

	public function upload_school_news($data,$file){
		$blogTitle = $this->config->Clean($data['blogTitle']);
		$blogContent = $this->config->Clean($data['blogContent']);
		$blogCat = $this->config->Clean($data['blogCat']);
		$blogstatus = $this->config->Clean($data['blogstatus']);
		$blogTags = isset($data['tags']) ? implode(",", $data['tags']) : 'Educational' ;
		$postedBy = $this->config->Clean($data['postedBy']);
		$auth_code = $this->config->Clean($data['auth_code']);
		$blogFile_temp = $file['blogImage']['tmp_name'];
		$blogFileName = $file['blogImage']['name'];
		$blogFile_size = $file['blogImage']['size']/1024;
		$blogFile_error = $file['blogImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg","jpeg","png");
		 $name_div = explode(".", $blogFileName);
   		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		if ($this->config->isEmptyStr($blogTitle) || $this->config->isEmptyStr($blogCat) || $this->config->isEmptyStr($blogContent) || $this->config->isEmptyStr($postedBy) || $this->config->isEmptyStr($blogstatus) || $this->config->isEmptyStr($blogFileName)) {
			$this->response = $this->alert->alert_toastr("error","Invalid form Submission, Pls try again!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth_code)) {
	$this->response = $this->alert->alert_toastr("error","Authentication Code is Required!",__OSO_APP_NAME__." Says");
		}elseif ($auth_code !== __OSO__CONTROL__KEY__) {
		$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}
		elseif (!in_array($image_ext, $allowed)) {
		$this->response = $this->alert->alert_toastr("error","Your file format is not supported, Please check and try again!",__OSO_APP_NAME__." Says");
		}elseif ($blogFile_size >500) {
		$this->response = $this->alert->alert_toastr("error","Blog Image Size should not exceed 200KB, Selected Image Size is :".number_format($blogFile_size,2)."KB",__OSO_APP_NAME__." Says");
		}elseif ($blogFile_error !==0) {
		 $this->response = $this->alert->alert_toastr("error","There was an error Uploading Blog Image, Try again!",__OSO_APP_NAME__." Says");
		}
		else{
//create image save path
	$newFileName = time().mt_rand().".".$image_ext;
	$file_destination = "../news-images/".$newFileName;
//check if the boldg is already created
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_title=? LIMIT 1");
$this->stmt->execute(array($blogTitle));
if ($this->stmt->rowCount() ==1) {
$this->response = $this->alert->alert_toastr("error","$blogTitle is already Created, Please check and try again!",__OSO_APP_NAME__." Says");
}else{
//create a fresh one
try {
	$blog_time = date("h:i:s");
	$created_at = date("Y-m-d");
    	$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_blog_post_tbl` (category_id,author,blog_title,blog_content,blog_image,blog_status,created_at,blog_time,tags) VALUES (?,?,?,?,?,?,?,?,?);");
    	if ($this->stmt->execute(array($blogCat,$postedBy,$blogTitle,$blogContent,$newFileName,$blogstatus,$created_at,$blog_time,$blogTags))) {
    		if ($this->config->move_file_to_folder($blogFile_temp,$file_destination)) {
    			$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Blog Posted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
    		}
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}

    } catch (PDOException $e) {
    	$this->dbh->rollback();
    	if (file_exists($file_destination)) {
		 unlink($file_destination);
	}
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
    }
}

		}
		return $this->response;
unset($this->dbh);
	}

public function osotech_resize_image($image_resource_id,$width,$height) {
$target_width =200;
$target_height =200;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}

public function get_all_active_blogs_post(){
	$blogStatus = "2";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_status=? ORDER BY created_at DESC");
$this->stmt->execute(array($blogStatus));
if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh);
}
}

public function count_blog_comment_by_blogId($blogId){
	$this->stmt = $this->dbh->prepare("SELECT count(`commentId`) as cnt FROM `visap_blog_post_comments` WHERE blogId=?");
$this->stmt->execute([$blogId]);
if ($this->stmt->rowCount()>0) {
	$rows = $this->stmt->fetch();
	$this->response = $rows->cnt;
	return $this->response;
	unset($this->dbh);
}
}

public function get_all_approved_blog_comments(){
$status = "1";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_comments` WHERE  status=? ORDER BY comment_date DESC");
$this->stmt->execute(array($status));
if ($this->stmt->rowCount()>0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh);
}
}

public function get_blog_ById($Id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_id=? LIMIT 1");
$this->stmt->execute([$Id]);
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
}
}

public function get_all_blog_comments($blogId){
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_comments` WHERE  blogId=? ORDER BY comment_date DESC");
$this->stmt->execute(array($status));
if ($this->stmt->rowCount()> 0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh);
}
}
//count all blogs
public function countAllBlogs(){
	$this->stmt = $this->dbh->prepare("SELECT count(`blog_id`) as cnt FROM `visap_blog_post_tbl` ");
$this->stmt->execute();
if ($this->stmt->rowCount()>0) {
	$row =$this->stmt->fetch();
	$this->response = $row->cnt;
	return $this->response;
	unset($this->dbh);
}
}

//count all blogs
public function countAllBlogsComments(){
	$this->stmt = $this->dbh->prepare("SELECT count(`blogId`) as cnt FROM `visap_blog_post_comments` ");
$this->stmt->execute();
if ($this->stmt->rowCount()>0) {
	$row =$this->stmt->fetch();
	$this->response = $row->cnt;
	return $this->response;
	unset($this->dbh);
}
}

public function CountLatestBlogs(){
	$this->stmt = $this->dbh->prepare("SELECT count(`blog_id`) as cnt FROM `visap_blog_post_tbl` WHERE DATE(`created_at`) >= (DATE(CURRENT_DATE())- INTERVAL 7 DAY)");
$this->stmt->execute();
if ($this->stmt->rowCount()>0) {
	$row =$this->stmt->fetch();
	$this->response = $row->cnt;
	return $this->response;
	unset($this->dbh);
}
}

// EVENT METHODS START
public function upload_upcomingEvents($data,$file){
	$auth_pass = $this->config->Clean($data['auth_code']);
	$desc = $this->config->Clean($data['event_desc']);
		$organizer = $this->config->Clean($data['event_organizer']);
		$eventDate = $this->config->Clean(date("Y-m-d",strtotime($data['event_date'])));
		$status = $this->config->Clean($data['estatus']);
		$eventTime = $this->config->Clean(date("h:i:s a",strtotime($data['event_time'])));
		$venue = $this->config->Clean($data['event_venue']);
		$event_detail = $this->config->Clean($data['event_detail']);
		$postedBy = $this->config->Clean($data['postedBy']);
		$EventFile_temp = $file['EventImage']['tmp_name'];
		$EventFileName = $file['EventImage']['name'];
		$EventFile_size = $file['EventImage']['size']/1024;
		$EventFile_error = $file['EventImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg","jpeg","png");
		 $name_div = explode(".", $EventFileName);
   		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		//
		if ($this->config->isEmptyStr($desc) || $this->config->isEmptyStr($organizer) || $this->config->isEmptyStr($eventDate) || $this->config->isEmptyStr($eventTime) || $this->config->isEmptyStr($event_detail) || $this->config->isEmptyStr($status) || $this->config->isEmptyStr($EventFileName)) {
			$this->response = $this->alert->alert_toastr("error","Invalid form Submission, Pls try again!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Please enter an Authentication code to proceed!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}elseif (!in_array($image_ext, $allowed)) {
		$this->response = $this->alert->alert_toastr("error","Your file format is not supported, Please check and try again!",__OSO_APP_NAME__." Says");
		}elseif ($EventFile_size >200) {
	$this->response = $this->alert->alert_toastr("error","Event Image Size should not exceed 200KB, Selected Image Size is :".number_format($EventFile_size,2)."KB",__OSO_APP_NAME__." Says");
		}elseif ($EventFile_error !==0) {
	 $this->response = $this->alert->alert_toastr("error","There was an error Uploading Event Image, Try again!",__OSO_APP_NAME__." Says");
		}else{
			$newFileName = __OSO_APP_NAME__."_event".uniqid('', true).".".$image_ext;
	$file_destination = "../events-images/".$newFileName;
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_upcoming_event_tbl` WHERE event_title=? LIMIT 1");
	$this->stmt->execute(array($desc));
	if ($this->stmt->rowCount() ==1) {
		$this->response = $this->alert->alert_toastr("error","$desc is already Created, Please check and try again!",__OSO_APP_NAME__." Says");
	}else {
		try {
	$created_at = date("Y-m-d");
    	$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_upcoming_event_tbl` (author,event_title,event_detail,event_image,eorganizer,edate,etime,evenue,status,created_at) VALUES (?,?,?,?,?,?,?,?,?,?);");
    	if ($this->stmt->execute(array($postedBy,$desc,$event_detail,$newFileName,$organizer,$eventDate,$eventTime,$venue,$status,$created_at))) {
    		if ($this->config->move_file_to_folder($EventFile_temp,$file_destination)) {
    			$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Event Uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
    		}
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}

    } catch (PDOException $e) {
    	$this->dbh->rollback();
    	if (file_exists($file_destination)) {
		 unlink($file_destination);
	}
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
    }
	}
		}
 	return $this->response;
	unset($this->dbh);
}

public function get_event_ById($Id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_upcoming_event_tbl` WHERE eventId=? LIMIT 1");
$this->stmt->execute([$Id]);
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
}
}

public function get_all_active_events(){
	$status = "2";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_upcoming_event_tbl` WHERE status=? ORDER BY created_at DESC");
$this->stmt->execute(array($status));
if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh);
}
}

public function count_all_events_by_status(int $status) :int {
	$this->stmt = $this->dbh->prepare("SELECT count(`eventId`) as cnt FROM `visap_upcoming_event_tbl` WHERE status=?");
$this->stmt->execute([$status]);
if ($this->stmt->rowCount()>0) {
	$rows = $this->stmt->fetch();
	$this->response = $rows->cnt;
	return $this->response;
	unset($this->dbh);
}
}

public function count_Upcoming_events(int $status =2) : int{
	$this->stmt = $this->dbh->prepare("SELECT count(`eventId`) as cnt FROM `visap_upcoming_event_tbl` WHERE DATE(`edate`) > DATE(CURRENT_DATE) AND status=?");
$this->stmt->execute([$status]);
if ($this->stmt->rowCount()>0) {
	$rows = $this->stmt->fetch();
	$this->response = $rows->cnt;
	return $this->response;
	unset($this->dbh);
}
}

public function count_today_events(int $status =2) : int{
	$this->stmt = $this->dbh->prepare("SELECT count(`eventId`) as cnt FROM `visap_upcoming_event_tbl` WHERE DATE(`edate`) = DATE(CURRENT_DATE) AND status=?");
$this->stmt->execute([$status]);
if ($this->stmt->rowCount()>0) {
	$rows = $this->stmt->fetch();
	$this->response = $rows->cnt;
	return $this->response;
	unset($this->dbh);
}
}

// EVENT METHODS END

public function createNewGallery($data,$file){
	$auth_pass = $this->config->Clean($data['auth_code']);
	$desc = $this->config->Clean($data['gallery_desc']);
	$galleryType = $this->config->Clean($data['galleryType']);
		$postedBy = $_SESSION['ADMIN_USERNAME'];
		$GalleryFile_temp = $file['galleryImage']['tmp_name'];
		$GalleryFileName = $file['galleryImage']['name'];
		$GalleryFile_size = $file['galleryImage']['size']/1024;
		$GalleryFile_error = $file['galleryImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg","jpeg","png");
		 $name_div = explode(".", $GalleryFileName);
   		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		//
		if ($this->config->isEmptyStr($desc) || $this->config->isEmptyStr($galleryType) || $this->config->isEmptyStr($GalleryFileName)) {
			$this->response = $this->alert->alert_toastr("error","Invalid form Submission, Pls try again!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Please enter an Authentication code to proceed!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}elseif (!in_array($image_ext, $allowed)) {
		$this->response = $this->alert->alert_toastr("error","Your file format is not supported, Please check and try again!",__OSO_APP_NAME__." Says");
		}elseif ($GalleryFile_size >200) {
	$this->response = $this->alert->alert_toastr("error","Gallery Image Size should not exceed 200KB, Selected Image Size is :".number_format($GalleryFile_size,2)."KB",__OSO_APP_NAME__." Says");
		}elseif ($GalleryFile_error !==0) {
	 $this->response = $this->alert->alert_toastr("error","There was an error Uploading Gallery Image, Try again!",__OSO_APP_NAME__." Says");
		}else{
			$newFileName = __OSO_APP_NAME__.$galleryType.uniqid().".".$image_ext;
	$file_destination = "../gallery/".$newFileName;
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_gallery_tbl` WHERE title=? LIMIT 1");
	$this->stmt->execute(array($desc));
	if ($this->stmt->rowCount() ==1) {
		$this->response = $this->alert->alert_toastr("error","$desc is already Created, Please check and try again!",__OSO_APP_NAME__." Says");
	}else {
		try {
	$created_at = date("Y-m-d");
    	$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_gallery_tbl` (author,title,image,type,created_at) VALUES (?,?,?,?,?);");
    	if ($this->stmt->execute(array($postedBy,$desc,$newFileName,$galleryType,$created_at))) {
    		if ($this->config->move_file_to_folder($GalleryFile_temp,$file_destination)) {
    			$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Gallery Uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
    		}
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}

    } catch (PDOException $e) {
    	$this->dbh->rollback();
    	if (file_exists($file_destination)) {
		 unlink($file_destination);
	}
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
    }
	}
		}
 	return $this->response;
	unset($this->dbh);
}

//get gallery images
public function getAllGallery(){
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_gallery_tbl` ORDER BY id DESC");
$this->stmt->execute();
if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh);
}
}
public function countGalleryByType(string $type){
$this->stmt = $this->dbh->prepare("SELECT count(`id`) as cnt FROM `visap_gallery_tbl` WHERE type=?");
$this->stmt->execute([$type]);
if ($this->stmt->rowCount() >0) {
	$cont = $this->stmt->fetch();
	$this->response = $cont->cnt;
	return $this->response;
	unset($this->dbh);
}
}

public function countAllGallery(){
$this->stmt = $this->dbh->prepare("SELECT count(`id`) as cnt FROM `visap_gallery_tbl`");
$this->stmt->execute();
if ($this->stmt->rowCount() >0) {
	$cont = $this->stmt->fetch();
	$this->response = $cont->cnt;
	return $this->response;
	unset($this->dbh);
}
}
public function getGalleryById($Id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_gallery_tbl` WHERE id=? LIMIT 1");
	$this->stmt->execute([$Id]);
	if ($this->stmt->rowCount() == 1) {
	$this->response =$this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
	}
}

public function delete_galleryById($Id){
		if (!$this->config->isEmptyStr($Id)) {
			$gallery_details = self::getGalleryById($Id);
			$filePath = "../gallery/".$gallery_details->image;
			try {
		$this->dbh->beginTransaction();
	//Delete the selected Subject
		$this->stmt = $this->dbh->prepare("DELETE FROM `visap_gallery_tbl` WHERE id=? LIMIT 1");
		if ($this->stmt->execute([$Id])) {
			if (file_exists($filePath)) {
				if (unlink($filePath)) {
				 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Deleted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			}
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = $this->alert->alert_toastr("error","Failed to Delete Gallery: Error: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
		return $this->response;
		unset($this->dbh);
		}

	}


	public function getSliderById($Id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_sliders_tbl` WHERE id=? LIMIT 1");
	$this->stmt->execute([$Id]);
	if ($this->stmt->rowCount() == 1) {
	$this->response =$this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
	}
}

	//delete_SliderById
	public function delete_SliderById($Id){
		if (!$this->config->isEmptyStr($Id)) {
			$slider_details = self::getSliderById($Id);
			$filePath = "../gallery/Sliders/".$slider_details->image;
			try {
		$this->dbh->beginTransaction();
	//Delete the selected Subject
		$this->stmt = $this->dbh->prepare("DELETE FROM `visap_sliders_tbl` WHERE id=? LIMIT 1");
		if ($this->stmt->execute([$Id])) {
			if (file_exists($filePath)) {
				if (unlink($filePath)) {
				 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Deleted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			}
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = $this->alert->alert_toastr("error","Failed to Delete Gallery: Error: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
		return $this->response;
		unset($this->dbh);
		}

	}

	public function createNewSliders($data, $file) {
	$auth_pass = $this->config->Clean($data['auth_code']);
	$slider_desc = $this->config->Clean($data['slider_desc']);
	$slider_title = $this->config->Clean($data['slider_title']);
		$SliderFile_temp = $file['sliderImage']['tmp_name'];
		$SliderFileName = $file['sliderImage']['name'];
		$SliderFile_size = $file['sliderImage']['size']/1024;
		$SliderFile_error = $file['sliderImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg","jpeg","png");
		 $name_div = explode(".", $SliderFileName);
   		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		//
		if ($this->config->isEmptyStr($slider_title) || $this->config->isEmptyStr($slider_desc) || $this->config->isEmptyStr($SliderFileName)) {
			$this->response = $this->alert->alert_toastr("error","Invalid form Submission, Pls try again!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Please enter an Authentication code to proceed!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}elseif (!in_array($image_ext, $allowed)) {
		$this->response = $this->alert->alert_toastr("error","Your file format is not supported, Please check and try again!",__OSO_APP_NAME__." Says");
		}elseif ($SliderFile_size > 200) {
	$this->response = $this->alert->alert_toastr("error","Slider Image Size should not exceed 200KB, Selected Image Size is :".number_format($SliderFile_size,2)."KB",__OSO_APP_NAME__." Says");
		}elseif ($SliderFile_error !==0) {
	 $this->response = $this->alert->alert_toastr("error","There was an error Uploading Slider Image, Try again!",__OSO_APP_NAME__." Says");
		}else{
			$newFileName = __OSO_APP_NAME__."_".uniqid()."_.".$image_ext;
	$file_destination = "../gallery/Sliders/".$newFileName;
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_sliders_tbl` WHERE title=? LIMIT 1");
	$this->stmt->execute(array($slider_title));
	if ($this->stmt->rowCount() ==1) {
		$this->response = $this->alert->alert_toastr("error","$slider_title is already Created, Please check and try again!",__OSO_APP_NAME__." Says");
	}else {
		try {
	$created_at = date("Y-m-d");
    	$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_sliders_tbl` (title,slider_desc,image,created_at) VALUES (?,?,?,?);");
    	if ($this->stmt->execute(array($slider_title,$slider_desc,$newFileName,$created_at))) {
    		if ($this->config->move_file_to_folder($SliderFile_temp,$file_destination)) {
    			$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Slider Uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
    		}
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}

    } catch (PDOException $e) {
    	$this->dbh->rollback();
    	if (file_exists($file_destination)) {
		 unlink($file_destination);
	}
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
    }
	}
		}
 	return $this->response;
	unset($this->dbh);
	}

	public function getAllSliders(){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_sliders_tbl` ORDER BY id DESC");
	$this->stmt->execute();
	if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh);
}
	}

	//create what the people says

	public function createWhatPeopleSays($data,$file){
		$auth_pass = $this->config->Clean($data['auth_code']);
		$fullname = $this->config->Clean($data['testimonial_name']);
		$message = $this->config->Clean($data['content']);
		$occupation = $this->config->Clean($data['occupation']);
		$photo_temp = $file['tImage']['tmp_name'];
		$photoName = $file['tImage']['name'];
		$photo_size = $file['tImage']['size']/1024;
		$photo_error = $file['tImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg","jpeg","png");
		 $name_div = explode(".", $photoName);
   		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		if ($this->config->isEmptyStr($fullname) || $this->config->isEmptyStr($occupation) || $this->config->isEmptyStr($message) || $this->config->isEmptyStr($photoName)) {
			$this->response = $this->alert->alert_toastr("error","Invalid Submission, Please try again!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Please enter an Authentication code to proceed!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}elseif (!in_array($image_ext, $allowed)) {
		$this->response = $this->alert->alert_toastr("error","Passport format is not supported!",__OSO_APP_NAME__." Says");
		}elseif ($photo_size >50) {
	$this->response = $this->alert->alert_toastr("error","Photo Size should not exceed 50KB, Selected Image Size is :".number_format($photo_size,2)."KB",__OSO_APP_NAME__." Says");
		}elseif ($photo_error !==0) {
	 $this->response = $this->alert->alert_toastr("error","There was an error Uploading Gallery Image, Try again!",__OSO_APP_NAME__." Says");
		}else{
			$newFileName = __OSO_APP_NAME__.'_testi_'.uniqid().".".$image_ext;
	$file_destination = "../testimonials/".$newFileName;
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_people_say_tbl` WHERE fullname=? LIMIT 1");
	$this->stmt->execute(array($fullname));
	if ($this->stmt->rowCount() ==1) {
		$this->response = $this->alert->alert_toastr("error","$fullname is already Created, Please check and try again!",__OSO_APP_NAME__." Says");
	}else {
		try {
	$created_at = date("Y-m-d");
    	$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_people_say_tbl` (fullname,message,image,job,created_at) VALUES (?,?,?,?,?);");
    	if ($this->stmt->execute(array($fullname,$message,$newFileName,$occupation,$created_at))) {
    		if ($this->config->move_file_to_folder($photo_temp,$file_destination)) {
    			$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Testimonial Uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
    		}
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}

    } catch (PDOException $e) {
    	$this->dbh->rollback();
    	if (file_exists($file_destination)) {
		 unlink($file_destination);
	}
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
    }
	}
		}
 	return $this->response;
	unset($this->dbh);
	}


	public function getAllTestimonials(){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_people_say_tbl` ORDER BY id DESC");
	$this->stmt->execute();
	if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh);
}
	}

public function getTestimonialById($Id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_people_say_tbl` WHERE id=? LIMIT 1");
	$this->stmt->execute([$Id]);
	if ($this->stmt->rowCount() == 1) {
	$this->response =$this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
	}
}

	//delete Testimonial by id
	public function deleteTestimonialById($testiId){
		if (!$this->config->isEmptyStr($testiId)) {
			$testimonials_details = self::getTestimonialById($testiId);
			$filePath = "../testimonials/".$testimonials_details->image;
			try {
		$this->dbh->beginTransaction();
	//Delete the selected Subject
		$this->stmt = $this->dbh->prepare("DELETE FROM `visap_people_say_tbl` WHERE id=? LIMIT 1");
		if ($this->stmt->execute([$testiId])) {
			if (file_exists($filePath)) {
				if (unlink($filePath)) {
				 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Deleted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			}
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = $this->alert->alert_toastr("error","Failed to Delete: Error: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
		return $this->response;
		unset($this->dbh);
		}
	}


}
