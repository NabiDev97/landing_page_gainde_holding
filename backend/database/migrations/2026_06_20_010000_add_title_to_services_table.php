<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        if (Schema::hasTable('services') && !Schema::hasColumn('services', 'title')) {
            Schema::table('services', function (Blueprint $table) {
                $table->string('title')->nullable()->after('name');
            });

            // Copy existing name values into title for compatibility
            DB::table('services')->whereNull('title')->update(['title' => DB::raw('name')]);
        }
    }

    public function down()
    {
        if (Schema::hasTable('services') && Schema::hasColumn('services', 'title')) {
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('title');
            });
        }
    }
};
