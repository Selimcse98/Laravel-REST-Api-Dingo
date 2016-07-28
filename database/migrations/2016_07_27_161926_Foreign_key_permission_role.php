<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeyPermissionRole extends Migration
{
    public function up()
    {
        Schema::table('permission_role', function ($table) {
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            //$table->primary(['permission_id','role_id']);
        });
    }

    public function down()
    {
    }
}
