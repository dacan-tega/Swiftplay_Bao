<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyPackages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_packages',
        'name_clone',
        'uuid_clone',
        'type_clone',
        'technology_clone',
        'uuid_packages',
        'type_packages',
        'technology_packages',
    ];
}
