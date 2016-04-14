<?php

use JBPapp\Flash\Flash;

if (! function_exists('flash')) {
	function flash($title = null, $message = null)
    {
        $flash = new Flash;

        if (func_num_args() == 0) {
            return $flash;
        }

        return $flash->message($title, $message);
    }
}