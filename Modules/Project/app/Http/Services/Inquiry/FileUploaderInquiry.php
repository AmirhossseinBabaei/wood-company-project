<?php

declare(strict_types=1);

namespace Modules\Project\app\Http\Services\Inquiry;

use Illuminate\Http\UploadedFile;
use Modules\Project\app\Http\Services\Inquiry\Interfaces\FileUploadable;

final class FileUploaderInquiry
{
    public function __construct(public FileUploadable $uploadClass)
    {
    }

    public function upload(UploadedFile $uploadedImage, string $path, string $disk)
    {
        return $this->uploadClass->upload($uploadedImage, $path, $disk);
    }

    /**
     * @param string $path
     * @param string $disk
     * @return bool
     */
    public function destroy(string $path, string $disk): bool
    {
        return $this->uploadClass->destroy($path, $disk);
    }
}
