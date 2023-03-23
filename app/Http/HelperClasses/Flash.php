<?php

namespace App\Http\HelperClasses;

use RealRashid\SweetAlert\Facades\Alert;

class Flash
{
    public function create($tiltle, $message, $level)
    {
        return Alert::alert($tiltle, $message, $level);
    }

    public function info($tiltle, $message)
    {
        return $this->create($tiltle, $message, 'info');
    }

    public function success($tiltle, $message)
    {
        return $this->create($tiltle, $message, 'success');
    }

    public function warning($tiltle, $message)
    {
        return $this->create($tiltle, $message, 'warning');
    }

    public function error($tiltle, $message)
    {
        return $this->create($tiltle, $message, 'error');
    }

    public function overlay($tiltle, $message, $level = 'success')
    {
        return $this->create($tiltle, $message, $level);
    }
}
