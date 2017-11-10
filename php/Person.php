<?php
class Person {
    public $firstName;
    public $lastName;
    public $age;
    public $street;
    public $postalCode;
    public $province;
    public $email;
    
    function __construct($firstName, $lastName, $age, $street, $postalCode, $province, $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->street = $street;
        $this->postalCode = $postalCode;
        $this->province = $province;
        $this->email = $email;
    }
}
?>