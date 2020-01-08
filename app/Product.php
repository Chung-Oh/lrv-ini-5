<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['title', 'description'];

    /**
     * ACCESSOR
     * Get the title upper case.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        if (isset($this->attributes['title'][3])) {
            return mb_substr($this->attributes['title'], 0, 3) . '...';
        }

        return $this->attributes['title'];
    }

    /**
     * MUTATOR
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }
}
