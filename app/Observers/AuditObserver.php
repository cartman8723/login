<?php

namespace App\Observers;

use OwenIt\Auditing\Models\Audit;

class AuditObserver
{
    public function creating(Audit $audit)
    {
        $audit->tags ='Auth - Conectia';
    }
}  
