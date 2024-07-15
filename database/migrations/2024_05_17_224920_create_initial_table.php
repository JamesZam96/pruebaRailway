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
        //Tabla roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Tabla locations
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla companies
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('legal_representative_name');
            $table->string('legal_representative_lastname');
            $table->string('legal_representative_dni');
            $table->string('nit')->unique();
            $table->string('person_type');
            $table->string('legal_representative_email');
            $table->string('legal_name_company');
            $table->timestamp('email_verified_at')->nullable();

            $table->boolean('terms_and_conditions')->default(false);
            $table->boolean('processing_of_personal_data')->default(false);

            $table->string('pdf_single_tax_registry');
            $table->string('pdf_bank_certificate');
            $table->string('pdf_legal_representative_dni');
            
            $table->string('account_holder_name');
            $table->string('account_holder_lastname');
            $table->string('bank_name');
            $table->string('account_type');
            $table->string('account_number');
            $table->string('billing_address');
            $table->string('billing_contact_phone_number');
            $table->string('billing_contact_email');
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });

        // Tabla 'delivery'
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->date('birth_date');
            $table->string('vehicle_type');
            $table->string('dni_document_front');
            $table->string('dni_document_back');
            $table->string('driving_license');
            $table->string('transit_license');
            $table->string('mandatory_insurance');
            $table->string('profile_photo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla 'vehicles'
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('plate');
            $table->string('type');
            $table->timestamps();
        });


        // Tabla 'categories'
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla 'products'
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->string('image');
            $table->timestamps();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });

        // Tabla pivote 'category_product'
        /*Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });*/

        // Tabla 'services'
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('price');
            $table->string('image');
            $table->timestamps();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });

        // Tabla 'orders'
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name_customer');
            $table->string('address');
            $table->string('phone');
            $table->string('status')->default('in progress');
            $table->string('quantity');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
            // Definiendo claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Tabla pivote 'order_product'
        /*Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });*/

        // Tabla pivote 'order_service'
        /*Schema::create('order_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->timestamps();

            // Definiendo claves foráneas
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });*/

    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('products');
        Schema::dropIfExists('services');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('deliveries');
        //Schema::dropIfExists('category_product');
        //Schema::dropIfExists('order_product');
        //Schema::dropIfExists('order_service');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('locations');
    }
};
