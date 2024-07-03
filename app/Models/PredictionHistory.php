<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'input_text',
        'preprocessed_text',
        'prediction_result',
    ];

    // Relationship with Model (assuming Model is the name of your Model model)
    public function model()
    {
        return $this->belongsTo(Model::class);
    }
}
