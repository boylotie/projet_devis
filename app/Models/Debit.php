<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nom', 'montant', 'motif', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
