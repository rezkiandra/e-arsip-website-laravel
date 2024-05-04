<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'name',
    'slug',
    'url',
    'description',
    'logo'
  ];
}
