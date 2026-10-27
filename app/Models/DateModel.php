<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DateModel extends Model {
    protected $table = 'date';
    protected $primaryKey = 'id_date';
    public $timestamps = false;
}