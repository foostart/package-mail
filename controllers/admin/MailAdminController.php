<?php

namespace Foostart\Mail\Controllers\Admin;

use Illuminate\Http\Request;
use Foostart\Mail\Controllers\Admin\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Mail\Models\Mails;
use Foostart\Mail\Models\MailsCategories;
/**
 * Validators
 */
use Foostart\Mail\Validators\MailAdminValidator;

class MailAdminController extends Controller {

    public $data_view = array();
    private $obj_mail = NULL;
    private $obj_mail_categories = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_mail = new Mails();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_mail = $this->obj_mail->get_mails($params);

        $this->data_view = array_merge($this->data_view, array(
            'mails' => $list_mail,
            'request' => $request,
            'params' => $params
        ));
        return view('mail::mail.admin.mail_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $mail = NULL;
        $mail_id = (int) $request->get('id');


        if (!empty($mail_id) && (is_int($mail_id))) {
            $mail = $this->obj_mail->find($mail_id);
        }

        $this->obj_mail_categories = new MailsCategories();

        $this->data_view = array_merge($this->data_view, array(
            'mail' => $mail,
            'request' => $request,
            'categories' => $this->obj_mail_categories->pluckSelect()
        ));
        return view('mail::mail.admin.mail_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new MailAdminValidator();

        $input = $request->all();

        $mail_id = (int) $request->get('id');
        $mail = NULL;

        $data = array();

        if ($this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($mail_id) && is_int($mail_id)) {

                $mail = $this->obj_mail->find($mail_id);
            }
        } else {
            if (!empty($mail_id) && is_int($mail_id)) {

                $mail = $this->obj_mail->find($mail_id);

                if (!empty($mail)) {

                    $input['mail_id'] = $mail_id;
                    $mail = $this->obj_mail->update_mail($input);

                    //Message
                    $this->addFlashMessage('message', trans('mail::mail_admin.message_update_successfully'));
                    return Redirect::route("admin_mail.edit", ["id" => $mail->mail_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('mail::mail_admin.message_update_unsuccessfully'));
                }
            } else {

                $mail = $this->obj_mail->add_mail($input);

                if (!empty($mail)) {

                    //Message
                    $this->addFlashMessage('message', trans('mail::mail_admin.message_add_successfully'));
                    return Redirect::route("admin_mail.edit", ["id" => $mail->mail_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('mail::mail_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'mail' => $mail,
            'request' => $request,
                ), $data);

        return view('mail::mail.admin.mail_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $mail = NULL;
        $mail_id = $request->get('id');

        if (!empty($mail_id)) {
            $mail = $this->obj_mail->find($mail_id);

            if (!empty($mail)) {
                //Message
                $this->addFlashMessage('message', trans('mail::mail_admin.message_delete_successfully'));

                $mail->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'mail' => $mail,
        ));

        return Redirect::route("admin_mail");
    }

}
