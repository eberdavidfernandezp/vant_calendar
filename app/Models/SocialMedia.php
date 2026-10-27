<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model {
    protected $table = 'social_media';
    protected $primaryKey = 'id_sm';
    public $timestamps = false;
}