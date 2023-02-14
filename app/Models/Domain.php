<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'database',
        'ftp',
        'website',
        'user_id',
    ];

    //Relationship to user

    /**
     * @return BelongsTo
     */
    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    /**
     * @return HasMany
     */
    public function records()
    {
        return $this->hasMany(Record::class, 'domain_id');
    }
}
