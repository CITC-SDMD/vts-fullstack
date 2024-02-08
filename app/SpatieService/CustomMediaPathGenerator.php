<?php

namespace App\SpatieService;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomMediaPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $path = $this->filePath();

        return $path;
    }

    public function getPathForConversions(Media $media): string
    {
        $path = $this->filePath();

        return $path . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        $path = $this->filePath();

        return $path . 'responsive-images/';
    }

    private function filePath()
    {

        return "vts/client/";
    }
}
