<?php

use Illuminate\Database\Seeder;

class MailsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //Create example data
        for ($i = 0; $i < 50; $i++) {
            DB::table('mails')->insert([
                'mail_name' => str_random(10)
            ]);
        }
    }

}
