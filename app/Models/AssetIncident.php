<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetIncident extends Model
{
    protected $fillable = [
        "asset_id",
        "incident_id",
        "availability_impact" // TODO Check required fields
    ];

    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class, "incident_id");
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, "asset_id");
    }

    public function availableControls()
    {
        return Control::whereNotIn("id", $this->controls()->pluck("control_id")->toArray())->whereIn("id", ControlThreat::where("incident_id", "=", $this->incident_id)->pluck("control_id")->toArray())->get();
    }

    public function controls()
    {
        return $this->hasMany(AssetThreatControl::class);
    }
}
