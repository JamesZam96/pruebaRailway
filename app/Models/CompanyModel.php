<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
