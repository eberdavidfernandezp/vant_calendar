<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MediaResource extends Model {
    protected $table = 'media_resource';
    protected $primaryKey = 'id_mr';
    public $timestamps = false;
}