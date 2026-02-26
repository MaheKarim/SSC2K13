<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($donation) {
            $donation->hash = Str::random(10);
        });
    }

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    public function sentToPhone()
    {
        return $this->belongsTo(PhoneNumber::class, 'sent_to_phone_id');
    }

    public function jerseyDetail()
    {
        return $this->hasOne(JerseyDetail::class);
    }

    public function getDonationTypeLabelAttribute(): string
    {
        return match ($this->donation_type) {
            'iftar' => 'Iftar Mahfil',
            'jersey' => 'Jersey',
            'both' => 'Both (Iftar + Jersey)',
            default => $this->donation_type,
        };
    }
}
