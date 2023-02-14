<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'url',
        'username',
        'password',
        'domain_id',
        'user_id',
    ];

    /**
     * @return BelongsTo
     */
    public function domain(): BelongsTo
    {

        return $this->belongsTo(Domain::class, 'domain_id');
    }

    /**
     * @param       $query
     * @param array $filters
     *
     * @return void
     */
    public function scopeFilter($query, array $filters): void
    {

        if ($filters['domain_id'] ?? false) {
            $query->where('domain_id', '=', request('domain_id'));
        }
    }
}
