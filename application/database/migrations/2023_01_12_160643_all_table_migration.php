<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->decimal('order_amount')->default(0);
            $table->decimal('seller_amount')->default(0);
            $table->decimal('admin_commission')->default(0);
            $table->string('received_by')->nullable();
            $table->string('status')->nullable();
            $table->decimal('delivery_charge')->default(0);
            $table->decimal('tax')->default(0);
            $table->bigInteger('customer_id')->nullable();
            $table->string('seller_is')->nullable();
            $table->string('delivered_by')->default('admin');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')->nullable();
            $table->string('cart_group_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->string('product_type')->default('physical');
            $table->string('digital_product_type')->nullable();
            $table->string('color')->nullable();
            $table->text('choices')->nullable();
            $table->text('variations')->nullable();
            $table->text('variant')->nullable();
            $table->integer('quantity')->default(1);
            $table->double('price')->default(1);
            $table->double('tax')->default(1);
            $table->double('discount')->default(1);
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->string('seller_is')->default('admin');
            $table->string('shop_info')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->string('shipping_type')->nullable();
            $table->timestamps();
        });

        Schema::create('cart_shippings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cart_group_id')->nullable();
            $table->bigInteger('shipping_method_id')->nullable();
            $table->double('shipping_cost')->default(0);
            $table->timestamps();
        });

        Schema::create('translations', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('translationable_type')->nullable();
            $table->unsignedBigInteger('translationable_id')->index();
            $table->string('locale')->index();
            $table->string('key')->nullable();
            $table->text('value')->nullable();
        });

        Schema::create('phone_or_email_verifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_or_email')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('identity')->index();
            $table->string('token')->nullable();
            $table->string('user_type')->default('customer');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('paytabs_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->text('result')->nullable();
            $table->unsignedInteger('response_code')->nullable();
            $table->unsignedInteger('pt_invoice_id')->nullable();
            $table->unsignedInteger('transaction_id')->nullable();
            $table->double('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('card_brand')->nullable();
            $table->unsignedInteger('card_first_six_digits')->nullable();
            $table->unsignedInteger('card_last_four_digits')->nullable();
            $table->timestamps();
        });

        Schema::create('delivery_men', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('seller_id')->nullable();
            $table->string('f_name', 100)->nullable();
            $table->string('l_name', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('country_code', 20)->nullable();
            $table->string('phone', 20)->unique();
            $table->string('email', 100)->nullable();
            $table->string('identity_number', 30)->nullable();
            $table->string('identity_type', 50)->nullable();
            $table->string('identity_image')->nullable();
            $table->string('image')->nullable();
            $table->string('password', 100);
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_no')->nullable();
            $table->string('holder_name')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_online')->default(1);
            $table->string('auth_token');
            $table->string('fcm_token')->nullable();
            $table->timestamps();
        });

        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('address_type')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->unsignedInteger('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });

        Schema::create('refund_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_details_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('status')->nullable();
            $table->double('amount')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->longText('refund_reason')->nullable();
            $table->string('images')->nullable();
            $table->longText('approved_note')->nullable();
            $table->longText('rejected_note')->nullable();
            $table->longText('payment_info')->nullable();
            $table->string('change_by')->nullable();
            $table->timestamps();
        });

        Schema::create('refund_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('payment_for')->nullable();
            $table->unsignedBigInteger('payer_id')->nullable();
            $table->unsignedBigInteger('payment_receiver_id')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('paid_to')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->double('amount')->nullable();
            $table->string('transaction_type')->nullable();
            $table->unsignedBigInteger('order_details_id')->nullable();
            $table->unsignedBigInteger('refund_id')->nullable();
            $table->timestamps();
        });

        Schema::create('refund_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refund_request_id')->nullable();
            $table->string('change_by')->nullable();
            $table->unsignedBigInteger('change_by_id')->nullable();
            $table->string('status')->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->mediumText('comment')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('rating')->default(0);
            $table->integer('status')->default(1);
            $table->boolean('is_saved')->default(0);
            $table->timestamps();
        });

        Schema::create('shipping_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->string('shipping_type')->nullable();
            $table->timestamps();
        });

//        Schema::create('soft_credentials', function (Blueprint $table) {
//            $table->id();
//            $table->string('key')->nullable();
//            $table->longText('value')->nullable();
//            $table->timestamps();
//        });

        Schema::create('social_medias', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('icon')->nullable();
            $table->integer('active_status')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('image')->default('def.png');
            $table->string('banner')->nullable();
            $table->timestamps();
        });

        Schema::create('search_functions', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('url')->nullable();
            $table->string('visible_for')->default('admin');
            $table->timestamps();
        });

        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->default('def.png');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('status')->default('pending');
            $table->string('remember_token')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_no')->nullable();
            $table->string('holder_name')->nullable();
            $table->text('auth_token')->nullable();
            $table->double('sales_commission_percentage')->nullable();
            $table->string('gst')->nullable();
            $table->string('cm_firebase_token')->nullable();
            $table->boolean('pos_status')->default(0);
            $table->timestamps();
        });

        Schema::create('category_shipping_costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->double('cost')->nullable();
            $table->boolean('multiply_qty')->nullable();
            $table->timestamps();
        });

        Schema::create('seller_wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->nullable();
            $table->double('total_earning')->default(0);
            $table->double('withdrawn')->default(0);
            $table->double('commission_given')->default(0.00);
            $table->double('pending_withdraw')->default(0.00);
            $table->double('delivery_charge_earned')->default(0.00);
            $table->double('collected_cash')->default(0.00);
            $table->double('total_tax_collected')->default(0.00);
            $table->timestamps();
        });

        Schema::create('seller_wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->nullable();
            $table->double('amount')->default(0);
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->string('payment')->default('received');
            $table->timestamps();
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->string('subject')->nullable();
            $table->string('type')->nullable();
            $table->string('priority')->default('low');
            $table->string('description')->nullable();
            $table->string('reply')->nullable();
            $table->string('status')->default('open');
            $table->timestamps();
        });

        Schema::create('support_ticket_convs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('support_ticket_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->string('customer_message')->nullable();
            $table->string('admin_message')->nullable();
            $table->integer('position')->default(0);
            $table->timestamps();
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('queue')->index();
            $table->longText('payload')->nullable();
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->timestamps();
        });

        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->char('transaction_id')->nullable();
            $table->decimal('credit',24,3)->default(0);
            $table->decimal('debit',24,3)->default(0);
            $table->decimal('admin_bonus',24,3)->default(0);
            $table->decimal('balance',24,3)->default(0);
            $table->string('transaction_type',191)->nullable();
            $table->string('reference',191)->nullable();
            $table->timestamps();
        });

        Schema::create('loyalty_point_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->char('transaction_id')->nullable();
            $table->decimal('credit',24,3)->default(0);
            $table->decimal('debit',24,3)->default(0);
            $table->decimal('balance',24,3)->default(0);
            $table->string('reference',191)->nullable();
            $table->string('transaction_type',191)->nullable();
            $table->timestamps();
        });

        Schema::create('deliveryman_wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->decimal('current_balance', 50, 2)->default(0);
            $table->decimal('cash_in_hand', 50, 2)->default(0);
            $table->decimal('pending_withdraw', 50, 2)->default(0);
            $table->decimal('total_withdraw', 50, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('order_status_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('user_type')->nullable();
            $table->string('status')->nullable();
            $table->string('cause')->nullable();
            $table->timestamps();
        });

        Schema::create('order_expected_delivery_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('user_type')->nullable();
            $table->date('expected_delivery_date')->nullable();
            $table->string('cause')->nullable();
            $table->timestamps();
        });

        Schema::create('delivery_zip_codes', function (Blueprint $table) {
            $table->id();
            $table->string('zipcode')->nullable();
            $table->timestamps();
        });

        Schema::create('delivery_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('deliveryman_id')->nullable();
            $table->dateTime('time')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });

        Schema::create('delivery_country_codes', function (Blueprint $table) {
            $table->id();
            $table->string('country_code')->nullable();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('payer_id')->nullable();
            $table->bigInteger('payment_receiver_id')->nullable();
            $table->string('payment_for')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('paid_to')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('success');
            $table->double('amount')->default(0.00);
            $table->string('transaction_type')->nullable();
            $table->unsignedBigInteger('order_details_id')->nullable();
            $table->timestamps();
        });

        Schema::create('delivery_man_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('user_type', 20)->nullable();
            $table->char('transaction_id')->nullable();
            $table->decimal('debit', 50,2)->default(0);
            $table->decimal('credit', 50,2)->default(0);
            $table->string('transaction_type', 20);
            $table->timestamps();
        });

        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone', 25)->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('connection')->nullable();
            $table->text('queue')->nullable();
            $table->longText('payload')->nullable();
            $table->longText('exception')->nullable();
            $table->timestamp('failed_at')->nullable();
        });

        Schema::create('feature_deals', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        Schema::create('flash_deals', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('featured')->default(0);
            $table->string('background_color')->nullable();
            $table->string('text_color')->nullable();
            $table->string('banner')->nullable();
            $table->string('slug')->nullable();
            $table->string('deal_type')->nullable();
            $table->integer('product_id')->nullable();
            $table->timestamps();
        });

        Schema::create('flash_deal_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('flash_deal_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->decimal('discount')->default(0.00);
            $table->string('discount_type')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('added_by')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('product_type')->default('physical');
            $table->string('category_ids')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->string('unit')->nullable();
            $table->integer('min_qty')->default(1);
            $table->boolean('refundable')->default(1);
            $table->string('digital_product_type')->nullable();
            $table->string('digital_file_ready')->nullable();
            $table->longText('images')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('featured')->nullable();
            $table->string('flash_deal')->nullable();
            $table->string('video_provider')->nullable();
            $table->string('video_url')->nullable();
            $table->string('colors')->nullable();
            $table->boolean('variant_product')->default(0);
            $table->string('attributes')->nullable();
            $table->text('choice_options')->nullable();
            $table->text('variation')->nullable();
            $table->boolean('published')->default(0);
            $table->double('unit_price')->default(0);
            $table->double('purchase_price')->default(0);
            $table->string('tax')->default(0.00);
            $table->string('tax_type')->nullable();
            $table->string('discount')->default(0.00);
            $table->string('discount_type')->nullable();
            $table->integer('current_stock')->nullable();
            $table->integer('minimum_order_qty')->default(1);
            $table->text('details')->nullable();
            $table->boolean('free_shipping')->default(0);
            $table->string('attachment')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured_status')->default(1);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->boolean('request_status')->default(0);
            $table->string('denied_note')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->boolean('multiply_qty')->nullable();
            $table->double('temp_shipping_cost')->nullable();
            $table->boolean('is_shipping_cost_updated')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });

        Schema::create('help_topics', function (Blueprint $table) {
            $table->id();
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->integer('ranking')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->string('variant')->nullable();
            $table->string('sku')->nullable();
            $table->decimal('price')->default(0.00);
            $table->integer('qty')->default(0);
            $table->timestamps();
        });

        Schema::create('deliveryman_notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('notification_count')->default(0);
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('payment_status')->default('unpaid');
            $table->string('order_status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('transaction_ref')->nullable();
            $table->double('order_amount')->default(0);
            $table->string('is_pause')->default(0);
            $table->string('cause')->nullable();
            $table->text('shipping_address')->nullable();
            $table->double('discount_amount')->default(0);
            $table->string('discount_type')->nullable();
            $table->string('coupon_code')->nullable();
            $table->bigInteger('shipping_method_id')->default(0);
            $table->double('shipping_cost')->default(0.00);
            $table->string('order_group_id')->default('def-order-group');
            $table->string('verification_code')->default(0);
            $table->bigInteger('seller_id')->nullable();
            $table->string('seller_is')->nullable();
            $table->text('shipping_address_data')->nullable();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->double('deliveryman_charge')->default(0);
            $table->date('expected_delivery_date')->nullable();
            $table->text('order_note')->nullable();
            $table->unsignedBigInteger('billing_address')->nullable();
            $table->text('billing_address_data')->nullable();
            $table->string('order_type')->default('default_type');
            $table->double('extra_discount')->default(0.00);
            $table->string('extra_discount_type')->nullable();
            $table->boolean('checked')->default(0);
            $table->string('shipping_type')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('delivery_service_name')->nullable();
            $table->string('third_party_delivery_tracking_id')->nullable();
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->string('digital_file_after_sell')->nullable();
            $table->text('product_details')->nullable();
            $table->integer('qty')->default(0);
            $table->double('price')->default(0);
            $table->double('tax')->default(0);
            $table->double('discount')->default(0);
            $table->string('delivery_status')->default('pending');
            $table->string('payment_status')->default('unpaid');
            $table->bigInteger('shipping_method_id')->nullable();
            $table->string('variant')->nullable();
            $table->string('variation')->nullable();
            $table->string('discount_type')->nullable();
            $table->boolean('is_stock_decreased')->default(1);
            $table->integer('refund_request')->default(0);
            $table->timestamps();
        });

        Schema::create('withdraw_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->string('amount')->default(0.00);
            $table->text('transaction_note')->nullable();
            $table->boolean('approved')->default(0);
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('admin_role_id')->default(2);
            $table->string('image')->default('def.png');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('admin_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('module_access')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('address_type')->default('home');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('is_billing')->nullable();
            $table->timestamps();
        });

        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('creator_id')->nullable();
            $table->string('creator_type')->default('admin');
            $table->string('title')->nullable();
            $table->decimal('cost')->default(0.00);
            $table->string('duration')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('admin_wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->nullable();
            $table->double('inhouse_earning')->default(0);
            $table->double('withdrawn')->default(0);
            $table->double('commission_earned')->default(0.00);
            $table->double('delivery_charge_earned')->default(0.00);
            $table->double('pending_amount')->default(0.00);
            $table->double('total_tax_collected')->default(0.00);
            $table->timestamps();
        });

        Schema::create('admin_wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->nullable();
            $table->double('amount')->default(0);
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->string('payment')->default('received');
            $table->timestamps();
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('banner_type')->nullable();
            $table->integer('published')->default(0);
            $table->string('url')->nullable();
            $table->string('resource_type')->nullable();
            $table->bigInteger('resource_id')->nullable();
            $table->timestamps();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->default('def.png');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->longText('value')->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('icon')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('home_status')->default(0);
            $table->integer('priority')->nullable();
            $table->timestamps();
        });

        Schema::create('chattings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->text('message')->nullable();
            $table->boolean('sent_by_customer')->default(0);
            $table->boolean('sent_by_seller')->default(0);
            $table->boolean('sent_by_admin')->nullable();
            $table->boolean('sent_by_delivery_man')->nullable();
            $table->boolean('seen_by_customer')->default(1);
            $table->boolean('seen_by_seller')->default(1);
            $table->boolean('seen_by_admin')->nullable();
            $table->boolean('seen_by_delivery_man')->nullable();
            $table->boolean('status')->default(1);
            $table->bigInteger('shop_id')->nullable();
            $table->timestamps();
        });

        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->boolean('seen')->default(0);
            $table->string('feedback')->default(0);
            $table->longText('reply')->nullable();
            $table->timestamps();
        });

        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_type')->nullable();
            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->date('start_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->decimal('min_purchase')->default(0.00);
            $table->decimal('max_discount')->default(0.00);
            $table->decimal('discount')->default(0.00);
            $table->string('discount_type')->default('percentage');
            $table->boolean('status')->default(1);
            $table->integer('limit')->nullable();
            $table->timestamps();
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('symbol')->nullable();
            $table->string('code')->nullable();
            $table->string('exchange_rate')->nullable();
            $table->date('expire_date')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        Schema::create('customer_wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->decimal('balance')->default(0.00);
            $table->decimal('royality_points')->default(0.00);
            $table->timestamps();
        });

        Schema::create('customer_wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->decimal('transaction_amount')->default(0.00);
            $table->string('transaction_type')->nullable();
            $table->string('transaction_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });

        Schema::create('deal_of_the_days', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->decimal('discount')->default(0.00);
            $table->string('discount_type')->default('amount');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
