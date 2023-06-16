<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model{
use HasFactory;
protected $primaryKey = 'categoryId';

protected $fillable = ['itemId','rfid','type','unit','inspector','inspectorComments','inspectionDate','conditionDescription','storage'];
protected $table ='item';
public $timestamps = false;

}
