<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model{
use HasFactory;
protected $primaryKey = 'rankId';

protected $fillable = ['rankId','title'];
public $table ='rank';
public $timestamps = false;

}
