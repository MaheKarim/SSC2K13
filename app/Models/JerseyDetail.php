<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JerseyDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    public function size()
    {
        return $this->belongsTo(JerseySize::class, 'size_id');
    }
}
