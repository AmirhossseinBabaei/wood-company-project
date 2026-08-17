<?php

declare(strict_types=1);

namespace Modules\Project\app\Http\Services\Inquiry\Interfaces;

use Illuminate\Http\UploadedFile;

interface FileUploadable{
    /**
     * @param UploadedFile $uploadedImage
     * @param string $path
     * @param string $disk
     * @return string
     */
    public function upload(UploadedFile $uploadedImage, string $path, string $disk): string;

    /**
     * @param string $path
     * @param string $disk
     * @return bool
     */
    public function destroy(string $path, string $disk): bool;
}
