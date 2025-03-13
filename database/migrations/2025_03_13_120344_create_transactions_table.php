<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('transactions', 'product_id')) {
                $table->unsignedBigInteger('product_id')->nullable()->after('user_id');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }

            if (!Schema::hasColumn('transactions', 'quantity')) {
                $table->integer('quantity')->after('product_id')->default(1);
            }
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (Schema::hasColumn('transactions', 'quantity')) {
                $table->dropColumn('quantity');
            }

            if (Schema::hasColumn('transactions', 'product_id')) {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
            }
        });
    }
};
