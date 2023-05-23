<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pastes', function (Blueprint $table) {
            $table->string('access_restriction')->change();
        });

        $pastes = \App\Models\Paste::all();
        foreach ($pastes as $paste) {
            switch ($paste->access_restriction) {
                case 1:
                    $paste->access_restriction = 'public';
                    break;
                case 2:
                    $paste->access_restriction = 'unlisted';
                    break;
                case 3:
                    $paste->access_restriction = 'private';
                    break;
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pastes', function (Blueprint $table) {
            $table->unsignedSmallInteger('access_restriction')->change();
        });

        $pastes = \App\Models\Paste::all();
        foreach ($pastes as $paste) {
            switch ($paste->access_restriction) {
                case 'public':
                    $paste->access_restriction = 1;
                    break;
                case 'unlisted':
                    $paste->access_restriction = 2;
                    break;
                case 'private':
                    $paste->access_restriction = 3;
                    break;
            }
        }
    }
};
