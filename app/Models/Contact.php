<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['first_name','last_name','email','phone','address','company_id','user_id'];
    
    public $filterColumns = ['company_id'];

    public $searchColumns = ['first_name','last_name','email','company.name'];
    
    public function company()
    {
       return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }
}
