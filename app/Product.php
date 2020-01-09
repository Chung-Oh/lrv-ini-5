<?php

namespace App;

use App\Scopes\ActivatedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['title', 'description', 'activated'];
    protected $hidden = ['title'];
    protected $appends = ['resume_title'];
    protected $casts = ['created_at' => 'datetime:d/m/Y H:00'];

    /**
     * Events
     */
    protected $dispatchesEvents = [
        'created' => \App\Events\ProductsCreated::class,
        'creating' => \App\Events\ProductsCreating::class
    ];

    /**
     * Faz retornar apenas com propriedade ativa.
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActivatedScope);
        // static::addGlobalScope('isActivated', function (Builder $builder) {
        //     $builder->where('activated', 1);
        // });
    }

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
