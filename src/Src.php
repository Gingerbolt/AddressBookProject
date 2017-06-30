<?php
class Contact
    {
      private $name;
      private $phone_number;
      private $address;
      
      function __construct($name, $phone_number, $address)
        {
            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->address = $address;
        }

    function getName() {
        return $this->name;
    }
    function getPhoneNumber() {
        return $this->phone_number;
    }
    function getAddress() {
        return $this->address;
    }
    function setName($new_name) {
        $this->name = (string) $new_name;
    }
    function setPhoneNumber($new_number) {
        $this->phone_number = $new_number;
    }
    function setAddress($new_address) {
        $this->address = $new_address;
    }
    static function getAll() {
        return $_SESSION['list_of_contacts'];
    }
    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }
    static function deleteAll()
    {
        return $_SESSION['list_of_contacts'] = array();
    }
    }
?>
