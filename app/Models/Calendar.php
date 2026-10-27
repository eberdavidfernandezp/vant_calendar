<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendar';
    protected $primaryKey = 'id_calendar';
    public $timestamps = false;

    // Relaciones con las tablas foráneas
    public function date()
    {
        return $this->belongsTo(DateModel::class, 'id_date');
    }

    public function contentType()
    {
        return $this->belongsTo(ContentType::class, 'id_content_type');
    }

    public function socialMedia()
    {
        return $this->belongsTo(SocialMedia::class, 'id_social_m');
    }

    public function feed()
    {
        return $this->belongsTo(Feed::class, 'id_feed');
    }

    public function mediaResource()
    {
        return $this->belongsTo(MediaResource::class, 'id_mr');
    }

    public function copyRecord()
    {
        return $this->belongsTo(CopyRecord::class, 'id_copy');
    }

    public function cta()
    {
        return $this->belongsTo(Cta::class, 'id_cta');
    }

    public function mockup()
    {
        return $this->belongsTo(Mockup::class, 'id_mockup');
    }
}