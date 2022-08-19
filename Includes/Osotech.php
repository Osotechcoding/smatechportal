<?php
      //@ob_start();
        require_once 'Database.php';
        class Osotech extends Database
        {
        protected $response;
        private $dbh;
        protected $alert;
        protected $stmt;
        public function __construct(){
        if (substr($_SERVER['REQUEST_URI'], -4) == ".php" or (stripos($_SERVER['REQUEST_URI'], ".php")== true)) {
        self::redirect_root("error");
        }
        //$Database = new Database();
        $this->dbh = self::osotech_connect();
        }
        public function osotech_session_kick(){
        return @session_start();
        }

        public function redirect_root($flink){
        header("Location: ".APP_ROOT.$flink);
        exit();
        }

        function saltifyID($string){
        return urlencode(base64_encode($string));
        }

        function unsaltifyID($string){
        return base64_decode(urldecode($string));
        }

        public function alert_msg($alert_type="warning", $alert_title="",$alert_msg=""){
           $this->response ='<div class="alert alert-'.$alert_type.' alert-dismissible fade show" role="alert">
             <strong>'.$alert_title.'!</strong> '.$alert_msg.'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           return $this->response;
           }

        public function get_classroom_InDropDown_list(){
        $this->response ="";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeDesc ASC LIMIT 30");
        $this->stmt->execute();
        if ($this->stmt->rowCount()>0) {
        while ($row = $this->stmt->fetch()) {
        $this->response.='<option value="'.$row->gradeDesc.' '.$row->grade_division.'">'.$row->gradeDesc.' '.$row->grade_division.'</option>';
        }
        }else{
        $this->response = false;
        }
        return $this->response;
        }

        //fetch all session list
        public function get_all_session_lists(){
        $this->response ="";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_session_list` ORDER BY session_desc ASC LIMIT 30");
        $this->stmt->execute();
        if ($this->stmt->rowCount()>0) {
        while ($row = $this->stmt->fetch()) {
        $this->response.='<option value="'.$row->session_desc.'">'.$row->session_desc.'</option>';
        return $this->response;
        unset($this->dbh);
        }
        }

        }

        public function check_single_data($table,$field,$field_val){
        $this->stmt=$this->dbh->prepare("SELECT * FROM {$table} WHERE {$field}=? LIMIT 1");
        $this->stmt->execute(array($field_val));
        if ($this->stmt->rowCount()==1) {
        $this->response = true;
        return $this->response;
        unset($this->dbh);
        }
        }
        public function isEmptyStr($str){
        return ($str === "" || empty($str))? true : false;
        }
        public function is_Valid_Email($email){
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $this->response = true;
        }else{
        $this->response = false;
        }
        return $this->response;
        }

        //GET RESULT DATA
        public function get_session_result_details($resultmi){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE reportId=?");
        $this->stmt->execute(array($resultmi));
        if ($this->stmt->rowCount()>0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
        unset($this->dbh);
        }
        }

        //STUDENT DATA BY REGNO
        public function get_student_details_byRegNo($stdRegNo){
        $this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM `visap_student_tbl` WHERE stdRegNo=? LIMIT 1");
        $this->stmt->execute(array($stdRegNo));
        if ($this->stmt->rowCount()==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }

        //GET SCHOOL Ssession info
        public function get_school_session_info(){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_tbl` LIMIT 1");
        $this->stmt->execute();
        if ($this->stmt->rowCount()==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }
        //Validate a date input
        public function isValid_Date($date, $format = 'Y-m-d'){
        $dt = DateTime::createFromFormat($format, $date);
        return $dt && $dt->format($format) === $date;
        }

        public function check_user_activity_allowed($module){
        $status ='1';
        $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module=? AND status=? LIMIT 1");
        $this->stmt->execute(array($module,$status));
        if ($this->stmt->rowCount()==1) {
        $this->response = true;
        return $this->response;
        unset($this->dbh);
        }
        }

        public function check_portal_status(){
        $status ='1';
        $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module='maintenance_mode' AND status='2' LIMIT 1");
        $this->stmt->execute();
        if ($this->stmt->rowCount()==1) {
        $this->response = true;
        return $this->response;
        unset($this->dbh);
        }
        }

        //
        public function Clean($string) {
        if (!empty($string)) {
        $string = trim($string);
        // $string = htmlspecialchars($string);
        $string = stripcslashes($string);
        $string = filter_var($string,FILTER_SANITIZE_STRING);
        return $string;
        }
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

        public function show_all_recent_active_blogs_post(){
        $blogStatus = "2";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_status=? ORDER BY created_at DESC LIMIT 3");
        $this->stmt->execute(array($blogStatus));
        if ($this->stmt->rowCount() >0) {
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

        public function get_all_approved_blog_comments($blogId){
        $status = "1";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_comments` WHERE blogId=? AND status=? ORDER BY comment_date DESC");
        $this->stmt->execute(array($status,$blogId));
        if ($this->stmt->rowCount()>0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function count_approved_blog_comments($blogId){
        $status = "1";
        $this->stmt = $this->dbh->prepare("SELECT count(commentId) as cnt FROM `visap_blog_post_comments` WHERE blogId=? AND status=?");
        $this->stmt->execute(array($status,$blogId));
        if ($this->stmt->rowCount()>0) {
        $rows = $this->stmt->fetch();
        $this->response = $rows->cnt;
        return $this->response;
        unset($this->dbh);
        }
        }

        public function get_all_related_blog_post($category){
        $status = "1";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE category_id=? AND blog_status=? ORDER BY created_at DESC");
        $this->stmt->execute(array($status,$category));
        if ($this->stmt->rowCount()>0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function getConfigData(){
        $this->query ="SELECT * FROM `visap_school_profile` WHERE id=1";
        $this->stmt =$this->dbh->prepare($this->query);
        $this->response =$this->stmt->execute();
        if ($this->stmt->rowCount()>0) {
        // code...
        $this->response = $this->stmt->fetch();
        return $this->response;
        }
        }

        public function get_schoolLogoImage(){
        $schoolDatas = self::getConfigData();
        //school real logo
        $schoolLogo = $schoolDatas->school_logo;
        if ($schoolLogo == NULL || $schoolLogo =="") {
        $ourLogo = APP_ROOT."eportal/schoolImages/Logo/smatech.png";
        }else{
        $ourLogo = APP_ROOT."eportal/schoolImages/Logo/".$schoolLogo;
        }
        $this->response = $ourLogo;
        return $this->response;
        }

        public function checkAdmissionPortalStatus(): bool{
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` WHERE status = 1 LIMIT 1");
        $this->stmt->execute();
        $this->response = $this->stmt->rowCount();
        return ($this->response == 1) ? true : false;
        }

        public function GalleryByType(string $type){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_gallery_tbl` WHERE type=? ORDER BY id DESC");
        $this->stmt->execute([$type]);
        if ($this->stmt->rowCount() > 0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function getGalleryImages(){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_gallery_tbl` ORDER BY id DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function getAllSliders(){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_sliders_tbl` ORDER BY id DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
        unset($this->dbh);
        }
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

        public function getAllTestimonials(){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_people_say_tbl` ORDER BY id DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() >0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function checkResultReleasedPortalStatus(){
            return false;
        }

        }
        $Osotech = new Osotech();
