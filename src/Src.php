<?php
class Object
    {
      private $property1;
      private $property2;
      private $property3;
      lower snake case on var names
      function __construct($property1, $property2)
        {
            $this->property1 = $property1;
            $this->property2 = $property2;
            $this->property3;
        }

    function getPropertyOne() {
        return $this->property1;
    }
    function getPropertyTwo() {
        return $this->property2;
    }
    static function getAll() {
        return $_SESSION['property_list'];
    }
    function save()
    {
        array_push($_SESSION['property_list'], $this);
    }
    static function deleteAll()
    {
        return $_SESSION['property_list'] = array();
    }
    }
?>
