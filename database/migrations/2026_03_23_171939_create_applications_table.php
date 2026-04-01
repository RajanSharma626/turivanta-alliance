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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Section 1: Business Identification
            $table->string('legal_name')->nullable();
            $table->string('trade_name')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_email')->nullable();
            $table->string('website')->nullable();
            $table->string('service_tax')->nullable();
            
            // Billing Address
            $table->string('billing_country')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_street')->nullable();
            $table->string('billing_postal_code')->nullable();
            
            // Shipping Address
            $table->boolean('same_as_billing')->default(false);
            $table->string('shipping_country')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_street')->nullable();
            $table->string('shipping_postal_code')->nullable();
            
            // Section 2: Contacts (JSON for more flexible storage)
            $table->json('contacts')->nullable();
            
            // Compliance
            $table->boolean('fiduciary_breach')->default(false);
            $table->text('breach_details')->nullable();
            
            // Section 3: Other Information
            $table->date('commencement_date')->nullable();
            $table->string('trade_registration_no')->nullable();
            $table->date('registration_granted_date')->nullable();
            $table->boolean('iata_registered')->default(false);
            
            $table->string('application_no')->unique()->nullable();
            $table->enum('status', ['pending', 'verified', 'unverified'])->default('pending');
            $table->json('uploaded_documents')->nullable(); // Stores {doc_type: {path: ..., status: ...}}
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
