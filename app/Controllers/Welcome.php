<?php
namespace app\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Exceptions;
use CodeIgniter\Exceptions\PageNotFoundException;

class Welcome extends Controller {

    public function index()
    {
        // echo 'Welcome to my first ci4 Controller';
       return view('Test');
    }

    public function greeting($name = null)
    {
        echo "Hi ".$name;
    }

    public function address($name = null , $address = null)
    {
        echo 'Hi '.$name .' '. $address;
    }

    public function _remap($method, $parms1 = null, $parms2 = null)
    {
        if(method_exists($this,$method)){
            return $this->$method($parms1, $parms2);
        }
        throw PageNotFoundException::forPageNotFound();
    }

}


?>