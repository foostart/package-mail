<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration {

    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'mails';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        /**
         * Existing table
         */
        if (!Schema::hasTable($this->_table)) {
            Schema::create($this->_table, function (Blueprint $table) {
                $table->increments('mail_id');
                $table->string('mail_name');
            });
        }

        /**
         * Existing fields
         */
        //mail_id
        if (!Schema::hasColumn($this->_table, 'mail_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->increments('mail_id');
            });
        }
        //mail_name
        if (!Schema::hasColumn($this->_table, 'mail_name')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('mail_name', 255);
            });
        }
        //category_id
        if (!Schema::hasColumn($this->_table, 'category_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('category_id');
            });
        }

        //mail_image
        if (!Schema::hasColumn($this->_table, 'mail_image')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('mail_image', 255);
            });
        }
        //status_id
        if (!Schema::hasColumn($this->_table, 'status_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('status_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('mails');
    }

}
