<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'events';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'link',
        'image',
        'slug',
    ];

    /**
     * Automatically cast attributes to their respective data types.
     */
    protected $casts = [
        'date' => 'datetime', // Automatically converts to a Carbon instance
        'time' => 'string',
    ];

    /**
     * Boot function to set UUID and slug automatically.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate UUID when creating a new event
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });

        // Automatically generate slug when updating title
        static::saving(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    /**
     * Set the title and slug attributes automatically.
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the full URL for the event's image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('default-event.jpg'); // Default image
    }

    /**
     * Get the formatted date for the event.
     *
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return $this->date ? $this->date->format('F j, Y') : null;
    }
}
