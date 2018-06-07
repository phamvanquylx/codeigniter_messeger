<?php 

if (!defined('BASEPATH'))

    exit('No direct script access allowed');

if(!function_exists('check_menu_active'))
{
	function check_menu_active($url,$url_current)
	{
		if($url == $url_current)
		{

			return 'active';
		}
	}
}

if (!function_exists('message_box'))
{
	function message_box($message_type, $close_button = TRUE)
	{
        $CI = &get_instance();
        $message = $CI->session->flashdata($message_type);
        $retval = '';

        if ($message)
        {
            switch ($message_type)
            {
                case 'success':
                    $retval = '<span class="success">' . $message . '</span>';
                    break;
                case 'error':
                    $retval = '<span class="error">' . $message . '</span>';
                    break;
                case 'info':
                    $retval = '<span class="info">' . $message . '</span>';
                    break;
                case 'warning':
                    $retval = '<span class="warning">' . $message . '</span>';
                    break;
            }

           return $retval;
        }
    }
}

if (!function_exists('set_message'))
{
    function set_message($type, $message)
    {
        $CI = &get_instance();
        $CI->session->set_flashdata($type, $message);
    }
}

/* Function used to encode value */
if(!function_exists('encode_value'))
{
    function encode_value($value='')
    {
        if($value != '')
        {
            return str_replace('=','',base64_encode($value));
        }
    }
}
/* Function used to decode for encoded value */
if(!function_exists('decode_value'))
{
    function decode_value($value='')
    {
        if($value != '')
        {
            return base64_decode($value);
        }
    }
}

?>