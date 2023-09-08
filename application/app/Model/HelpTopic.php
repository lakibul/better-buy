<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\HelpTopic
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property int $ranking
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic status()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic whereRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpTopic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HelpTopic extends Model
{
    protected $table = 'help_topics';

    protected $casts = [

        'ranking'    => 'integer',
        'status'     => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $fillable = [
        'question',
        'answer',
        'status',
        'ranking',
    ];

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }
}
