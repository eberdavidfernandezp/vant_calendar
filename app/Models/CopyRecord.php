<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CopyRecord extends Model {
    protected $table = 'copy';
    protected $primaryKey = 'id_copy';
    public $timestamps = false;
}