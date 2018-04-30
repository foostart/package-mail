<?php namespace Foostart\Mail\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Mail\Models\Mails;
use Mail;

class SendMailController extends Controller {

    function SendMail()
    {
       
        // LẤY DỮ LIỆU
        $data = [
            'confirm' => 'confirm',
            'author' => 'ADMIN',
            'address' => 'nhoxkynox@gmail.com',
            'contents' => 'Hello',
            ];
        
        // GỬI MAIL
        Mail::send(['view' => 'mail'], $data, function($message) use ($data){
            $message->to($data['address'])->cc($data['address'])
                ->subject('Mail sent from '.$data['author'].'.')
                ->setBody($data['contents']);
            $message->from('hieuvan42@gmail.com');
        });

        
    }

}