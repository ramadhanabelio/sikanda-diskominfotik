<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreignId('sub_subtitle_id')->after('id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('descriptions', function (Blueprint $table) {
            $table->dropForeign(['sub_subtitle_id']);
            $table->dropColumn('sub_subtitle_id');
        });
    }
};
