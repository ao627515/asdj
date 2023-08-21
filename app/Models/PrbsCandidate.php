<?php

namespace App\Models;

use App\Models\Choice;
use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrbsCandidate extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'funding_difficulties',
        'last_name',
        'first_names',
        'gender',
        'birthplace',
        'birth_date',
        'nationality',
        'id_document_number',
        'id_document_date',
        'residence_city',
        'residence_district',
        'phone',
        'email',
        'status',
        'inscription_date',
        'has_scholarship',
        'user_id'
    ];

    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }

    public function dateFormatFr(string $date)
    {
        return Helper::dateFormatFr($date);
    }
}
