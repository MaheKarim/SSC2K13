<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
            'paid_amount' => 'decimal:2',
            'due_amount' => 'decimal:2',
        ];
    }

    public function sentToPhone()
    {
        return $this->belongsTo(PhoneNumber::class , 'sent_to_phone_id');
    }

    public function jerseyDetail()
    {
        return $this->hasOne(JerseyDetail::class);
    }

    public function paymentHistories(): HasMany
    {
        return $this->hasMany(PaymentHistory::class);
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

    public function getPaymentStatusLabelAttribute(): string
    {
        return match ($this->payment_status) {
                'unpaid' => 'Unpaid',
                'partial_paid' => 'Partial Paid',
                'paid_in_full' => 'Paid in Full',
                default => $this->payment_status,
            };
    }

    public function getPaymentStatusColorAttribute(): string
    {
        return match ($this->payment_status) {
                'unpaid' => 'red',
                'partial_paid' => 'yellow',
                'paid_in_full' => 'green',
                default => 'gray',
            };
    }

    public function getPaymentTypeLabelAttribute(): string
    {
        return match ($this->payment_type) {
                'full_upfront' => 'Full Upfront',
                'partial_upfront' => 'Partial Upfront',
                default => $this->payment_type,
            };
    }

    /**
     * Update payment status based on paid_amount and total amount
     */
    public function updatePaymentStatus(): void
    {
        if ($this->paid_amount <= 0) {
            $this->payment_status = 'unpaid';
        }
        elseif ($this->paid_amount >= $this->amount) {
            $this->payment_status = 'paid_in_full';
            $this->due_amount = 0;
        }
        else {
            $this->payment_status = 'partial_paid';
            $this->due_amount = $this->amount - $this->paid_amount;
        }
        $this->save();
    }

    /**
     * Add a payment to this donation
     */
    public function addPayment(float $amount, string $paymentMethod = 'other', ?string $transactionId = null, ?string $notes = null, ?string $collectedBy = null, ?int $adminId = null): PaymentHistory
    {
        $payment = $this->paymentHistories()->create([
            'amount' => $amount,
            'payment_method' => $paymentMethod,
            'transaction_id' => $transactionId,
            'notes' => $notes,
            'collected_by' => $collectedBy,
            'admin_id' => $adminId,
        ]);

        // Update paid amount and status
        $this->paid_amount = $this->paymentHistories()->sum('amount');
        $this->updatePaymentStatus();

        return $payment;
    }
}