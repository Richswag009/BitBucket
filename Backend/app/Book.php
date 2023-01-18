<?php
namespace APP;

// require_once('../AutoLoad.php');

class Book extends Products{
    protected $attributes;

    
    public function __construct($inputs)
    {
        parent::__construct($inputs);
        $this->attributes = $inputs->attributes->weight . "KG";
    }

}


