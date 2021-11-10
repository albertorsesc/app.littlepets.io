<?php

namespace App\Models\Concerns;

trait Shareable
{
    public function shareOnFacebook() : string
    {
        return 'https://www.facebook.com/sharer/sharer.php?u=' . url($this->profile());
    }
}
