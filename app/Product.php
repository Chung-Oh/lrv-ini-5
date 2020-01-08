<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['title', 'description'];
    protected $appends = ['resume_title'];
    protected $casts = ['created_at' => 'datetime:d/m/Y H:00'];

    /**
     * ACCESSOR
     * Get the title upper case.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * ACCESSOR
     * Get the resume title.
     *
     * @param  string  $value
     * @return string
     */
    public function getResumeTitleAttribute($value)
    {
        if (isset($this->attributes['title'][20])) {
            return mb_substr($this->attributes['title'], 0, 20) . '...';
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
