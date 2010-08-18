<?php

class User extends DataMapper {
    var $table = 'users';
    var $has_many = array('docket', 'task');
    var $has_one = array('gold');
}