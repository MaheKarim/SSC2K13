<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'action',
        'subject_type',
        'subject_id',
        'description',
        'properties',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'properties' => 'array',
        ];
    }

    /**
     * Get the admin who performed this activity.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Log an admin activity.
     */
    public static function log(
        string $action,
        string $subjectType,
        ?int $subjectId = null,
        string $description = '',
        ?array $properties = null
    ): self {
        return static::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => $action,
            'subject_type' => $subjectType,
            'subject_id' => $subjectId,
            'description' => $description,
            'properties' => $properties,
            'ip_address' => Request::ip(),
        ]);
    }

    /**
     * Scope: filter by admin.
     */
    public function scopeForAdmin($query, $adminId)
    {
        return $query->where('admin_id', $adminId);
    }

    /**
     * Scope: filter by action.
     */
    public function scopeForAction($query, $action)
    {
        return $query->where('action', $action);
    }

    /**
     * Scope: filter by subject type.
     */
    public function scopeForSubject($query, $subjectType)
    {
        return $query->where('subject_type', $subjectType);
    }

    /**
     * Get the action badge color class.
     */
    public function getActionColorAttribute(): string
    {
        return match ($this->action) {
            'created' => 'bg-emerald-50 text-emerald-700',
            'updated' => 'bg-blue-50 text-blue-700',
            'deleted' => 'bg-red-50 text-red-700',
            'verified' => 'bg-violet-50 text-violet-700',
            'toggled' => 'bg-amber-50 text-amber-700',
            'exported' => 'bg-cyan-50 text-cyan-700',
            default => 'bg-gray-50 text-gray-700',
        };
    }

    /**
     * Get the action dot color class.
     */
    public function getActionDotColorAttribute(): string
    {
        return match ($this->action) {
            'created' => 'bg-emerald-500',
            'updated' => 'bg-blue-500',
            'deleted' => 'bg-red-500',
            'verified' => 'bg-violet-500',
            'toggled' => 'bg-amber-500',
            'exported' => 'bg-cyan-500',
            default => 'bg-gray-500',
        };
    }

    /**
     * Get human-readable action label.
     */
    public function getActionLabelAttribute(): string
    {
        return ucfirst($this->action);
    }

    /**
     * Get the subject type icon SVG path.
     */
    public function getSubjectIconAttribute(): string
    {
        return match ($this->subject_type) {
            'Donation' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
            'PhoneNumber' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
            'JerseySize' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
            'SiteSetting' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
            default => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        };
    }

    /**
     * Get human-readable subject type label.
     */
    public function getSubjectLabelAttribute(): string
    {
        return match ($this->subject_type) {
            'Donation' => 'Registration',
            'PhoneNumber' => 'Phone Number',
            'JerseySize' => 'Jersey Size',
            'SiteSetting' => 'Site Setting',
            default => $this->subject_type,
        };
    }
}
