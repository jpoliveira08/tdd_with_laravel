<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
     * Enable mass assignment for all the fields
     *
     * @var array
     */
    protected $guarded = [];
}
