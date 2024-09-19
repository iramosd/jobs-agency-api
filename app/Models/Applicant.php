<?php

namespace App\Models;

use App\Enum\ApplicantStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Applicant extends Authenticatable implements HasMedia
{
    use HasFactory, HasRoles, InteractsWithMedia, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'status',
        ];
    protected $casts = [
       'status' => ApplicantStatusEnum::class
    ];

    protected $appends = ['full_name'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('cv')
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ])
            ->singleFile();
        $this
            ->addMediaCollection('profile-photo')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/heic'])
            ->useFallbackUrl('/images/anonymous-user.png')
            ->useFallbackPath(public_path('/images/anonymous-user.png'))
            ->singleFile();;
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, ApplicantSkill::class);
    }
}
