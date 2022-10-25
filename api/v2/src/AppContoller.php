<?php

class AppController
{
  private $gateway;
  public function __construct($gateway)
  {
    $this->gateway = $gateway;
  }

  public function processRequest(string $method, ?string $id): void
  {
    if ($id) {

      $this->processResourceRequest($method, $id);
    } else {

      $this->processCollectionRequest($method);
    }
  }

  private function processResourceRequest(string $method, string $id): void
  {
    $students = $this->gateway->get($id);

    if (!$students) {
      http_response_code(404);
      echo json_encode(["message" => "Student not found"]);
      return;
    }

    switch ($method) {
      case "GET":
        echo json_encode($students);
        break;

      case "PATCH":
        $data = (array) json_decode(file_get_contents("php://input"), true);

        $errors = $this->getValidationErrors($data, false);

        if (!empty($errors)) {
          http_response_code(422);
          echo json_encode(["errors" => $errors]);
          break;
        }

        $rows = $this->gateway->update($students, $data);

        echo json_encode([
          "message" => "Student $id updated",
          "rows" => $rows
        ]);
        break;

      case "DELETE":
        $rows = $this->gateway->delete($id);

        echo json_encode([
          "message" => "Student $id deleted",
          "rows" => $rows
        ]);
        break;

      default:
        http_response_code(405);
        header("Allow: GET, PATCH, DELETE");
    }
  }

  private function processCollectionRequest(string $method): void
  {
    switch ($method) {
      case "GET":
        echo json_encode($this->gateway->getAll());
        break;

      case "POST":
        $data = (array) json_decode(file_get_contents("php://input"), true);

        $errors = $this->getValidationErrors($data);

        if (!empty($errors)) {
          http_response_code(422);
          echo json_encode(["errors" => $errors]);
          break;
        }

        $id = $this->gateway->create($data);

        http_response_code(201);
        echo json_encode([
          "message" => "Student created",
          "id" => $id
        ]);
        break;

      default:
        http_response_code(405);
        header("Allow: GET, POST");
    }
  }

  private function getValidationErrors(array $data, bool $is_new = true): array
  {
    $errors = [];

    if ($is_new && empty($data["surname"])) {
      $errors[] = "Surname is required";
    }

    if (array_key_exists("adm_status", $data)) {
      if (filter_var($data["adm_status"], FILTER_VALIDATE_INT) === false) {
        $errors[] = "size must be an integer";
      }
    }

    return $errors;
  }
}