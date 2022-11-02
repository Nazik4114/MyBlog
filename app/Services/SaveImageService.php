<?php

namespace App\Services;

use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\Storage;

class SaveImageService
{
    protected $api_url;

    public function setKey(string $api_url)
    {
        $this->api_url = $api_url;
    }

    public function getContent()
    {
        return json_decode(file_get_contents($this->api_url, ), true);
    }

    /**
     * @throws Exception
     */
    public function saveContent(array $contents)
    {
        foreach ($contents["hits"] as $item) {
            $name = bin2hex(random_bytes(8)) . ".jpg";
            $path = "storage/image/" . $name;
            Storage::disk('local')->put('image/' . $name, file_get_contents($item['webformatURL']));
            $img = Image::create([
                'path' => $path,
                'name' => $name,
            ]);
        }

    }
}
