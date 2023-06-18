<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model{
use HasFactory;
protected $primaryKey = 'unitId';

protected $fillable = ['unitId','name','location'];
protected $table ='unit';
public $timestamps = false;

}
