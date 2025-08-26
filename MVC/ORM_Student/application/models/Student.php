<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends DataMapper {
    //var $table = 'students';
    public function __construct($id =null){
        parent::__construct($id);
    }
}