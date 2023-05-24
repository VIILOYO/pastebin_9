<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property integer $user_id
 * @property string $title
 * @property string $url
 * @property string $text
 * @property integer$expiration_time
 * @property string $access_restriction
 * @property string $language
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
        'timeToDelete',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
