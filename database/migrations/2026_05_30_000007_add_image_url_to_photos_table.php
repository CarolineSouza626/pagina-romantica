<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('image_path');
        });

        DB::table('photos')
            ->whereNotNull('image_path')
            ->whereNull('image_url')
            ->update([
                'image_url' => DB::raw("concat('/storage/', image_path)"),
            ]);
    }

    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
};
