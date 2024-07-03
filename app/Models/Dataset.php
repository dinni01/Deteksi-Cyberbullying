<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Dataset extends EloquentModel
{
    use HasFactory;

    protected $table = 'datasets';

    protected $fillable = [
        'admin_id', 'text', 'label',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
