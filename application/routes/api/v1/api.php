<?php

use App\Http\Controllers\api\v1\AttributeController;
use App\Http\Controllers\api\v1\auth\EmailVerificationController;
use App\Http\Controllers\api\v1\auth\ForgotPassword;
use App\Http\Controllers\api\v1\auth\PassportAuthController;
use App\Http\Controllers\api\v1\auth\PhoneVerificationController;
use App\Http\Controllers\api\v1\auth\SocialAuthController;
use App\Http\Controllers\api\v1\BannerController;
use App\Http\Controllers\api\v1\BrandController;
use App\Http\Controllers\api\v1\CartController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ChatController;
use App\Http\Controllers\api\v1\ConfigController;
use App\Http\Controllers\api\v1\CouponController;
use App\Http\Controllers\api\v1\CustomerController;
use App\Http\Controllers\api\v1\DealController;
use App\Http\Controllers\api\v1\DealOfTheDayController;
use App\Http\Controllers\api\v1\FlashDealController;
use App\Http\Controllers\api\v1\GeneralController;
use App\Http\Controllers\api\v1\MapApiController;
use App\Http\Controllers\api\v1\NotificationController;
use App\Http\Controllers\api\v1\OrderController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\SellerController;
use App\Http\Controllers\api\v1\ShippingMethodController;
use App\Http\Controllers\api\v1\UserLoyaltyController;
use App\Http\Controllers\api\v1\UserWalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['namespace' => 'api\v1', 'prefix' => 'v1', 'middleware' => ['api_lang']], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'auth'], function () {
        Route::post('register', [PassportAuthController::class, 'register']);
        Route::post('login', [PassportAuthController::class, 'login']);

        Route::post('check-phone', [PhoneVerificationController::class, 'check_phone']);
        Route::post('verify-phone', [PhoneVerificationController::class, 'verify_phone']);

        Route::post('check-email', [EmailVerificationController::class, 'check_email']);
        Route::post('verify-email', [EmailVerificationController::class, 'verify_email']);

        Route::post('forgot-password', [ForgotPassword::class, 'reset_password_request']);
        Route::post('verify-otp', [ForgotPassword::class, 'otp_verification_submit']);
        Route::put('reset-password', [ForgotPassword::class, 'reset_password_submit']);

        Route::any('social-login', [SocialAuthController::class, 'social_login']);
        Route::post('update-phone', [SocialAuthController::class, 'update_phone']);
    });

    Route::group(['prefix' => 'config'], function () {
        Route::get('/', [ConfigController::class, 'configuration']);
    });

    Route::group(['prefix' => 'shipping-method', 'middleware' => 'auth:api'], function () {
        Route::get('detail/{id}', [ShippingMethodController::class, 'get_shipping_method_info']);
        Route::get('by-seller/{id}/{seller_is}', [ShippingMethodController::class, 'shipping_methods_by_seller']);
        Route::post('choose-for-order', [ShippingMethodController::class, 'choose_for_order']);
        Route::get('chosen', [ShippingMethodController::class, 'chosen_shipping_methods']);

        Route::get('check-shipping-type', [ShippingMethodController::class, 'check_shipping_type']);
    });

    Route::group(['prefix' => 'cart', 'middleware' => 'auth:api'], function () {
        Route::get('/', [CartController::class, 'cart']);
        Route::post('add', [CartController::class, 'add_to_cart']);
        Route::put('update', [CartController::class, 'update_cart']);
        Route::delete('remove', [CartController::class, 'remove_from_cart']);
        Route::delete('remove-all', [CartController::class, 'remove_all_from_cart']);

    });

    Route::get('faq', [GeneralController::class, 'faq']);

    Route::group(['prefix' => 'products'], function () {
        Route::get('latest', [ProductController::class, 'get_latest_products']);
        Route::get('featured', [ProductController::class, 'get_featured_products']);
        Route::get('top-rated', [ProductController::class, 'get_top_rated_products']);
        Route::any('search', [ProductController::class, 'get_searched_products']);
        Route::get('details/{slug}', [ProductController::class, 'get_product']);
        Route::get('related-products/{product_id}', [ProductController::class, 'get_related_products']);
        Route::get('reviews/{product_id}', [ProductController::class, 'get_product_reviews']);
        Route::get('rating/{product_id}', [ProductController::class, 'get_product_rating']);
        Route::get('counter/{product_id}', [ProductController::class, 'counter']);
        Route::get('shipping-methods', [ProductController::class, 'get_shipping_methods']);
        Route::get('social-share-link/{product_id}', [ProductController::class, 'social_share_link']);
        Route::post('reviews/submit', [ProductController::class, 'submit_product_review'])->middleware('auth:api');
        Route::get('best-sellings', [ProductController::class, 'get_best_sellings']);
        Route::get('home-categories', [ProductController::class, 'get_home_categories']);
        ROute::get('discounted-product', [ProductController::class, 'get_discounted_product']);
    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', [NotificationController::class, 'get_notifications']);
    });

    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', [BrandController::class, 'get_brands']);
        Route::get('products/{brand_id}', [BrandController::class, 'get_products']);
    });

    Route::group(['prefix' => 'attributes'], function () {
        Route::get('/', [AttributeController::class, 'get_attributes']);
    });

    Route::group(['prefix' => 'flash-deals'], function () {
        Route::get('/', [FlashDealController::class, 'get_flash_deal']);
        Route::get('products/{deal_id}', [FlashDealController::class, 'get_products']);
    });

    Route::group(['prefix' => 'deals'], function () {
        Route::get('featured', [DealController::class, 'get_featured_deal']);
    });

    Route::group(['prefix' => 'dealsoftheday'], function () {
        Route::get('deal-of-the-day', [DealOfTheDayController::class, 'get_deal_of_the_day_product']);
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'get_categories']);
        Route::get('products/{category_id}', [CategoryController::class, 'get_products']);
    });

    Route::group(['prefix' => 'customer', 'middleware' => 'auth:api'], function () {
        Route::get('info', [CustomerController::class, 'info']);
        Route::put('update-profile', [CustomerController::class, 'update_profile']);
        Route::put('cm-firebase-token', [CustomerController::class, 'update_cm_firebase_token']);
        Route::get('account-delete/{id}', [CustomerController::class, 'account_delete']);

        Route::get('get-restricted-country-list', [CustomerController::class, 'get_restricted_country_list']);
        Route::get('get-restricted-zip-list', [CustomerController::class, 'get_restricted_zip_list']);

        Route::group(['prefix' => 'address'], function () {
            Route::get('list', [CustomerController::class, 'address_list']);
            Route::get('get/{id}', [CustomerController::class, 'get_address']);
            Route::post('add', [CustomerController::class, 'add_new_address']);
            Route::put('update', [CustomerController::class, 'update_address']);
            Route::delete('/', [CustomerController::class, 'delete_address']);
        });

        Route::group(['prefix' => 'support-ticket'], function () {
            Route::post('create', [CustomerController::class, 'create_support_ticket']);
            Route::get('get', [CustomerController::class, 'get_support_tickets']);
            Route::get('conv/{ticket_id}', [CustomerController::class, 'get_support_ticket_conv']);
            Route::post('reply/{ticket_id}', [CustomerController::class, 'reply_support_ticket']);
        });

        Route::group(['prefix' => 'wish-list'], function () {
            Route::get('/', [CustomerController::class, 'wish_list']);
            Route::post('add', [CustomerController::class, 'add_to_wishlist']);
            Route::delete('remove', [CustomerController::class, 'remove_from_wishlist']);
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('list', [CustomerController::class, 'get_order_list']);
            Route::get('details', [CustomerController::class, 'get_order_details']);
            Route::get('place', [OrderController::class, 'place_order']);
            Route::get('refund', [OrderController::class, 'refund_request']);
            Route::post('refund-store', [OrderController::class, 'store_refund']);
            Route::get('refund-details', [OrderController::class, 'refund_details']);
            Route::post('deliveryman-reviews/submit', [ProductController::class, 'submit_deliveryman_review'])->middleware('auth:api');
        });
        // Chatting
        Route::group(['prefix' => 'chat'], function () {
            Route::get('list/{type}', [ChatController::class, 'list']);
            Route::get('get-messages/{type}/{id}', [ChatController::class, 'get_message']);
            Route::post('send-message/{type}', [ChatController::class, 'send_message']);
        });

        //wallet
        Route::group(['prefix' => 'wallet'], function () {
            Route::get('list', [UserWalletController::class, 'list']);
        });
        //loyalty
        Route::group(['prefix' => 'loyalty'], function () {
            Route::get('list', [UserLoyaltyController::class, 'list']);
            Route::post('loyalty-exchange-currency', [UserLoyaltyController::class, 'loyalty_exchange_currency']);
        });
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('track', [OrderController::class, 'track_order']);
        Route::get('cancel-order', [OrderController::class, 'order_cancel']);
    });

    Route::group(['prefix' => 'banners'], function () {
        Route::get('/', [BannerController::class, 'get_banners']);
    });

    Route::group(['prefix' => 'seller'], function () {
        Route::get('/', [SellerController::class, 'get_seller_info']);
        Route::get('{seller_id}/products', [SellerController::class, 'get_seller_products']);
        Route::get('{seller_id}/all-products', [SellerController::class, 'get_seller_all_products']);
        Route::get('top', [SellerController::class, 'get_top_sellers']);
        Route::get('all', [SellerController::class, 'get_all_sellers']);
    });

    Route::group(['prefix' => 'coupon', 'middleware' => 'auth:api'], function () {
        Route::get('apply', [CouponController::class, 'apply']);
    });


    //map api
    Route::group(['prefix' => 'mapapi'], function () {
        Route::get('place-api-autocomplete', [MapApiController::class, 'place_api_autocomplete']);
        Route::get('distance-api', [MapApiController::class, 'distance_api']);
        Route::get('place-api-details', [MapApiController::class, 'place_api_details']);
        Route::get('geocode-api', [MapApiController::class, 'geocode_api']);
    });
});
