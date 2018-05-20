<?php

namespace Foostart\Mail\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Mail\Models\Mails;

class MailFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_Mail = new Mails();
        $Mails = $obj_Mail->get_Mails();
        $this->data = array(
            'request' => $request,
            'Mails' => $Mails
        );
        return view('Mail::Mail.index', $this->data);
    }

}