<?php

namespace App\Http\Controllers;

use \Input as Input;
use Illuminate\Http\Request;
use App\Upload;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

  public function ideti(){

    if(Input::hasFile('file')) {

        echo 'Uploaded<br />';
        $file = Input::file('file');
        $file->move(Input::get('foldername'), $file->getClientOriginalName());

        return Upload::create([
            'link' => Input::get('link').'/'.$file->getClientOriginalName(),
            'ikelikas' => Input::get('owner'),
            'busena' => '0'
        ]);
    }
  }
}
