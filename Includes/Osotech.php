<?php
require_once 'Database.php';
require_once 'OsotechMailer.php';
class Osotech
{
    protected $response;
    private $dbh;
    protected $alert;
    protected $stmt;
    //for smtp details
    public function __construct()
    {
        if (substr($_SERVER['REQUEST_URI'], -4) == ".php" or (stripos($_SERVER['REQUEST_URI'], ".php") == true)) {
            self::redirect_root("error");
        }
        //$Database = new Database();
        $this->dbh = osotech_connect();
    }
    public function osotech_session_kick()
    {
        return @session_start();
    }

    public function redirect_root($flink)
    {
        @header("Location: " . APP_ROOT . $flink);
        exit();
    }

    function saltifyID($string)
    {
        return urlencode(base64_encode($string));
    }

    function unsaltifyID($string)
    {
        return base64_decode(urldecode($string));
    }

    public function alert_msg($alert_type = "warning", $alert_title = "", $alert_msg = "")
    {
        $this->response = '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert">
             <strong>' . $alert_title . '!</strong> ' . $alert_msg . '
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
        return $this->response;
    }

    public function get_classroom_InDropDown_list()
    {
        $this->response = "";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeDesc ASC LIMIT 30");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            while ($row = $this->stmt->fetch()) {
                $this->response .= '<option value="' . $row->gradeDesc . ' ' . $row->grade_division . '">' . $row->gradeDesc . ' ' . $row->grade_division . '</option>';
            }
        } else {
            $this->response = false;
        }
        return $this->response;
    }

    //fetch all session list
    public function get_all_session_lists()
    {
        $this->response = "";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_session_list` ORDER BY session_desc ASC LIMIT 30");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            while ($row = $this->stmt->fetch()) {
                $this->response .= '<option value="' . $row->session_desc . '">' . $row->session_desc . '</option>';
                return $this->response;
                $this->dbh = null;
            }
        }
    }

    public function check_single_data($table, $field, $field_val)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM {$table} WHERE {$field}=? LIMIT 1");
        $this->stmt->execute(array($field_val));
        if ($this->stmt->rowCount() == 1) {
            $this->response = true;
            return $this->response;
            $this->dbh = null;
        }
    }

    public function isEmptyStr($str)
    {
        return ($str === "" || empty($str)) ? true : false;
    }

    public function is_Valid_Email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->response = true;
        } else {
            $this->response = false;
        }
        return $this->response;
    }

    //GET RESULT DATA
    /*  public function get_session_result_details($resultmi){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE reportId=?");
        $this->stmt->execute(array($resultmi));
        if ($this->stmt->rowCount()>0) {
        $this->response = $this->stmt->fetchAll();
        return $this->response;
         $this->dbh = null;
        }
        }*/

    public function get_student_data_byId($stdId)
    {
        $this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM `visap_student_tbl` WHERE stdId=? LIMIT 1");
        $this->stmt->execute(array($stdId));
        if ($this->stmt->rowCount() == 1) {
            $this->response = $this->stmt->fetch();
            return $this->response;
            $this->dbh = null;
        }
    }

    //STUDENT DATA BY REGNO
    public function get_student_details_byRegNo($stdRegNo)
    {
        $this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM `visap_student_tbl` WHERE stdRegNo=? LIMIT 1");
        $this->stmt->execute(array($stdRegNo));
        if ($this->stmt->rowCount() == 1) {
            $this->response = $this->stmt->fetch();
            return $this->response;
            $this->dbh = null;
        }
    }

    //GET SCHOOL Ssession info
    public function get_school_session_info()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_tbl` LIMIT 1");
        $this->stmt->execute();
        if ($this->stmt->rowCount() == 1) {
            $this->response = $this->stmt->fetch();
            return $this->response;
            $this->dbh = null;
        }
    }
    //Validate a date input
    public function isValid_Date($date, $format = 'Y-m-d')
    {
        $dt = DateTime::createFromFormat($format, $date);
        return $dt && $dt->format($format) === $date;
    }

    public function check_user_activity_allowed($module)
    {
        $status = '1';
        $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module=? AND status=? LIMIT 1");
        $this->stmt->execute(array($module, $status));
        if ($this->stmt->rowCount() == 1) {
            $this->response = true;
            return $this->response;
            $this->dbh = null;
        }
    }

    public function check_portal_status()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module='maintenance_mode' AND status='2' LIMIT 1");
        $this->stmt->execute();
        if ($this->stmt->rowCount() == 1) {
            $this->response = true;
            return $this->response;
            $this->dbh = null;
        }
    }

    //
    public function Clean($string)
    {
        if (!empty($string)) {
            $string = trim($string);
            $string = htmlspecialchars($string);
            $string = stripcslashes($string);

            return $string;
        }
    }

    public function get_all_active_blogs_post()
    {
        // $blogStatus = "2";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_status=2 ORDER BY created_at DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function show_all_recent_active_blogs_post()
    {
        $blogStatus = "2";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_status=? ORDER BY created_at DESC LIMIT 3");
        $this->stmt->execute(array($blogStatus));
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function get_blog_ById($Id)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_id=? LIMIT 1");
        $this->stmt->execute([$Id]);
        if ($this->stmt->rowCount() == 1) {
            $this->response = $this->stmt->fetch();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function get_all_approved_blog_comments($blogId)
    {
        $status = "1";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_comments` WHERE blogId=? AND status=? ORDER BY comment_date DESC");
        $this->stmt->execute(array($blogId, $status));
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function count_approved_blog_comments($blogId)
    {
        $status = "1";
        $this->stmt = $this->dbh->prepare("SELECT count(commentId) as cnt FROM `visap_blog_post_comments` WHERE blogId=? AND status=?");
        $this->stmt->execute(array($status, $blogId));
        if ($this->stmt->rowCount() > 0) {
            $rows = $this->stmt->fetch();
            $this->response = $rows->cnt;
            return $this->response;
            $this->dbh = null;
        }
    }

    public function get_all_related_blog_post($category)
    {

        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE category_id=? ORDER BY created_at DESC");
        $this->stmt->execute(array($category));
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function getConfigData()
    {
        $query = "SELECT * FROM `visap_school_profile` WHERE id=1";
        $this->stmt = $this->dbh->prepare($query);
        $this->response = $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            // code...
            $this->response = $this->stmt->fetch();
            return $this->response;
        }
    }

    public function get_schoolLogoImage()
    {
        $schoolDatas = self::getConfigData();
        //school real logo
        $schoolLogo = $schoolDatas->school_logo;
        if ($schoolLogo == NULL || $schoolLogo == "") {
            $ourLogo = APP_ROOT . "eportal/schoolImages/Logo/smatech.png";
        } else {
            $ourLogo = APP_ROOT . "eportal/schoolImages/Logo/" . $schoolLogo;
        }
        $this->response = $ourLogo;
        return $this->response;
    }

    public function checkAdmissionPortalStatus(): bool
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` WHERE status = 1 LIMIT 1");
        $this->stmt->execute();
        $this->response = $this->stmt->rowCount();
        return ($this->response == 1) ? true : false;
    }

    public function GalleryByType(string $type)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_gallery_tbl` WHERE type=? ORDER BY id DESC");
        $this->stmt->execute([$type]);
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function getGalleryImages()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_gallery_tbl` ORDER BY id DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function getAllSliders()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_sliders_tbl` ORDER BY id DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function get_event_ById($Id)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_upcoming_event_tbl` WHERE eventId=? LIMIT 1");
        $this->stmt->execute([$Id]);
        if ($this->stmt->rowCount() == 1) {
            $this->response = $this->stmt->fetch();
            return $this->response;
            $this->dbh = null;
        }
    }
    //AND DATE(`created_at`) >= DATE(CURRENT_DATE())
    public function get_all_active_events()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_upcoming_event_tbl` WHERE `status`=2  ORDER BY eventId DESC LIMIT 3");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function getAllTestimonials()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_people_say_tbl` ORDER BY id DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function checkResultReleasedPortalStatus()
    {
        return false;
    }

    public function get_all_prefect_list()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_prefect_tbl` WHERE activeness='1' ORDER BY school_session DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function get_all_staff()
    {
        $this->stmt = $this->dbh->prepare("SELECT *,concat(`firstName`,' ',`lastName`) as full_name FROM `visap_staff_tbl` ORDER BY appliedDate DESC");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $this->response = $this->stmt->fetchAll();
            return $this->response;
            $this->dbh = null;
        }
    }

    public function get_staff_ById($staffId)
    {
        $this->stmt = $this->dbh->prepare("SELECT *,concat(`firstName`,' ',`lastName`) as full_name FROM `visap_staff_tbl` WHERE staffId=? LIMIT 1");
        $this->stmt->execute([$staffId]);
        if ($this->stmt->rowCount() == 1) {
            $this->response = $this->stmt->fetch();
            return $this->response;
            $this->dbh = null;
        }
    }

    //send feedback message on contact Us Page
    public function sendFeedBackMessage($data)
    {
        $name = self::Clean($data['feedback_name']);
        $email = self::Clean($data['feedback_email']);
        $phone = self::Clean($data['feedback_phone']);
        $message = self::Clean($data['feedback_message']);
        $ip = $_SERVER['REMOTE_ADDR'];
        //check for empty fields
        if (self::isEmptyStr($name) || self::isEmptyStr($email) || self::isEmptyStr($message)) {
            $this->response = self::alert_msg("danger", "WARNING", "Please fill in all the required fileds!");
        } elseif (!self::is_Valid_Email($email)) {
            $this->response = self::alert_msg("danger", "WARNING", "Please enter a valid email address!");
        } elseif (self::check_single_data('visap_feedback_tbl', "client_email", $email)) {
            $this->response = self::alert_msg("danger", "WARNING", "$email is already taken!");
        } else {
            //insert into db
            try {
                $this->dbh->beginTransaction();
                $date = date("Y-m-d");
                $this->stmt = $this->dbh->prepare("INSERT INTO `visap_feedback_tbl` (client_name,client_email,client_phone,message,client_ip_address,created_at) VALUES (?,?,?,?,?,?);");
                if ($this->stmt->execute(array($name, $email, $phone, $message, $ip, $date))) {
                    $OsotechMailer = new OsotechMailer();
                    if ($OsotechMailer->SendClientFeedBackEmail($email, $name, $message) === true) {
                        $this->dbh->commit();
                        $this->response = self::alert_msg("success", "SUCCESS", "Your message has been received, we shall get back to you within 24 hrs, Your feedback really mean alot to Us @ <strong>" . self::getConfigData()->school_name . "!</strong>") . '<script>setTimeout(()=>{location.reload();},10000); </script>';
                    } else {
                        //ictzoneone@gmail.com
                        $this->response = self::alert_msg("danger", "WARNING", "Message could not be sent. Mailer Error!");
                    }
                }
            } catch (PDOException $e) {
                $this->dbh->rollback();
                $this->response = self::alert_msg("danger", "ERROR", "Internal Error Occured:" . $e->getMessage());
            }
        }
        return $this->response;
        $this->dbh = NULL;
    }

    public function move_file_to_folder($filename, $destination): bool
    {
        $this->response = move_uploaded_file($filename, $destination) ? true : false;
        return $this->response;
    }

    //submit staff application form
    public function submitStaffResumeApplicationForm($data, $file)
    {
        $fullname = self::Clean($data['applicant_name']);
        $email = self::Clean($data['email']);
        $phone = self::Clean($data['phone']);
        $job_desc = self::Clean($data['job_type']);
        $coverLetter = self::Clean($data['coverLetter']);
        $resume_temp = $file['resume']['tmp_name'];
        $FileName = $file['resume']['name'];
        $File_size = $file['resume']['size'] / 1024;
        $File_error = $file['resume']['error'];
        //$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
        $allowed = array("pdf");
        $name_div = explode(".", $FileName);
        $image_ext = strtolower(end($name_div));
        //CHECK FOR EMPTY FIELDS
        if (self::isEmptyStr($fullname) || self::isEmptyStr($email) || self::isEmptyStr($phone) || self::isEmptyStr($FileName) || self::isEmptyStr($job_desc) || self::isEmptyStr($coverLetter)) {
            $this->response = self::alert_msg("danger", "WARNING", "Invalid submission, all input fileds are required!");
        } elseif (!self::is_Valid_Email($email)) {
            $this->response = self::alert_msg("danger", "WARNING", "$email is not a valid e-mail address, Please check and try again!");
        } elseif (!in_array($image_ext, $allowed)) {
            $this->response = self::alert_msg("danger", "WARNING", "Your file format is not supported, Only PDF is allowed!");
        } elseif ($File_size > 1000) {
            $this->response = self::alert_msg("danger", "WARNING", "Your Resume Size should not exceed 1MB, Selected File Size is :" . number_format($File_size, 2) . "KB");
        } elseif ($File_error !== 0) {
            $this->response = self::alert_msg("danger", "WARNING", "There was an error Uploading Resume, Please try again!");
        } else {
            $newFileName = $email . "_resume_" . uniqid() . "." . $image_ext;
            $file_destination = "../eportal/resume/" . $newFileName;
            $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_career_portal_tbl` WHERE applicant_email=? LIMIT 1");
            $this->stmt->execute(array($email));
            if ($this->stmt->rowCount() == 1) {
                $this->response = self::alert_msg("danger", "WARNING", "$email is already taken, Please check and try again!");
            } else {
                try {
                    $created_at = date("Y-m-d");
                    $time = date("h:i:s", strtotime(time()));
                    $this->dbh->beginTransaction();
                    $this->stmt = $this->dbh->prepare("INSERT INTO `visap_career_portal_tbl` (applicant_name,applicant_email,phone_number,cover_letter,jobType,uploaded_cv,application_date,application_time) VALUES (?,?,?,?,?,?,?,?);");
                    if ($this->stmt->execute(array($fullname, $email, $phone, $coverLetter, $job_desc, $newFileName, $created_at, $time))) {
                        if (self::move_file_to_folder($resume_temp, $file_destination)) {
                            $this->dbh->commit();
                            $this->dbh = null;
                            $this->response = self::alert_msg("success", "SUCCESS", "Your application has been submitted Successfully, We shall get back to you via <strong> $email </strong>,Thanks!") . "<script>setTimeout(()=>{
                            window.location.reload();
                        },10000);</script>";
                        }
                    }
                } catch (PDOException $e) {
                    $this->dbh->rollback();
                    if (file_exists($file_destination)) {
                        unlink($file_destination);
                    }
                    $this->response = self::alert_msg("danger", "ERROR", "Internal Error:" . $e->getMessage());
                }
            }
        }
        return $this->response;
    }

    public function getAppSocialLinks()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_social_link_tbl` WHERE id=1 LIMIT 1");
        $this->stmt->execute();
        if ($this->stmt->rowCount() == 1) {
            $rows = $this->stmt->fetch();
            $this->response = $rows;
            return $this->response;
            $this->dbh = null;
        }
    }

    //show total number of teacher, students, subjects, and classrooms
    //total staff
    public function getTotalStaff()
    {
        $this->stmt = $this->dbh->prepare("SELECT count(`staffId`) as total FROM `visap_staff_tbl` ");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $rows = $this->stmt->fetch();
            $this->response = $rows->total;
            return $this->response;
            $this->dbh = null;
        }
    }

    //total student
    public function getTotalStudent()
    {
        $this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as total FROM `visap_student_tbl` ");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $rows = $this->stmt->fetch();
            $this->response = $rows->total;
            return $this->response;
            $this->dbh = null;
        }
    }

    //total classroom
    public function getTotalClassroom()
    {
        $this->stmt = $this->dbh->prepare("SELECT count(`gradeId`) as total FROM `visap_class_grade_tbl` ");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $rows = $this->stmt->fetch();
            $this->response = $rows->total;
            return $this->response;
            $this->dbh = null;
        }
    }

    //total classroom
    public function getTotalSubjects()
    {
        $this->stmt = $this->dbh->prepare("SELECT count(`subject_id`) as total FROM `school_subjects` ");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            $rows = $this->stmt->fetch();
            $this->response = $rows->total;
            return $this->response;
            $this->dbh = null;
        }
    }

    //submit blog comment method
    public function submitClientBlogComment($data)
    {
        $name = self::Clean($data['commenter_name']);
        $email = self::Clean($data['commenter_email']);
        $comment = self::Clean($data['comment_msg']);
        $blog_id = self::Clean($data['blogId']);
        //$created_at = date("Y-m-d H:i:s");
        //CHECK FOR EMPTY FIELDS
        if (self::isEmptyStr($name) || self::isEmptyStr($email) || self::isEmptyStr($comment) || self::isEmptyStr($blog_id)) {
            $this->response = self::alert_msg("danger", "WARNING", "Invalid submission, all fileds are required!");
        } elseif (!self::is_Valid_Email($email)) {
            $this->response = self::alert_msg("danger", "WARNING", "<strong> $email</strong> is not a valid  e-mail address, Please try again!");
        } elseif (self::check_single_data("visap_blog_post_comments", "user_email", $email)) {
            $this->response = self::alert_msg("danger", "WARNING", "$email is already taken!");
        } else {
            try {
                $this->dbh->beginTransaction();
                $this->stmt = $this->dbh->prepare("INSERT INTO `visap_blog_post_comments` (blogId,guestName,user_email,comment) VALUES (?,?,?,?);");
                if ($this->stmt->execute(array($blog_id, $name, $email, $comment))) {
                    $this->dbh->commit();
                    $this->dbh = null;
                    $this->response = self::alert_msg("success", "SUCCESS", "Your comment has been submitted for approval<strong> Thanks!</strong>") . "<script>setTimeout(()=>{
                            window.location.reload();
                        },6000);</script>";
                }
            } catch (PDOException $e) {
                $this->dbh->rollback();
                $this->response = self::alert_msg("danger", "ERROR", "Internal Error:" . $e->getMessage());
            }
        }
        return $this->response;
    }

    public function countBlogComments($blogId, string $status)
    {
        switch ($status) {
            case '1':
                $status = 1;
                break;
            default:
                $status = 0;
                break;
        }
        $this->stmt = $this->dbh->prepare("SELECT count(`commentId`) as cnt FROM `visap_blog_post_comments` WHERE blogId=? AND status=?");
        $this->stmt->execute([$blogId, $status]);
        if ($this->stmt->rowCount() > 0) {
            $rows = $this->stmt->fetch();
            $this->response = $rows->cnt;
            return $this->response;
            $this->dbh = null;
        }
    }
}
$Osotech = new Osotech();