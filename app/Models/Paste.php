<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $url
 * @property string $text
 * @property integer$expiration_time
 * @property string $access_restriction
 * @property string $language
 * @property Carbon $time_to_delete
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Paste extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pastes';
    protected $fillable = [
        'user_id',
        'title',
        'url',
        'text',
        'expiration_time',
        'access_restriction',
        'language',
        'time_to_delete',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
