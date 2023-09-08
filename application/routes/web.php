<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use App\Http\Controllers\BkashPaymentController;
use App\Http\Controllers\BkashRefundController;
use App\Http\Controllers\ESewaController;
use App\Http\Controllers\FawryPaymentController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\LiqPayController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\PaymobController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\PaytabsController;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\RazorPayController;
use App\Http\Controllers\Seller\Auth\RegisterController;
use App\Http\Controllers\SenangPayController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\ChattingController;
use App\Http\Controllers\Web\CouponController;
use App\Http\Controllers\Web\CurrencyController;
use App\Http\Controllers\Web\ReviewController;
use App\Http\Controllers\Web\UserLoyaltyController;
use App\Http\Controllers\Web\UserProfileController;
use App\Http\Controllers\Web\UserWalletController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

//for maintenance mode
Route::get('maintenance-mode', 'Web\WebController@maintenance_mode')->name('maintenance-mode');

Route::group(['namespace' => 'Web', 'middleware' => ['maintenance_mode']], function () {
    Route::get('/', [WebController::class, 'home'])->name('home');

    Route::get('quick-view', [WebController::class, 'quick_view'])->name('quick-view');
    Route::get('searched-products', [WebController::class, 'searched_products'])->name('searched-products');

    Route::group(['middleware' => ['customer']], function () {
        Route::get('checkout-details', [WebController::class, 'checkout_details'])->name('checkout-details');
        Route::get('checkout-shipping', [WebController::class, 'checkout_shipping'])->name('checkout-shipping')->middleware('customer');
        Route::get('checkout-payment', [WebController::class, 'checkout_payment'])->name('checkout-payment')->middleware('customer');
        Route::get('checkout-review', [WebController::class, 'checkout_review'])->name('checkout-review')->middleware('customer');
        Route::get('checkout-complete', [WebController::class, 'checkout_complete'])->name('checkout-complete')->middleware('customer');
        Route::get('order-placed', [WebController::class, 'order_placed'])->name('order-placed')->middleware('customer');
        Route::get('shop-cart', [WebController::class, 'shop_cart'])->name('shop-cart');
        Route::post('order_note', [WebController::class, 'order_note'])->name('order_note');
        Route::get('digital-product-download/{id}', [WebController::class, 'digital_product_download'])->name('digital-product-download')->middleware('customer');
        Route::get('submit-review/{id}', [UserProfileController::class, 'submit_review'])->name('submit-review');
        Route::post('review', [ReviewController::class, 'store'])->name('review.store');
        Route::get('deliveryman-review/{id}', [ReviewController::class, 'delivery_man_review'])->name('deliveryman-review');
        Route::post('submit-deliveryman-review', [ReviewController::class, 'delivery_man_submit'])->name('submit-deliveryman-review');
    });

    //wallet payment
    Route::get('checkout-complete-wallet', [WebController::class, 'checkout_complete_wallet'])->name('checkout-complete-wallet');

    Route::post('subscription', [WebController::class, 'subscription'])->name('subscription');
    Route::get('search-shop', [WebController::class, 'search_shop'])->name('search-shop');

    Route::get('categories', [WebController::class, 'all_categories'])->name('categories');
    Route::get('category-ajax/{id}', [WebController::class, 'categories_by_category'])->name('category-ajax');

    Route::get('brands', [WebController::class, 'all_brands'])->name('brands');
    Route::get('sellers', [WebController::class, 'all_sellers'])->name('sellers');
    Route::get('seller-profile/{id}', [WebController::class, 'seller_profile'])->name('seller-profile');

    Route::get('flash-deals/{id}', [WebController::class, 'flash_deals'])->name('flash-deals');
    Route::get('terms', [WebController::class, 'termsandCondition'])->name('terms');
    Route::get('privacy-policy', [WebController::class, 'privacy_policy'])->name('privacy-policy');

    Route::get('/product/{slug}', [WebController::class, 'product'])->name('product');
    Route::get('products', [WebController::class, 'products'])->name('products');
    Route::get('orderDetails', [WebController::class, 'orderdetails'])->name('orderdetails');
    Route::get('discounted-products', [WebController::class, 'discounted_products'])->name('discounted-products');

    Route::post('review-list-product','WebController@review_list_product')->name('review-list-product');
    Route::get('/wallets', function (){

        return view('web-views.wallets');
    })->name('wallet-home');

    Route::get('/user-reviews', function (){

        return view('web-views.users-profile.user-reviews');
    })->name('user-reviews');


    Route::get('/user-prebookings', function (){

        return view('web-views.users-profile.user-prebookings');
    })->name('user-prebookings');

    Route::get('/user-returns', function (){

        return view('web-views.users-profile.user-returns');
    })->name('user-returns');

    Route::get('/user-saved-carts', function (){

        return view('web-views.users-profile.user-saved-carts');
    })->name('user-saved-carts');

    Route::get('/shop', 'WebController@shop')->name('shop');
    //Chat with seller from product details
    Route::get('chat-for-product', [WebController::class, 'chat_for_product'])->name('chat-for-product');

    Route::get('wishlists', [WebController::class, 'viewWishlist'])->name('wishlists')->middleware('customer');
    Route::post('store-wishlist', [WebController::class, 'storeWishlist'])->name('store-wishlist');
    Route::post('delete-wishlist', [WebController::class, 'deleteWishlist'])->name('delete-wishlist');

    Route::post('/currency', [CurrencyController::class, 'changeCurrency'])->name('currency.change');

    Route::get('about-us', [WebController::class, 'about_us'])->name('about-us');

    //profile Route
    Route::get('user-account', [UserProfileController::class, 'user_account'])->name('user-account');
    Route::get('user-account-edit', [UserProfileController::class, 'user_account_edit'])->name('user-account-edit');
    Route::post('user-account-update', [UserProfileController::class, 'user_update'])->name('user-update');
    Route::post('user-account-picture', [UserProfileController::class, 'user_picture'])->name('user-picture');
    Route::get('account-address', [UserProfileController::class, 'account_address'])->name('account-address');
    Route::post('account-address-store', [UserProfileController::class, 'address_store'])->name('address-store');
    Route::get('account-address-delete', [UserProfileController::class, 'address_delete'])->name('address-delete');
    ROute::get('account-address-edit/{id}', [UserProfileController::class, 'address_edit'])->name('address-edit');
    Route::post('account-address-update', [UserProfileController::class, 'address_update'])->name('address-update');
    Route::get('account-payment', [UserProfileController::class, 'account_payment'])->name('account-payment');
    Route::get('account-oder', [UserProfileController::class, 'account_oder'])->name('account-oder');
    Route::get('account-order-details', [UserProfileController::class, 'account_order_details'])->name('account-order-details')->middleware('customer');
    Route::get('generate-invoice/{id}', [UserProfileController::class, 'generate_invoice'])->name('generate-invoice');
    Route::get('account-wishlist', [UserProfileController::class, 'account_wishlist'])->name('account-wishlist'); //add to card not work
    Route::get('refund-request/{id}', [UserProfileController::class, 'refund_request'])->name('refund-request');
    Route::get('refund-details/{id}', [UserProfileController::class, 'refund_details'])->name('refund-details');
    Route::post('refund-store', [UserProfileController::class, 'store_refund'])->name('refund-store');
    Route::get('account-tickets', [UserProfileController::class, 'account_tickets'])->name('account-tickets');
    Route::get('order-cancel/{id}', [UserProfileController::class, 'order_cancel'])->name('order-cancel');
    Route::post('ticket-submit', [UserProfileController::class, 'ticket_submit'])->name('ticket-submit');
    Route::get('account-delete/{id}', [UserProfileController::class, 'account_delete'])->name('account-delete');
    // Chatting start
    Route::get('chat/{type}', [ChattingController::class, 'chat_list'])->name('chat');
    Route::get('messages', [ChattingController::class, 'messages'])->name('messages');
    Route::post('messages-store', [ChattingController::class, 'messages_store'])->name('messages_store');
    // chatting end

    //Support Ticket
    Route::group(['prefix' => 'support-ticket', 'as' => 'support-ticket.'], function () {
        Route::get('{id}', [UserProfileController::class, 'single_ticket'])->name('index');
        Route::post('{id}', [UserProfileController::class, 'comment_submit'])->name('comment');
        Route::get('delete/{id}', [UserProfileController::class, 'support_ticket_delete'])->name('delete');
        Route::get('close/{id}', [UserProfileController::class, 'support_ticket_close'])->name('close');
    });

    Route::get('account-transaction', [UserProfileController::class, 'account_transaction'])->name('account-transaction');
    Route::get('account-wallet-history', [UserProfileController::class, 'account_wallet_history'])->name('account-wallet-history');

    Route::get('wallet', [UserWalletController::class, 'index'])->name('wallet');
    Route::get('loyalty', [UserLoyaltyController::class, 'index'])->name('loyalty');
    Route::post('loyalty-exchange-currency', [UserLoyaltyController::class, 'loyalty_exchange_currency'])->name('loyalty-exchange-currency');

    Route::group(['prefix' => 'track-order', 'as' => 'track-order.'], function () {
        Route::get('', [UserProfileController::class, 'track_order'])->name('index');
        Route::get('result-view', [UserProfileController::class, 'track_order_result'])->name('result-view');
        Route::get('last', [UserProfileController::class, 'track_last_order'])->name('last');
        Route::any('result', [UserProfileController::class, 'track_order_result'])->name('result');
    });
    //FAQ route
    Route::get('helpTopic', [WebController::class, 'helpTopic'])->name('helpTopic');
    //Contacts
    Route::get('contacts', [WebController::class, 'contacts'])->name('contacts');

    //sellerShop
    Route::get('shopView/{id}', [WebController::class, 'seller_shop'])->name('shopView');
    Route::post('shopView/{id}', [WebController::class, 'seller_shop_product']);

    //top Rated
    Route::get('top-rated', [WebController::class, 'top_rated'])->name('topRated');
    Route::get('best-sell', [WebController::class, 'best_sell'])->name('bestSell');
    Route::get('new-product', [WebController::class, 'new_product'])->name('newProduct');

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::post('store', [WebController::class, 'contact_store'])->name('store');
        Route::get('/code/captcha/{tmp}', [WebController::class, 'captcha'])->name('default-captcha');
    });
});

//Seller shop apply
Route::group(['prefix' => 'shop', 'as' => 'shop.', 'namespace' => 'Seller\Auth'], function () {
    Route::get('apply', [RegisterController::class, 'create'])->name('apply');
    Route::post('apply', [RegisterController::class, 'store']);

});

//check done
Route::group(['prefix' => 'cart', 'as' => 'cart.', 'namespace' => 'Web'], function () {
    Route::post('variant_price', [CartController::class, 'variant_price'])->name('variant_price');
    Route::post('add', [CartController::class, 'addToCart'])->name('add');
    Route::post('remove', [CartController::class, 'removeFromCart'])->name('remove');
    Route::post('nav-cart-items', [CartController::class, 'updateNavCart'])->name('nav-cart');
    Route::post('updateQuantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');
});

//Seller shop apply
Route::group(['prefix' => 'coupon', 'as' => 'coupon.', 'namespace' => 'Web'], function () {
    Route::post('apply', [CouponController::class, '@apply'])->name('apply');
});
//check done

// SSLCOMMERZ Start
/*Route::get('/example1', [SslCommerzPaymentController::class,'exampleEasyCheckout');
Route::get('/example2', [SslCommerzPaymentController::class,'exampleHostedCheckout');*/
Route::post('pay-ssl', [SslCommerzPaymentController::class, 'index']);
Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('ssl-success');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->name('ssl-fail');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('ssl-cancel');
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn'])->name('ssl-ipn');
//SSLCOMMERZ END

/*paypal*/
/*Route::get('/paypal', function (){return view('paypal-test');})->name('paypal');*/
Route::post('pay-paypal', [PaypalPaymentController::class, 'payWithpaypal'])->name('pay-paypal');
Route::get('paypal-status', [PaypalPaymentController::class, 'getPaymentStatus'])->name('paypal-status');
Route::get('paypal-success', [PaypalPaymentController::class, 'success'])->name('paypal-success');
Route::get('paypal-fail', [PaypalPaymentController::class, 'fail'])->name('paypal-fail');

/*paypal*/

/*e-sewa*/
Route::post('pay-esewa', [ESewaController::class, 'payWithESewa'])->name('pay-esewa');
Route::any('esewa/success', [ESewaController::class, 'success'])->name('esewa.success');
Route::any('pay-esewa/fail', [ESewaController::class, 'fail'])->name('esewa.fail');
/*e-sewa*/

//khalti
Route::get('khalti/payment-form', [KhaltiController::class, 'payWithKhalti'])->name('payment-form');
Route::post('khalti/submit', [KhaltiController::class, 'submit'])
    ->name('khalti.submit');
Route::get('khalti/response', [KhaltiController::class, 'response'])
    ->name('khalti.response');
/*Route::get('stripe', function (){
return view('stripe-test');
});*/
Route::get('pay-stripe', [StripePaymentController::class, 'payment_process_3d'])->name('pay-stripe');
Route::get('pay-stripe/success', [StripePaymentController::class, 'success'])->name('pay-stripe.success');
Route::get('pay-stripe/fail', [StripePaymentController::class, 'success'])->name('pay-stripe.fail');

// Get Route For Show Payment razorpay Form
Route::get('paywithrazorpay', [RazorPayController::class, 'payWithRazorpay'])->name('paywithrazorpay');
Route::post('payment-razor', [RazorPayController::class, 'payment'])->name('payment-razor');
Route::post('payment-razor/payment2', [RazorPayController::class, 'payment_mobile'])->name('payment-razor.payment2');
Route::get('payment-razor/success', [RazorPayController::class, 'success'])->name('payment-razor.success');
Route::get('payment-razor/fail', [RazorPayController::class, 'success'])->name('payment-razor.fail');

Route::get('payment-success', 'Customer\PaymentController@success')->name('payment-success');
Route::get('payment-fail', 'Customer\PaymentController@fail')->name('payment-fail');

//senang pay
Route::match(['get', 'post'], '/return-senang-pay', [SenangPayController::class, 'return_senang_pay'])->name('return-senang-pay');

//paystack
Route::post('/paystack-pay', [PaystackController::class, 'redirectToGateway'])->name('paystack-pay');
Route::get('/paystack-callback', [PaystackController::class, 'handleGatewayCallback'])->name('paystack-callback');
Route::get('/paystack', function () {
    return view('paystack');
});

// paymob
Route::post('/paymob-credit', [PaymobController::class, 'credit'])->name('paymob-credit');
Route::get('/paymob-callback', [PaymobController::class, 'callback'])->name('paymob-callback');

//paytabs
Route::any('/paytabs-payment', [PaytabsController::class, 'payment'])->name('paytabs-payment');
Route::any('/paytabs-response', [PaytabsController::class, 'callback_response'])->name('paytabs-response');

//bkash
Route::group(['prefix' => 'bkash'], function () {
    // Payment Routes for bKash
    Route::post('get-token', [BkashPaymentController::class, 'getToken'])->name('bkash-get-token');
    Route::post('create-payment', [BkashPaymentController::class, 'createPayment'])->name('bkash-create-payment');
    Route::post('execute-payment', [BkashPaymentController::class, 'executePayment'])->name('bkash-execute-payment');
    Route::get('query-payment', [BkashPaymentController::class, 'queryPayment'])->name('bkash-query-payment');
    Route::post('success', [BkashPaymentController::class, 'bkashSuccess'])->name('bkash-success');

    // Refund Routes for bKash
    Route::get('refund', [BkashRefundController::class, 'index'])->name('bkash-refund');
    Route::post('refund', [BkashRefundController::class, 'refund'])->name('bkash-refund');
});

//fawry
Route::get('/fawry', [FawryPaymentController::class, 'index'])->name('fawry');
Route::any('/fawry-payment', [FawryPaymentController::class, 'payment'])->name('fawry-payment');

// The callback url after a payment
Route::get('mercadopago/home', [MercadoPagoController::class, 'index'])->name('mercadopago.index');
Route::post('mercadopago/make-payment', [MercadoPagoController::class, 'make_payment'])->name('mercadopago.make_payment');
Route::get('mercadopago/get-user', [MercadoPagoController::class, 'get_test_user'])->name('mercadopago.get-user');

// The route that the button calls to initialize payment
Route::post('/flutterwave-pay', [FlutterwaveController::class, 'initialize'])->name('flutterwave_pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('flutterwave_callback');

// The callback url after a payment PAYTM
Route::get('paytm-payment', [PaytmController::class, 'payment'])->name('paytm-payment');
Route::any('paytm-response', [PaytmController::class, 'callback'])->name('paytm-response');

// The callback url after a payment LIQPAY
Route::get('liqpay-payment', [LiqPayController::class, 'payment'])->name('liqpay-payment');
Route::any('liqpay-callback', [LiqPayController::class, 'callback'])->name('liqpay-callback');

Route::get('/test', function () {
    $product = \App\Model\Product::find(116);
    $quantity = 6;
    return view('seller-views.product.barcode-pdf', compact('product', 'quantity'));
});
