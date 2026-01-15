<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class App extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'logo',
        'name',
        'url',
        'status',
        'url_dev',
        'url_local',
        'company'   
    ];

    public function getUrlByEnvironment (): string
    {
        $env = app()->environment();

        return $this->{"url_{$env}"} ?? $this->url;
    }

}
