<?php

namespace App\Actions;

use App\Contracts\ResizeImageContract;
use App\Models\Image;
use function Tinify\fromFile;
use function Tinify\setKey;

class ResizeImageAction implements ResizeImageContract
{
    public function __invoke($tinify_key): void
    {
        $images = Image::all();
        foreach ($images as $image) {
            setKey($tinify_key);
            $resize = fromFile("storage/app/public/image/" . $image->name);
            $result = $resize->resize(array(
                "method" => "cover",
                "width" => 360,
                "height" => 320
            ));
            $resPath = "storage/" . $image->name;
            $result->toFile("storage/app/public/" . $image->name);

            unlink("storage/app/public/image/".$image->name);

            $img = Image::find($image->id);

            $img->update([
                'path' => $resPath,
                'name' => $image->name,
            ]);
        }
    }
}
