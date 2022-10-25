<?php
class Students
{
    // Connection
    private $conn;
    protected $response;
    protected $stmt;
    // Table
    private $db_table = "visap_student_tbl";
    // Columns
    public $stdId;
    public $stdSurName;
    public $stdFirstName;
    public $stdMiddleName;
    public $stdEmail;
    public $stdDob;
    public $studentClass;
    public $stdGender;
    public $stdRegNo;
    public $stdApplyDate;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getAllStudents()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $this->stmt = $this->conn->prepare($sqlQuery);
        $this->stmt->execute();
        return $this->stmt;
    }

    // CREATE
    public function createStudent()
    {
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "
                        (
            stdRegNo,
             stdEmail,
             studentClass,
             stdSurName,
             stdFirstName,
             stdMiddleName,
           stdDob,
          stdGender,
          stdPhone,
         stdApplyDate) VALUES(:stdRegNo,
             :stdEmail,
             :studentClass,
             :stdSurName,
             :stdFirstName,
             :stdMiddleName,
           :stdDob,
          :stdGender,
          :stdPhone,
         :stdApplyDate); 
                    ";
        $this->stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->sdtRegNo = $this->generate_admission_number(date("Y", strtotime($this->stdApplyDate)));
        $this->stdSurName = htmlspecialchars(strip_tags($this->stdSurName));
        $this->stdFirstName = htmlspecialchars(strip_tags($this->stdFirstName));
        $this->stdMiddleName = htmlspecialchars(strip_tags($this->stdMiddleName));
        $this->studentClass = htmlspecialchars(strip_tags($this->studentClass));
        $this->stdDob = htmlspecialchars(strip_tags($this->stdDob));
        $this->stdGender = htmlspecialchars(strip_tags($this->stdGender));
        $this->stdPhone = htmlspecialchars(strip_tags($this->stdPhone));
        $this->stdEmail = htmlspecialchars(strip_tags($this->stdEmail));
        $this->stdApplyDate = htmlspecialchars(strip_tags(date("Y-m-d", strtotime($this->stdApplyDate))));

        // bind data
        $this->stmt->bindParam(":stdRegNo", $this->stdRegNo);
        $this->stmt->bindParam(":stdEmail", $this->stdEmail);
        $this->stmt->bindParam(":studentClass", $this->studentClass);
        $this->stmt->bindParam(":stdSurName", $this->stdSurName);
        $this->stmt->bindParam(":stdFirstName", $this->stdFirstName);
        $this->stmt->bindParam(":stdMiddleName", $this->stdMiddleName);
        $this->stmt->bindParam(":stdDob", $this->stdDob);
        $this->stmt->bindParam(":stdGender", $this->stdGender);
        $this->stmt->bindParam(":stdPhone", $this->stdPhone);
        $this->stmt->bindParam(":stdApplyDate", $this->stdApplyDate);

        if ($this->stmt->execute()) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function getSingleStudent()
    {
        $sqlQuery = "SELECT
                        *
                      FROM
                        " . $this->db_table . "
                    WHERE 
                       stdId = ?
                    LIMIT 0,1";

        $this->stmt = $this->conn->prepare($sqlQuery);

        $this->stmt->bindParam(1, $this->id);

        $this->stmt->execute();

        $dataRow = $this->stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];
        $this->age = $dataRow['age'];
        $this->designation = $dataRow['designation'];
        $this->created = $dataRow['created'];
    }

    // UPDATE
    public function updateStudent()
    {
        $sqlQuery = "UPDATE
                        " . $this->db_table . "
                    SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created
                    WHERE 
                        id = :id";

        $this->stmt = $this->conn->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->designation = htmlspecialchars(strip_tags($this->designation));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind data
        $this->stmt->bindParam(":name", $this->name);
        $this->stmt->bindParam(":email", $this->email);
        $this->stmt->bindParam(":age", $this->age);
        $this->stmt->bindParam(":designation", $this->designation);
        $this->stmt->bindParam(":created", $this->created);
        $this->stmt->bindParam(":id", $this->id);

        if ($this->stmt->execute()) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteStudent()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE stdId = ?";
        $this->stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $this->stmt->bindParam(1, $this->id);

        if ($this->stmt->execute()) {
            return true;
        }
        return false;
    }

    public function generate_admission_number($ady)
    {
        $this->response = "";
        $schoolDatas = self::getConfigData();
        $schoolCode = $schoolDatas->govt_approve_number; //school Code
        $this->stmt = $this->conn->prepare("SELECT stdRegNo FROM `visap_student_tbl` ORDER BY stdRegNo DESC LIMIT 1");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            if ($row = $this->stmt->fetch());
            $value2 = $row->stdRegNo;
            //separating numeric part
            $value2 = substr($value2, 10, 14);
            //incrementing numeric value
            $value2 = $value2 + 1;
            //concatenating incremented value
            $value2 = $ady . $schoolCode . sprintf('%04s', $value2);
            $this->response = $value2;
        } else {
            // "2021C120040001"
            $value2 = $ady . $schoolCode . "0001";
            $this->response = $value2;
        }
        return  $this->response;
    }

    public function getConfigData()
    {
        $this->query = "SELECT * FROM `visap_school_profile` WHERE id=1";
        $this->stmt = $this->conn->prepare($this->query);
        $this->response = $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
            // code...
            $this->response = $this->stmt->fetch();
            return $this->response;
        }
    }
}