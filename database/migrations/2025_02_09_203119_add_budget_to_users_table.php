<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('monthly_budget',10, 2)->nullable()->after('email');
            $table->decimal('total_spent', 10, 2)->default(0)->after('monthly_budget');
            $table->integer('notification_threshold')->default(50)->after('total_spent');
            $table->enum('notification_type', ['email', 'sms'])->default('email')->after('notification_threshold');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
