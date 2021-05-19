<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */

class Config
{
    protected $data;
    protected $default = null;

    public function load($file)
{
    $this->data = require $file;
}

    public function get ($key, $default = null)
{
    $this->default = $default;

    $segments = explode('.', $key);
    $data = $this->data;

    foreach ($segments as $segment) {
        if(isset($data[$segment])){
            $data = $data[$segment];
        } else {
            $data = $this->default;
            break;
        }
    }
    return $data;
}

    public function exists($key)
    {
        return $this->get($key) !== $this->default;
    }

    public function getCount($array){
        return count($this->data[$array]);
    }

};
