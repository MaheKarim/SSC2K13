<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminLoginHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'event',
        'ip_address',
        'user_agent',
        'browser',
        'platform',
        'device_type',
        'location',
        'email',
    ];

    /**
     * Get the admin that owns the login history record.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Scope: filter by admin
     */
    public function scopeForAdmin($query, $adminId)
    {
        return $query->where('admin_id', $adminId);
    }

    /**
     * Scope: only login events
     */
    public function scopeLogins($query)
    {
        return $query->where('event', 'login');
    }

    /**
     * Scope: only logout events
     */
    public function scopeLogouts($query)
    {
        return $query->where('event', 'logout');
    }

    /**
     * Scope: only failed login events
     */
    public function scopeFailedLogins($query)
    {
        return $query->where('event', 'login_failed');
    }

    /**
     * Get the event badge color class.
     */
    public function getEventColorAttribute(): string
    {
        return match ($this->event) {
            'login' => 'bg-emerald-50 text-emerald-700',
            'logout' => 'bg-amber-50 text-amber-700',
            'login_failed' => 'bg-red-50 text-red-700',
            default => 'bg-gray-50 text-gray-700',
        };
    }

    /**
     * Get the event dot color class.
     */
    public function getEventDotColorAttribute(): string
    {
        return match ($this->event) {
            'login' => 'bg-emerald-500',
            'logout' => 'bg-amber-500',
            'login_failed' => 'bg-red-500',
            default => 'bg-gray-500',
        };
    }

    /**
     * Get human-readable event label.
     */
    public function getEventLabelAttribute(): string
    {
        return match ($this->event) {
            'login' => 'Login',
            'logout' => 'Logout',
            'login_failed' => 'Failed',
            default => ucfirst($this->event),
        };
    }

    /**
     * Get the device type icon name.
     */
    public function getDeviceIconAttribute(): string
    {
        return match ($this->device_type) {
            'mobile' => 'mobile',
            'tablet' => 'tablet',
            default => 'desktop',
        };
    }
}
