<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "start_timestamp",
        "end_timestamp"
    ];

    public function controls(): BelongsToMany
    {
        return $this->belongsToMany(Control::class);
    }

    public function affectedAssets(): HasMany
    {
        return $this->hasMany(AssetIncident::class, "incident_id");
    }
}
