<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_m extends Model
{
    use HasFactory;
    protected $table = "payments";
    protected $primaryKey = "id";
    protected $guarded=[];

    public function payment()
    {
        return $this->hasMany(Payment_m::class);
    }
}
