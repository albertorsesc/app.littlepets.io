<?php

namespace App\Models\Concerns;

use phpDocumentor\Reflection\Types\Boolean;

trait HasAvatar
{
    public function getGravatar() : string
    {
        $gravatarUrl = 'https://www.gravatar.com/avatar/';
        $email = md5(strtolower(trim($this->email)));
        $gravatar = $gravatarUrl . $email;

        return $gravatar . '?d=' . $this->getDefaultAvatar();
    }

    public function getDefaultAvatar() : string
    {
        return 'https%3A%2F%2Fui-avatars.com%2Fapi%2Fname=' .
            urlencode($this->first_name . '+' . $this->last_name) .
            '%26background=EBF4FF%26color=7F9CF5';
    }

    public function getAvatar()
    {
        $profilePhoto = $this->profile_photo_path;
        if (! is_null($profilePhoto)) {
            if ($this->isExternalImage($profilePhoto)) {
                return $profilePhoto;
            }
            return \Storage::url($this->profile_photo_path);
        }

        return $this->getGravatar();
    }

    public function isExternalImage (string $image): bool
    {
        return str_contains($image, 'https://');
    }
}
