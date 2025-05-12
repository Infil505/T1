<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'title', 'edition', 'copyright', 'language', 'pages', 'author_id', 'publisher_id'
    ];
public function autor()
{
    return $this->belongsTo(Autor::class, 'author_id');
}

public function editorial()
{
    return $this->belongsTo(Editorial::class, 'publisher_id');
}
    
}
