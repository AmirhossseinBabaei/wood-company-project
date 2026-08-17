<?php

declare(strict_types=1);

namespace Modules\Project\app\Http\Services\Inquiry\Drivers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Project\app\Http\Services\Inquiry\Interfaces\FileUploadable;

final class ImageUploaderService implements FileUploadable
{
    /**
     * @param UploadedFile $uploadedImage
     * @param string $path
     * @param string $disk
     * @return string
     */
    public function upload(UploadedFile $uploadedImage, string $path, string $disk): string
    {
        return $uploadedImage
            ->store($path, $disk);
    }

    /**
     * @param string $path
     * @param string $disk
     * @return bool
     */
    public function destroy(string $path, string $disk): bool
    {
        if(Storage::exists($path)){
            Storage::delete($path);

            return true;
        }

        return false;
    }
}
