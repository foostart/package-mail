<?php

namespace Foostart\Mail\Models;

use Illuminate\Database\Eloquent\Model;

class MailsCategories extends Model {

    protected $table = 'mails_categories';
    public $timestamps = false;
    protected $fillable = [
        'mail_category_name'
    ];
    protected $primaryKey = 'mail_category_id';

    public function get_mails_categories($params = array()) {
        $eloquent = self::orderBy('mail_category_id');

        if (!empty($params['mail_category_name'])) {
            $eloquent->where('mail_category_name', 'like', '%'. $params['mail_category_name'].'%');
        }
        $mails_category = $eloquent->paginate(10);
        return $mails_category;
    }

    /**
     *
     * @param type $input
     * @param type $mail_id
     * @return type
     */
    public function update_mail_category($input, $mail_id = NULL) {

        if (empty($mail_id)) {
            $mail_id = $input['mail_category_id'];
        }

        $mail = self::find($mail_id);

        if (!empty($mail)) {

            $mail->mail_category_name = $input['mail_category_name'];

            $mail->save();

            return $mail;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_mail_category($input) {

        $mail = self::create([
                    'mail_category_name' => $input['mail_category_name'],
        ]);
        return $mail;
    }

    /**
     * Get list of mails categories
     * @param type $category_id
     * @return type
     */
     public function pluckSelect($category_id = NULL) {
        if ($category_id) {
            $categories = self::where('mail_category_id', '!=', $category_id)
                    ->orderBy('mail_category_name', 'ASC')
                ->pluck('mail_category_name', 'mail_category_id');
        } else {
            $categories = self::orderBy('mail_category_name', 'ASC')
                ->pluck('mail_category_name', 'mail_category_id');
        }
        return $categories;
    }

}
