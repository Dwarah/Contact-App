<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\SearchScope;

class Company extends Model
{
    use HasFactory;
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public static function boot()
    {
        parent::boot();
        
        static::addGlobalScope(new SearchScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userCompanies()
    {
        return self::where('user_id', auth()->id())->orderBy('name')->pluck('name', 'id')->prepend('All companies');
    }

    use HasFactory;
    protected $fillable=['name','address','website','email'];
    
    public $filterColumns = ['company_id'];

    public $searchColumns = ['name','address', 'website','email'];
    
    public function company()
    {
       return $this->belongsTo(Contacts::class);
    }
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }
}
