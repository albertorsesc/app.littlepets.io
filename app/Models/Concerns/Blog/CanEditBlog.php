<?php

namespace App\Models\Concerns\Blog;

trait CanEditBlog
{
    public function isEditor() : bool
    {
        return in_array(
            $this->email,
            config('littlepets.roles.editor')
        );
    }

    public function canEditBlog () : bool
    {
        return $this->isEditor() || $this->isRoot();
    }
}
