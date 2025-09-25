<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use DateTimeZone; 

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image_path', 
        'category_id',  
    ];
    
    public function getCreatedAtAttribute($value): Carbon
    {
    
        $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        
       
        return $carbon->setTimezone(config('app.timezone') ?? 'Europe/Berlin');
    }

 
    public function getUpdatedAtAttribute($value): Carbon
    {
       
        $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        
        return $carbon->setTimezone(config('app.timezone') ?? 'Europe/Berlin');
    }

 
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}