<?php

namespace App\Http\Controllers;

use App\Http\HelperClasses\Flash;
use App\Models\Baseinfo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $flashed;
    public $objectType;

    public function __construct()
    {
        $this->flashed = new Flash();
    }

    public function objectTable($table)
    {
        $objectType = Baseinfo::whereBas_type('objectType')->where('bas_value', $table)->first();
       // dd( $objectType);
        $this->objectType = $objectType->id;
        return $this->objectType;
    }
}
