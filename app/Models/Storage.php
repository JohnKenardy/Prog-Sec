<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Storage extends Model{
use HasFactory;
protected $primaryKey = 'storageId';

protected $fillable = ['storageId','locationName','locationAddress,locationDescription'];
protected $table = 'storage';
public $timestamps = false;

}
