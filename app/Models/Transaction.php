<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'sender_id', 'receiver_id', 'description', 'amount',
    ];

    protected function amount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2),
        );
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'sender_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'receiver_id');
    }
}
