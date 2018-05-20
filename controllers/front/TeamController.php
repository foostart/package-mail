<?php namespace Foostart\Mail\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Mail\Models\Mails;
use Mail;
use Illuminate\Http\Response;
/**
 * Validators
 */
use Foostart\Mail\Validators\MailAdminValidator;

class TeamController extends Controller {

    public $data_view = array();

    private $obj_mail = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_mail = new Mails();
    }

    /**
     *
     * @return type
     */

    public function index(Request $request)
    {

        // $obj_mail = new Mails();
        // $mails = $obj_mail->get_mails();
        // $this->data = array_merge($this->data,array(
        //     'request' => $request,
        //     'mails' => $mails,
        // ));
         
        return view('mail::front.mail_team');
    }

}