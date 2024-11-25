<?php
require_once 'UserRepository.php';
require_once 'User.php';

class UserService {
    private $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function createUser($data) {
        $user = new User(null, $data['name'], $data['email'], $data['phone'], $data['gender']);
        return $this->repository->create($user);
    }

    public function getAllUsers() {
        return $this->repository->readAll();
    }

    public function updateUser($data) {
        if (is_null($data) || !isset($data['id']) || !isset($data['name']) || !isset($data['email']) || !isset($data['phone']) || !isset($data['gender'])) {
            throw new Exception("Invalid data provided for update.");
        }
        $user = new User($data['id'], $data['name'], $data['email'], $data['phone'], $data['gender']);
        return $this->repository->update($user);
    }
    

    public function deleteUser($id) {
        return $this->repository->delete($id);
    }
}
?>
