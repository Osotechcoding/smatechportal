<?php

class AppGateway
{
  private PDO $conn;

  public function __construct($database)
  {
    $this->conn = $database->getConnection();
  }

  public function getAll(): array
  {
    $sql = "SELECT *
                FROM visap_student_tbl";

    $stmt = $this->conn->query($sql);

    $data = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
    }
    return $data;
  }

  public function create(array $data): string
  {
    $sql = "INSERT INTO visap_student_tbl (stdEmail,stdSurName, stdFirstName, stdMiddleName,studentClass,stdDob,stdPhone,stdAdmStatus)
                VALUES (:stdEmail,:stdSurName, :stdFirstName, :stdMiddleName,:studentClass,:stdDob,:stdPhone,:stdAdmStatus)";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(":stdEmail", $data["email"], PDO::PARAM_STR);
    $stmt->bindValue(":stdSurName", $data["surname"], PDO::PARAM_STR);
    $stmt->bindValue(":stdFirstName", $data["firstname"], PDO::PARAM_STR);
    $stmt->bindValue(":stdMiddleName", $data["middlename"], PDO::PARAM_STR);
    $stmt->bindValue(":studentClass", $data["student_class"], PDO::PARAM_STR);
    $stmt->bindValue(":stdDob", $data["dob"], PDO::PARAM_STR);
    $stmt->bindValue(":stdPhone", $data["size"] ?? 0, PDO::PARAM_INT);
    $stmt->bindValue(":stdAdmStatus", $data["adm_status"] ?? 'Active', PDO::PARAM_STR);

    $stmt->execute();

    return $this->conn->lastInsertId();
  }

  public function get(string $id): array
  {
    $sql = "SELECT *
                FROM visap_student_tbl
                WHERE stdId = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data !== false) {
      if ($data["stdAdmStatus"] == "Active") {
        $data["stdAdmStatus"] = true;
      } else {
        $data["stdAdmStatus"] = false;
      }
    }

    return $data;
  }

  public function update(array $current, array $new): int
  {
    $sql = "UPDATE visap_student_tbl
                SET stdEmail=:stdEmail,stdSurName=:stdSurName, stdFirstName=:stdFirstName, stdMiddleName=:stdMiddleName,studentClass=:studentClass,stdDob=:stdDob,stdPhone=:stdPhone,stdAdmStatus=:stdAdmStatus
                WHERE stdId = :id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":stdEmail", $data["email"] ?? $current["email"], PDO::PARAM_STR);
    $stmt->bindValue(":stdSurName", $data["surname"] ?? $current["surname"], PDO::PARAM_STR);
    $stmt->bindValue(":stdFirstName", $data["firstname"] ?? $current["firstname"], PDO::PARAM_STR);
    $stmt->bindValue(":stdMiddleName", $data["middlename"] ?? $current["middlename"], PDO::PARAM_STR);
    $stmt->bindValue(":studentClass", $data["student_class"] ?? $current["student_class"], PDO::PARAM_STR);
    $stmt->bindValue(":stdDob", $data["dob"] ?? $current["dob"], PDO::PARAM_STR);
    $stmt->bindValue(":stdPhone", $data["size"] ?? 0, PDO::PARAM_INT);
    $stmt->bindValue(":stdAdmStatus", $data["adm_status"] ?? $current["adm_status"], PDO::PARAM_STR);

    $stmt->bindValue(":id", $current["id"], PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->rowCount();
  }

  public function delete(string $id): int
  {
    $sql = "DELETE FROM visap_student_tbl
                WHERE stdId = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->rowCount();
  }
}