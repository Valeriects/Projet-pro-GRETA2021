<?php
require_once './model/Data.php';

class BaseModel
{
    protected $_conn;

    public function __construct()
    {
        $this->_conn = Database::getPDO();
    }
}
