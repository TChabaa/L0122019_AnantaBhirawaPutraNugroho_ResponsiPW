<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_title',
        'event_description',
        'event_time',
        'organizer_name',
        'event_type',
        'event_location',
        'event_link',
        'payment_status',
        'event_price',
        // 'event_img'
    ];

    public function setEventLinkAttribute($value)
    {
        $this->attributes['event_link'] = $this->attributes['event_type'] === 'webinar' ? $value : null;
    }

    public function setEventLocationAttribute($value)
    {
        $this->attributes['event_location'] = $this->attributes['event_type'] === 'seminar' ? $value : null;
    }

    public function setEventPriceAttribute($value)
    {
        $this->attributes['event_price'] = $this->attributes['payment_status'] === 'free' ? "FREE" : $value;
    }


}