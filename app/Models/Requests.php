<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Requests extends Model {
    protected $fillable = [
        'name',
        'goal',
        'email',
        'company_name',
        'website',
        'employees',
        'location',
        'phone',
        'challenge',
        'comments'
    ];
    protected $casts = [
        'employees' => 'integer'
    ];
}