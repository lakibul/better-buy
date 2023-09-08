<?php

namespace App\Model;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

/**
 * App\Model\FlashDeal
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property int $status
 * @property int $featured
 * @property string|null $background_color
 * @property string|null $text_color
 * @property string|null $banner
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $product_id
 * @property string|null $deal_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\FlashDealProduct[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static Builder|FlashDeal newModelQuery()
 * @method static Builder|FlashDeal newQuery()
 * @method static Builder|FlashDeal query()
 * @method static Builder|FlashDeal whereBackgroundColor($value)
 * @method static Builder|FlashDeal whereBanner($value)
 * @method static Builder|FlashDeal whereCreatedAt($value)
 * @method static Builder|FlashDeal whereDealType($value)
 * @method static Builder|FlashDeal whereEndDate($value)
 * @method static Builder|FlashDeal whereFeatured($value)
 * @method static Builder|FlashDeal whereId($value)
 * @method static Builder|FlashDeal whereProductId($value)
 * @method static Builder|FlashDeal whereSlug($value)
 * @method static Builder|FlashDeal whereStartDate($value)
 * @method static Builder|FlashDeal whereStatus($value)
 * @method static Builder|FlashDeal whereTextColor($value)
 * @method static Builder|FlashDeal whereTitle($value)
 * @method static Builder|FlashDeal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FlashDeal extends Model
{

    protected $casts = [

        'product_id' => 'integer',
        'status'     => 'integer',
        'featured'   => 'integer',
        'start_date' => 'date',
        'end_date'   => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function products()
    {
        return $this->hasMany(FlashDealProduct::class, 'flash_deal_id');
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }

    public function getTitleAttribute($title)
    {
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $title;
        }

        return $this->translations[0]->value??$title;
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                if (strpos(url()->current(), '/api')){
                    return $query->where('locale', App::getLocale());
                }else{
                    return $query->where('locale', Helpers::default_lang());
                }
            }]);
        });
    }
}
