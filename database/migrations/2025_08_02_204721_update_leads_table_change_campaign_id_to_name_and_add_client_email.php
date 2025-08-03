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
        Schema::table('leads', function (Blueprint $table) {
            // First, drop the foreign key constraint
            $table->dropForeign(['campaign_id']); // 👈 this must be first

            // Then drop the column
            $table->dropColumn('campaign_id');

            // Now add the new columns
            $table->string('campaign_name')->after('user_id');
            $table->string('client_email_id')->after('keyword');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('campaign_name');
            $table->dropColumn('client_email_id');

            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }
};
