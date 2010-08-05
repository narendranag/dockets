<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* bit.ly REST API v3 library for CodeIgniter
*
* @license Creative Commons Attribution 3.0 <http://creativecommons.org/licenses/by/3.0/>
* @version 1.0
* @author Patrick Popowicz <http://patrickpopowicz.com>
* @copyright Copyright (c) 2010, Patrick Popowicz <http://patrickpopowicz.com>
*/

/*
|--------------------------------------------------------------------------
| bit.ly Login Name
|--------------------------------------------------------------------------
|
| Login name used for your bit.ly account.
|
*/
$config['bitly_login']		= "codemastersnake";

/*
|--------------------------------------------------------------------------
| bit.ly API Key
|--------------------------------------------------------------------------
|
| API key provided by bit.ly after logging in.
|
| Can be found at http://bit.ly/account/your_api_key.
|
*/
$config['bitly_apiKey']		= "R_6eaa71faafb01a9db413994ec8e725c2";

/*
|--------------------------------------------------------------------------
| bit.ly X_login Name
|--------------------------------------------------------------------------
|
| External login name used when you are accessing the API on behalf of
| a different user.
|
*/
$config['bitly_x_login']	= "";

/*
|--------------------------------------------------------------------------
| bit.ly X_API Key
|--------------------------------------------------------------------------
|
| External API key used when you are accessing the API on behalf of
| a different user.
|
*/
$config['bitly_x_apiKey']	= "";

/*
|--------------------------------------------------------------------------
| bit.ly Response Format
|--------------------------------------------------------------------------
|
| Data format of the expected response.
|
| Supported formats ar:
|	* json (default)
|	* xml
|	* txt
|
*/
$config['bitly_format']	= "json";

/*
|--------------------------------------------------------------------------
| bit.ly Domain
|--------------------------------------------------------------------------
|
| Specifies the domain used for Shorten requests. Will change the output
| of the shortened URL.
|
| Supported formats ar:
|	* bit.ly (default)
|	* j.mp
|
*/
$config['bitly_domain']	= "bit.ly";


/* End of file bitly.php */
/* Location: ./application/config/bitly.php */