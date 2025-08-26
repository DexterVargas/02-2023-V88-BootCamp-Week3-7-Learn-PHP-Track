<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends DataMapper {
    var $has_many = array ('student');
    public function __construct($id =null){
        parent::__construct($id);
    }
}