<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;

    protected $fillable = ['name', 'uid'];

    public function parent()
    {
        return $this->belongsTo(Member::class, 'uid');
    }

    // Define the relationship to get child members
    public function children()
    {
        return $this->hasMany(Member::class, 'uid');
    }
}
