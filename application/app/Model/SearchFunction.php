<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SearchFunction
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $url
 * @property string $visible_for
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction query()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchFunction whereVisibleFor($value)
 * @mixin \Eloquent
 */
class SearchFunction extends Model
{
    protected $guarded;
    protected $connection = 'mysql';

}
