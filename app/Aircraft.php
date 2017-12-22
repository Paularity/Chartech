<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
  protected $fillable = [
      'product_code', 'name', 'image','description','price','quantity'
  ];
}
