<?php

namespace App\Model;

use App\CPU\Helpers;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Hoyvoy\CrossDatabase\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

/**
 * App\Model\Product
 *
 * @property int $id
 * @property string|null $added_by
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $slug
 * @property string $product_type
 * @property string|null $category_ids
 * @property int|null $brand_id
 * @property string|null $unit
 * @property int $min_qty
 * @property int $refundable
 * @property string|null $digital_product_type
 * @property string|null $digital_file_ready
 * @property string|null $images
 * @property string|null $thumbnail
 * @property int|null $featured
 * @property int|null $flash_deal
 * @property string|null $video_provider
 * @property string|null $video_url
 * @property string|null $colors
 * @property int $variant_product
 * @property string|null $attributes
 * @property string|null $choice_options
 * @property string|null $variation
 * @property int $published
 * @property float $unit_price
 * @property float $purchase_price
 * @property float $tax
 * @property string|null $tax_type
 * @property float $discount
 * @property string|null $discount_type
 * @property int|null $current_stock
 * @property int $minimum_order_qty
 * @property string|null $details
 * @property int $free_shipping
 * @property string|null $attachment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $status
 * @property int $featured_status
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_image
 * @property int $request_status
 * @property string|null $denied_note
 * @property float|null $shipping_cost
 * @property int|null $multiply_qty
 * @property float|null $temp_shipping_cost
 * @property int|null $is_shipping_cost_updated
 * @property string|null $code
 * @property-read Brand|null $brand
 * @property-read Collection|OrderDetail[] $order_delivered
 * @property-read int|null $order_delivered_count
 * @property-read Collection|OrderDetail[] $order_details
 * @property-read int|null $order_details_count
 * @property-read Collection|Review[] $rating
 * @property-read int|null $rating_count
 * @property-read Collection|Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read Seller|null $seller
 * @property-read Shop|null $shop
 * @property-read Collection|ProductStock[] $stocks
 * @property-read int|null $stocks_count
 * @property-read Collection|Translation[] $translations
 * @property-read int|null $translations_count
 * @property-read Collection|Wishlist[] $wish_list
 * @property-read int|null $wish_list_count
 * @method static Builder|Product active()
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product sellerApproved()
 * @method static Builder|Product status()
 * @method static Builder|Product whereAddedBy($value)
 * @method static Builder|Product whereAttachment($value)
 * @method static Builder|Product whereAttributes($value)
 * @method static Builder|Product whereBrandId($value)
 * @method static Builder|Product whereCategoryIds($value)
 * @method static Builder|Product whereChoiceOptions($value)
 * @method static Builder|Product whereCode($value)
 * @method static Builder|Product whereColors($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereCurrentStock($value)
 * @method static Builder|Product whereDeniedNote($value)
 * @method static Builder|Product whereDetails($value)
 * @method static Builder|Product whereDigitalFileReady($value)
 * @method static Builder|Product whereDigitalProductType($value)
 * @method static Builder|Product whereDiscount($value)
 * @method static Builder|Product whereDiscountType($value)
 * @method static Builder|Product whereFeatured($value)
 * @method static Builder|Product whereFeaturedStatus($value)
 * @method static Builder|Product whereFlashDeal($value)
 * @method static Builder|Product whereFreeShipping($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImages($value)
 * @method static Builder|Product whereIsShippingCostUpdated($value)
 * @method static Builder|Product whereMetaDescription($value)
 * @method static Builder|Product whereMetaImage($value)
 * @method static Builder|Product whereMetaTitle($value)
 * @method static Builder|Product whereMinQty($value)
 * @method static Builder|Product whereMinimumOrderQty($value)
 * @method static Builder|Product whereMultiplyQty($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereProductType($value)
 * @method static Builder|Product wherePublished($value)
 * @method static Builder|Product wherePurchasePrice($value)
 * @method static Builder|Product whereRefundable($value)
 * @method static Builder|Product whereRequestStatus($value)
 * @method static Builder|Product whereShippingCost($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereTax($value)
 * @method static Builder|Product whereTaxType($value)
 * @method static Builder|Product whereTempShippingCost($value)
 * @method static Builder|Product whereThumbnail($value)
 * @method static Builder|Product whereUnit($value)
 * @method static Builder|Product whereUnitPrice($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereUserId($value)
 * @method static Builder|Product whereVariantProduct($value)
 * @method static Builder|Product whereVariation($value)
 * @method static Builder|Product whereVideoProvider($value)
 * @method static Builder|Product whereVideoUrl($value)
 * @mixin Eloquent
 */
class Product extends Model
{
    protected $connection = 'mysql';

    protected $casts = [
        'user_id' => 'integer',
        'brand_id' => 'integer',
        'min_qty' => 'integer',
        'published' => 'integer',
        'tax' => 'float',
        'unit_price' => 'float',
        'status' => 'integer',
        'discount' => 'float',
        'current_stock' => 'integer',
        'free_shipping' => 'integer',
        'featured_status' => 'integer',
        'refundable' => 'integer',
        'featured' => 'integer',
        'flash_deal' => 'integer',
        'seller_id' => 'integer',
        'purchase_price' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'shipping_cost' => 'float',
        'multiply_qty' => 'integer',
        'temp_shipping_cost' => 'float',
        'is_shipping_cost_updated' => 'integer'
    ];

    public function translations(): MorphMany
    {
        return $this->morphMany('App\Model\Translation', 'translationable');
    }

    public function scopeActive($query)
    {
        $brand_setting = BusinessSetting::where('type', 'product_brand')->first()->value;
        $digital_product_setting = BusinessSetting::where('type', 'digital_product')->first()->value;

        if (!$digital_product_setting) {
            $product_type = ['physical'];
        } else {
            $product_type = ['digital', 'physical'];
        }

        return $query->when($brand_setting, function ($q) {
            $q->whereHas('brand', function ($query) {
                $query->where(['status' => 1]);
            });
        })->when(!$brand_setting, function ($q) {
            $q->whereNull('brand_id');
        })->where(['status' => 1])->orWhere(function ($query) {
            $query->whereNull('brand_id')->where('status', 1);
        })->SellerApproved()->whereIn('product_type', $product_type);
    }

    public function scopeSellerApproved($query)
    {
        $query->whereHas('seller', function ($query) {
            $query->where(['status' => 'approved']);
        })->orWhere(function ($query) {
            $query->where(['added_by' => 'admin', 'status' => 1]);
        });
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(ProductStock::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function scopeStatus($query)
    {
        return $query->where('featured_status', 1);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'seller_id');
    }

    public function seller(): BelongsTo
    {

        return $this->belongsTo(Seller::class, 'user_id')->where('added_by', 'seller');
    }

    public function rating(): HasMany
    {
        return $this->hasMany(Review::class)
            ->select(DB::raw('avg(rating) average, product_id'))
            ->whereNull('delivery_man_id')
            ->groupBy('product_id');
    }

    public function order_details(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }


    public function order_delivered(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'product_id')
            ->where('delivery_status', 'delivered');

    }

    public function wish_list(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    public function getNameAttribute($name)
    {
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $name;
        }
        return $this->translations[0]->value ?? $name;
    }

    public function getDetailsAttribute($detail)
    {
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $detail;
        }
        return $this->translations[1]->value ?? $detail;
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                if (strpos(url()->current(), '/api')) {
                    return $query->where('locale', App::getLocale());
                } else {
                    return $query->where('locale', Helpers::default_lang());
                }
            }, 'reviews' => function ($query) {
                $query->whereNull('delivery_man_id');
//            }])->withCount(['reviews' => function ($query) {
                $query->whereNull('delivery_man_id');
            }]);
        });
    }
}
