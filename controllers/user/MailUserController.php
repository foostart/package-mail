<?php

namespace Foostart\Mail\Controlers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Mail\Models\Mails;

class MailUserController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_mail = new Mails();
        $mails = $obj_mail->get_mails();
        $this->data = array(
            'request' => $request,
            'mails' => $mails
        );
        return view('mail::mail.index', $this->data);
    }

}