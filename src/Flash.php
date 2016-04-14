<?php

namespace JBPapp\Flash;

class Flash {

    /**
     * Flash a new message with the given title, message and level.
     * 
     * @param  string $title   [description]
     * @param  mixed $message [description]
     * @param  string $level   [description]
     * @return
     */
    public function create($message, $title = null, $level = 'info')
    {
        return session()->flash(
            'flash_message',
            compact('title', 'message', 'level')
        );
    }

    /**
     * Create a default (info) flash message.
     * It's an alias for the info method.
     * 
     * @param  string $message
     * @param  string $title
     * @return void
     */
    public function message($message, $title = '')
    {
        return $this->info($message, $title);
    }

    /**
     * Create a flash message for a success event.
     * 
     * @param  string $message
     * @param  string $title
     * @return void
     */
    public function success($message, $title)
    {
        return $this->create($message, $title, 'success');
    }

    /**
     * Create a flash message for an error event.
     * 
     * @param  string $message
     * @param  string $title
     * @return void
     */
    public function error($message, $title)
    {
        return $this->create($message, $title, 'error');
    }

    /**
     * Create a default (info) flash message.
     * 
     * @param  string $message
     * @param  string $title
     * @return void
     */
    public function info($message, $title)
    {
        return $this->create($message, $title, 'info');
    }    

}