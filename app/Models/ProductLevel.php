<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;

class ProductLevel extends Model
{
    protected $fillable = [
        'course_id',
        'skill_level',
        'skill_level_jp',
        'purpose',
        'purpose_jp',
        'learn_info',
        'learn_info_jp',
        'outcome',
        'outcome_jp',
        'price',
        'price_jp',
        'price_hk',
    ];

    const SKILL_LEVELS = ['Beginner', 'Intermediate', 'Advanced', 'Expert'];

    public function course()
    {
        return $this->belongsTo(Product::class, 'course_id', 'id');
    }

    public function scopeOrdered($query)
    {
        return $query->orderByRaw("FIELD(skill_level,'Beginner','Intermediate','Advanced','Expert')");
    }

    // Returns the japanese column when the site is in japanese, falling back to
    // english when that translation is missing.
    public function localized($field)
    {
        if (App::getLocale() == 'ja' && !empty($this->{$field . '_jp'})) {
            return $this->{$field . '_jp'};
        }
        return $this->{$field};
    }

    public function priceByCurrency($currency = null)
    {
        $currency = $currency ?: session('currency', 'USD');

        if ($currency == 'JPY') {
            return $this->price_jp;
        }
        if ($currency == 'HKD') {
            return $this->price_hk;
        }
        return $this->price;
    }
}
