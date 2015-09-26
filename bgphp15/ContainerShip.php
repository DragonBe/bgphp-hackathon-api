<?php

class ContainerShip
{
    const CONTAINER_FULL_SIZE = 12;
    const CONTAINER_TRACK_NUMBER = 10;

    private $_container_number;
    private $_container_country;
    private $_container_full_number;
    private $errors = [];

    public function __construct($container_country){
        if(!empty($container_country)){
            $this->_container_country = $container_country;
        }
    }

    /**
     * Validate does $container_number has a proper format
     * @example 7687345678BG
     */
    public function validate(){
        if(strlen($this->_container_number) != self::CONTAINER_FULL_SIZE){
            $this->errors['container_number'] = 'Container must have 12 characters length!';
        }

        $container_country = substr($this->_container_number, -2);
        if(!is_string($container_country)){
            $this->errors['container_number'] = 'Not a valid country!';
        }

        return $this->errors;
    }

    private function generateContainerNumber(){
        $this->_container_number = strtoupper(substr(str_shuffle(MD5(microtime())), 0, self::CONTAINER_TRACK_NUMBER));
    }

    /**
     * @return mixed
     */
    public function getContainerFullNumber()
    {
        return $this->_container_full_number . $this->_container_country;
    }

    /**
     * @param mixed $container_full_number
     * @return ContainerShip
     */
    public function setContainerFullNumber($container_full_number)
    {
        $this->_container_full_number = $container_full_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContainerCountry()
    {
        return $this->_container_country;
    }

    /**
     * @param mixed $container_country
     * @return ContainerShip
     */
    public function setContainerCountry($container_country)
    {
        $this->_container_country = $container_country;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     * @return ContainerShip
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
        return $this;
    }


}