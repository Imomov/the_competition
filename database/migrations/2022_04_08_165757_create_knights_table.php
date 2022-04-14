<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knights', function (Blueprint $table) {
            $table->id();
            $table->string('hashid');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->string('name', 100);
            $table->tinyInteger('age')->unsigned();
            $table->string('picture');
            $table->tinyInteger('scores')->unsigned()->nullable();
            $table->boolean('is_combatant')->default(false);
            $table->tinyInteger('health')->unsigned()->default(100);
            $table->tinyInteger('courage')->unsigned()->nullable();
            $table->tinyInteger('justice')->unsigned()->nullable();
            $table->tinyInteger('mercy')->unsigned()->nullable();
            $table->tinyInteger('generosity')->unsigned()->nullable();
            $table->tinyInteger('faith')->unsigned()->nullable();
            $table->tinyInteger('nobility')->unsigned();
            $table->tinyInteger('hope')->unsigned()->nullable();
            $table->tinyInteger('strength')->unsigned()->nullable();
            $table->tinyInteger('defense')->unsigned()->nullable();
            $table->tinyInteger('battle_strategy')->unsigned();

            // index
            $table->index('health');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knights');
    }
}
