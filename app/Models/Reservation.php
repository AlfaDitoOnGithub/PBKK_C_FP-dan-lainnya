<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'tel_number', 'res_date', 'table_id', 'guest_number', 'user_id'];

    protected $casts = [
        'res_date' => 'datetime'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
