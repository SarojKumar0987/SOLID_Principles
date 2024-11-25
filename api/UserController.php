<?php
require_once '../backend/UserService.php';

$service = new UserService();

header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST': // Create
        $data = json_decode(file_get_contents('php://input'), true);
        if (is_null($data)) {
            echo json_encode(['message' => 'Invalid JSON input.']);
            break;
        }
        $service->createUser($data);
        echo json_encode(['message' => 'User created successfully.']);
        break;
    case 'GET': // Read
        $users = $service->getAllUsers();
        echo json_encode($users);
        break;
    case 'PUT': // Update
        $data = json_decode(file_get_contents('php://input'), true);
        if (is_null($data)) {
            echo json_encode(['message' => 'Invalid JSON input.']);
            break;
        }
        try {
            $service->updateUser($data);
            echo json_encode(['message' => 'User updated successfully.']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
        break;
    case 'DELETE': // Delete
        $data = json_decode(file_get_contents('php://input'), true);

        $service->deleteUser($data['id']);

        echo json_encode(['message' => 'User deleted successfully.']);
        break;

    default:
        echo json_encode(['message' => 'Invalid request method.']);
        break;

}
?>
