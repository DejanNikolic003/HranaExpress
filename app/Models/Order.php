<?php

namespace App\Models;

use App\Http\Enums\OrderStatus;
use App\Http\Enums\DeliveryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'courier_id',
        'status',
        'total_price',
        'delivery_fee',
        'payment_method',
        'delivery_address',
        'delivery_time',
        'delivery_status',
        'order_notes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function courier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'courier_id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    protected function casts(): array
    {
        return [
            'delivery_status' => DeliveryStatus::class,        
        ];
    }
}
