<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'gender',
        'salary'
    ];

    public $timestamps = false;

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }
}
