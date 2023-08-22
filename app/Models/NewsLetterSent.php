<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsLetterSent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message',
        'subject',
    ];

    public function dateFormatFr()
    {
        return Helper::dateFormatFr($this->created_at);
    }

    public function getFormattedDateAttribute()
    {
        $date = Carbon::parse($this->created_at)->setTimezone('UTC');

        return $date->format('d M. Y H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
