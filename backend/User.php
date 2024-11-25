<?php
class User {
    private $id;
    private $name;
    private $email;
    private $phone;
    private $gender;

    public function __construct($id, $name, $email, $phone, $gender) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->gender = $gender;
    }

    // Getter methods for each property
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getGender() { return $this->gender; }
}
?>
