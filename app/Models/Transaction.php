<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id','transaction_code','fullname','contact_number', 'email_address', 'address', 'title', 'destination', 'purpose', 'short_description', 'last_visited_at', 'status', 'created_at', 'updated_at','from_id','rejection_reason'
    ];
}