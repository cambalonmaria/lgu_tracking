<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejected extends Model
{
    protected $table = 'rejected';
    protected $fillable = [
        'id',
        'transaction_id',
        'from_id',
        'to_id',
        'reason'
    ];
}
