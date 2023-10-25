<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'email',
        'addrcode',
        'addr',
        'builname',
        'content'
    ];

    public function scopeNameSearch($query, $name)
    {
        if (!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
    if (!empty($gender)) {
        $query->where('gender', 'like', '%' . $gender . '%');
    }
    }

    public function scopeEmailSearch($query, $email)
    {
    if (!empty($email)) {
        $query->where('email', 'like', '%' . $email . '%');
    }
    }

    public function scopeDateSearch($query, $from, $to)
    {
    if (!empty($from)) {
        if (!empty($to)) {
            $query->where('created_at', '>', $from)->where('created_at', '<', $to);
        }
        else{
            $query->where('created_at', '>', $from);
        }
    }
    elseif (!empty($to)) {
        $query->where('created_at', '<', $to);
    }
    }

}