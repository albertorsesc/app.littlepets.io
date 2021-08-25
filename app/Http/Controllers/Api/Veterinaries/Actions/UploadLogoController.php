<?php

namespace App\Http\Controllers\Api\Veterinaries\Actions;

use App\Http\Controllers\Controller;
use App\Models\Concerns\InterventionImage\Filters\MediumFilter;
use App\Models\Concerns\InterventionImage\Filters\SmallFilter;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadLogoController extends Controller
{
    public function __invoke (Request $request, Veterinary $veterinary)
    {
        $file = $request->file('logo');
        $logoName = Str::random(40)  . '.' . $file->extension();

        if (app()->environment('production')) {
            $this->uploadToS3($file, $veterinary);
        } else {
            $this->uploadToStorage($file, $veterinary, $logoName);
        }

        return response()->redirectTo(route('web.veterinaries.show', $veterinary));
    }

    protected function uploadToS3(UploadedFile $file, $veterinary)
    {
        if (isset($veterinary->logo)) {
            Storage::disk('s3')->delete(
                Str::after($veterinary->logo, '.com')
            );
        }

        $path = Str::slug(class_basename($this)) . '/' . Str::random(40)  . '.' . $file->extension();
        $img = Image::make($file)->filter(new SmallFilter())->stream()->__toString();
        Storage::disk('s3')->put($path, $img, 'public');

        $veterinary->update(['logo' => Storage::disk('s3')->url($path)]);
    }

    protected function uploadToStorage(UploadedFile $file, $veterinary, $logoName)
    {
        if (isset($veterinary->logo)) {
            \Storage::delete($veterinary->logo);
            $veterinary->update(['logo' => null]);
        }

        $path = '/public/' . Str::slug(class_basename($veterinary)) . '/';

        try {
            \Storage::putFileAs($path, $file, $logoName);

            $veterinary->update(['logo' => $path . $logoName]);
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return response()
                ->redirectTo(route('web.veterinaries.show', $veterinary))
                ->withErrors(['logo' => 'Ocurrió un error al guardar el archivo, intente utilizar otra imagen.']);
        }
    }
}
