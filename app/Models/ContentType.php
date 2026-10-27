<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    protected $table = 'content_type';
    protected $primaryKey = 'id_type';
    public $timestamps = false;
}