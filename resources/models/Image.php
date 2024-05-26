<?php

class Image
{
    public $name;
    public $src;
    public function __construct($name, $src)
    {
        $this->name = $name;
        $this->src = $src;
    }

}