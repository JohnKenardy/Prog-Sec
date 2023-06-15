<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model{
use HasFactory;
protected $primaryKey = 'typeId';

protected $fillable = ['typeId','category','description'];
protected $table = 'type';
public $timestamps = false;

}
