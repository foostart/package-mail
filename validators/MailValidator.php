<?php namespace Foostart\Mail\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Mail\Models\Mail;

use Illuminate\Support\MessageBag as MessageBag;

class MailValidator extends FooValidator
{

    protected $obj_mail;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'mail_name' => ["required"],
            'mail_overview' => ["required"],
            'mail_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_mail = new Mail();

        // language
        $this->lang_front = 'mail-front';
        $this->lang_admin = 'mail-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'mail_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'mail_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'mail_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
            ];
        });


    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
        $this->errors = $this->errors ? $this->errors : new MessageBag();

        //Check length
        $_ln = self::$configs['length'];

        $params = [
            'name' => [
                'key' => 'mail_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['mail_name']['min'],
                'max' => $_ln['mail_name']['max'],
            ],
            'overview' => [
                'key' => 'mail_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['mail_overview']['min'],
                'max' => $_ln['mail_overview']['max'],
            ],
            'description' => [
                'key' => 'mail_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['mail_description']['min'],
                'max' => $_ln['mail_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['mail_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['mail_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['mail_description'], $params['description']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-mail');
        return $configs;
    }

}