<?php

namespace App\Model;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

/**
 * App\Model\DealOfTheDay
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $product_id
 * @property float $discount
 * @property string $discount_type
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static Builder|DealOfTheDay newModelQuery()
 * @method static Builder|DealOfTheDay newQuery()
 * @method static Builder|DealOfTheDay query()
 * @method static Builder|DealOfTheDay whereCreatedAt($value)
 * @method static Builder|DealOfTheDay whereDiscount($value)
 * @method static Builder|DealOfTheDay whereDiscountType($value)
 * @method static Builder|DealOfTheDay whereId($value)
 * @method static Builder|DealOfTheDay whereProductId($value)
 * @method static Builder|DealOfTheDay whereStatus($value)
 * @method static Builder|DealOfTheDay whereTitle($value)
 * @method static Builder|DealOfTheDay whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DealOfTheDay extends Model
{

    protected $casts = [
        'discount'   => 'float',
        'product_id' => 'integer',
        'status'     => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
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
