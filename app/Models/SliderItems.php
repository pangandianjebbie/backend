<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderItems extends Model
{
    use HasFactory;

    protected $table = 'slider_items';

    protected $primaryKey = 'slider_item_id';
 
    protected $fillable = [
        'slider_name',
        'image_path',
        'description',
        'user_id',
    ];
}
