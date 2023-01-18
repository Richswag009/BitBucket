<?php
namespace APP;

class Furniture extends Products{
    protected $attributes;

    public function __construct($inputs)
    {
        parent::__construct($inputs);
        $this->attributes = $inputs->attributes->height . "x" . $inputs->attributes->width ."x" . $inputs->attributes->length;
    }

}