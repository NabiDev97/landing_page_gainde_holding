<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('role')->nullable();
                $table->string('company')->nullable();
                $table->text('message');
                $table->string('photo')->nullable();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('testimonials')) {
            $columns = Schema::getColumnListing('testimonials');

            if (!in_array('company', $columns, true)) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->string('company')->nullable()->after('role');
                });
            }

            if (!in_array('message', $columns, true) && in_array('content', $columns, true)) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->renameColumn('content', 'message');
                });
            }

            if (!in_array('photo', $columns, true) && in_array('image', $columns, true)) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->renameColumn('image', 'photo');
                });
            }
        }
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
