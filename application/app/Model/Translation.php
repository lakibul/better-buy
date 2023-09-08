<?php

namespace App\Model;

use Eloquent;
use Hoyvoy\CrossDatabase\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Model\Translation
 *
 * @property string $translationable_type
 * @property int $translationable_id
 * @property string $locale
 * @property string|null $key
 * @property string|null $value
 * @property int $id
 * @property-read Model|Eloquent $translationable
 * @method static Builder|Translation newModelQuery()
 * @method static Builder|Translation newQuery()
 * @method static Builder|Translation query()
 * @method static Builder|Translation whereId($value)
 * @method static Builder|Translation whereKey($value)
 * @method static Builder|Translation whereLocale($value)
 * @method static Builder|Translation whereTranslationableId($value)
 * @method static Builder|Translation whereTranslationableType($value)
 * @method static Builder|Translation whereValue($value)
 * @mixin Eloquent
 */
class Translation extends Model
{
    public $timestamps = false;

    protected $table = 'translations';

    protected $connection = 'mysql';

    protected $fillable = [
        'translationable_type',
        'translationable_id',
        'locale',
        'key',
        'value',
    ];

    public function translationable(): MorphTo
    {
        return $this->morphTo();
    }
}
