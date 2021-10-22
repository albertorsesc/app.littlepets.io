<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HandlesBase64Images
{
    protected static function bootHandlesBase64Images () {

        if (request()->has('logo')) {
            self::updating(function ($model) {
                $model->syncLogo(request('logo'));
            });
        }

        self::deleting(function ($model) {
            $model->disassociateLogo($model->logo);
        });
    }

    public function processLogo ($image) : string
    {
        $decodedLogo = $this->decodeBase64($image);
        $imagePath = $this->setLogoPath($image);

        Storage::put($imagePath, $decodedLogo);

        return $imagePath;
    }

    protected function decodeBase64 ($image)
    {
        return base64_decode(explode(',', $image)[1]);
    }

    protected function setLogoPath ($image) : string
    {
        $pathToLogo = 'public/' . $this->getClassName();
        $name = $this->getHash('sha256') . '.' . self::getLogoExtension($image);

        return $pathToLogo . '/' . $name;
    }

    public static function getLogoExtension ($image) {

        return explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
    }

    public function syncLogo ($logo, $update = false)
    {
        $image = $logo ?? $this->logo;

        if ($update && ! is_null($image)) {
            $this->deleteLogoFromStorage($image);
        }

        $this->update(['logo' => $this->processLogo($image)]);
    }

    /** Helpers */

    public function disassociateLogo ($image)
    {
        $this->deleteLogoFromStorage($image);

        $this->update(['logo' => null]);
    }

    public function deleteLogoFromStorage ($imagePath)
    {
        Storage::delete($imagePath);
    }

    protected function getHash ($algorithm)
    {
        return substr(hash($algorithm, Str::random(10)), 0, 15);
    }

    public function getLogoName ($image) : string
    {
        return Str::before(str_replace(' ', '_', $image), '.');
    }

    protected function getClassName () : string
    {
        return Str::kebab(Str::plural(strtolower(class_basename($this))));
    }

    protected function setOwner ()
    {


        if ($this->getClassName() === 'clients') {
            return '/' . strtolower($this->prefix);
        }

        if ($this->getClassName() === 'users') {
            return '/' . $this->username;
        }

        if ($this->getClassName() === 'contracts') {
            return '/' . $this->serial;
        }

        return null;
    }

}
