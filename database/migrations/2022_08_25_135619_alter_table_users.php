<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('phone_number')->nullable();
            $table->string('company_name')->nullable();

            $table->string('website')->nullable();
            $table->string('about_me')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->boolean('account_status')->default(0);

            $table->boolean('api_status')->default(0);
            $table->string('api_key')->nullable();
            $table->boolean('delete_account')->default(0);
            $table->string('image')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('company_name');

            $table->dropColumn('website');
            $table->dropColumn('about_me');
            $table->dropColumn('package_id');
            $table->dropColumn('account_status');

            $table->dropColumn('api_status');
            $table->dropColumn('api_key');
            $table->dropColumn('phone_number');
            $table->dropColumn('delete_account');
            $table->dropColumn('image');
        });
    }
}
