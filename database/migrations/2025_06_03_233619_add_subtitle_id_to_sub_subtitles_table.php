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
        Schema::table('sub_subtitles', function (Blueprint $table) {
            $table->foreignId('subtitle_id')->after('id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sub_subtitles', function (Blueprint $table) {
            $table->dropForeign(['subtitle_id']);
            $table->dropColumn('subtitle_id');
        });
    }
};
