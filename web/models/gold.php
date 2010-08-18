<?php

class Gold extends DataMapper {
    var $table = 'gold';
    var $has_one = array('user');
}