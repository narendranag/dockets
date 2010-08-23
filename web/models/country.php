<?php

class Country extends DataMapper {
    var $table = 'countries';
    var $has_many = array('user');
}