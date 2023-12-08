<?php

use App\Models\Question;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('reponses', function (Blueprint $table) {
            $table->id();
            $table->string("reponse", 255);
            $table->boolean("estVrai");
            $table->foreignIdFor(Question::class);
            $table->timestamps();
        });

        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string("titre", 255);
            $table->string("description", 1000);
            $table->timestamps();
        });
        Schema::create("questions", function(Blueprint $table){
            $table->id();
            $table->string("libelle", 255);
            $table->timestamps();
            $table->foreignIdFor(Theme::class);
        });

        Schema::create("scores", function (Blueprint $table) {
            $table->id();
            $table->integer("score");
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });

        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
        Schema::dropIfExists('themes');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('scores');
        Schema::dropIfExists('users');
    }
};
