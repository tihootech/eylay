<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function main($action)
    {
    	return $this->$action();
    }

	public function file_upload()
	{
		return upload(request('file'));
	}
}
