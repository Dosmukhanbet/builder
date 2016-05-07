<?php

use App\Services\Flash;



function flash($title = null, $message = null)
{

    $flash = app(Flash::class);

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->message($title, $message);

}
