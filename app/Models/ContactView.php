<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactView extends Model
{
    use HasFactory;

    protected $fillable = ['contact_id', 'view_date', 'views'];

    // Relationship: Each view record belongs to one contact
    public function contact(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
