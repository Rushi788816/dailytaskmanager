<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'campaign_name',
        'client_email_id',
        'keyword',
        'lead_generated_date',
    ];


    /**
     * Get the campaign that owns the lead.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
