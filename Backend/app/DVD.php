<?php
namespace APP;


class DVD extends Products{
    protected $attributes;
 
    public function __construct($inputs)
    {
        parent::__construct($inputs);
        $this->attributes = $inputs->attributes->size . " MB";
    }

}