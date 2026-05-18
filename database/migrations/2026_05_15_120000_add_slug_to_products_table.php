<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
        });

        $seen = [];
        $rows = DB::table('products')->orderBy('id')->get(['id', 'title']);

        foreach ($rows as $row) {
            $base = Str::slug((string) ($row->title ?? '')) ?: 'product-'.$row->id;
            $slug = $base;
            $i = 2;
            while (isset($seen[$slug])) {
                $slug = $base.'-'.$i++;
            }
            $seen[$slug] = true;

            DB::table('products')->where('id', $row->id)->update(['slug' => $slug]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
