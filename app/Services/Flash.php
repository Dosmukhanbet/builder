<?php

namespace App\Services;

class Flash
{
    public function info($title, $message)
    {
        session()->flash('flash_message', [
            'title' => $title,
            'message'=> $message,
            'type' => 'info'
        ]);
    }

    public function success($title, $message)
    {
        session()->flash('flash_message', [
            'title' => $title,
            'message'=> $message,
            'type' => 'success'
        ]);
    }

    public function error($title, $message)
    {
        session()->flash('flash_message', [
            'title' => $title,
            'message'=> $message,
            'type' => 'error'
        ]);
    }

    public function warning($title, $message)
    {
        session()->flash('flash_message', [
            'title' => $title,
            'message'=> $message,
            'type' => 'warning'
        ]);
    }



}
