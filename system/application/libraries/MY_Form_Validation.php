<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function MY_Form_validation()
    {
        parent::CI_Form_validation();
    }

    /**
    * @desc Validates a date format
    * @params format,delimiter
    * e.g. d/m/y,/ or y-m-d,-
    */
    function valid_date($str, $params)
    {
        // setup
        $CI =&get_instance();
        $params = explode(',', $params);
        $delimiter = $params[1];
        $date_parts = explode($delimiter, $params[0]);

        // get the index (0, 1 or 2) for each part
        $di = $this->valid_date_part_index($date_parts, 'd');
        $mi = $this->valid_date_part_index($date_parts, 'm');
        $yi = $this->valid_date_part_index($date_parts, 'y');

        // regex setup
        $dre = "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)";
        $mre = "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12)";
        $yre = "([0-9]{4})";
        $red = '\\'.$delimiter; // escape delimiter for regex
        $rex = "^[0]{$red}[1]{$red}[2]$";

        // do replacements at correct positions
        $rex = str_replace("[{$di}]", $dre, $rex);
        $rex = str_replace("[{$mi}]", $mre, $rex);
        $rex = str_replace("[{$yi}]", $yre, $rex);

        if (ereg($rex, $str, $matches)) {
            // skip 0 as it contains full match, check the date is logically valid
            if (checkdate($matches[$mi + 1], $matches[$di + 1], $matches[$yi + 1])) {
                return true;
            } else {
                // match but logically invalid
                $CI->form_validation->set_message('valid_date', "The date is invalid.");
                return false;
            }
        }

        // no match
        $CI->form_validation->set_message('valid_date', "The date format is invalid. Use {$params[0]}");
        return false;
    }

    function valid_date_part_index($parts, $search) {
        for ($i = 0; $i <= count($parts); $i++) {
            if ($parts[$i] == $search) {
                return $i;
            }
        }
    }
}