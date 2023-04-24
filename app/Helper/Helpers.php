<?php

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;


if (!function_exists('PostImageHelper')) {
    function PostImageHelper($url, $image, $path, $x = 300, $y = null)
    {
        if (strlen($image) < 255) {
            return $image;
        }

        $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image, 0, strpos($image, ',') + 1);
        $imageConvert = str_replace($replace, '', $image);
        $imageConvert = str_replace(' ', '+', $imageConvert);

        $imageName = $url . '_' . time() . '.' . $extension;
        Storage::disk('public')->put('/images/' . $path . '/' . $imageName, base64_decode($imageConvert));
        $imageUrl =  '/images/' . $path . '/' . $imageName;

        return $imageUrl;
    }
}


if (!function_exists('base64_image_resize')) {
    function base64_image_resize($fileName, $image, $path, $x = null, $y = null, bool $useOriginal = false)
    {
        if (strlen($image) < 255) {
            return $image;
        }
        $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];   // .jpg .png .pdf
        $fileNameForSaving = Str::slug($fileName) . '-' . $x . 'x' . $y . '.' . $extension;
        $replace = substr($image, 0, strpos($image, ',') + 1);
        $imageConvert = str_replace($replace, '', $image);
        $imageConvert = str_replace(' ', '+', $imageConvert);
        $destinationPath = public_path('/images/' . $path);
        $img = Image::make(base64_decode($imageConvert));
        File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
        if ($useOriginal) {
            $img->save($destinationPath . '/' . $fileNameForSaving);
        } else {
            $img->resize($x, $y, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileNameForSaving);
        }
        $slug = '/images/' . $path . '/' . $fileNameForSaving;
        return $slug;
    }
}

if (!function_exists('url_image_resize')) {
    function url_image_resize($fileName, $folderName,  $imageUrl, $x = 1280, $y = null)
    {
        $destinationPath = public_path('/images/file-manager/' . $folderName);
        $image = (string) Image::make($imageUrl)->encode('data-url');
        $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        $fileNameForSaving = Str::slug($fileName) . '-' . $x . 'x' . $y . '.' . $extension;
        File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
        $thumbImage = Image::make($image)->resize($x, $y, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $fileNameForSaving);
        $slug = '/images/file-manager/' . $folderName . '/' . $fileNameForSaving;
        return $slug;
    }
}

/**
 * Get Json File with a path name
 *
 *  @param string $name
 *  @return null|string
 */
if (!function_exists('getJsonFile')) {
    function getJsonFile(string $path)
    {
        $file =  File::get(base_path($path));
        return json_decode($file, JSON_OBJECT_AS_ARRAY);
    }
}

/**
 * Get Json File with a path name
 *
 *  @param string $name
 *  @return null|string
 */
if (!function_exists('uploadImage')) {
    function uploadImage(UploadedFile $image, string $path, $imageName = null)
    {
        $extension = $image->getClientOriginalExtension();
        $imageName = $imageName ?? uniqid();
        $fileName = $imageName . '.' . $extension;
        Storage::disk('public')->putFileAs('images/' . $path, $image, $fileName);
        $imageUrl =  env('APP_URL') . '/images/' . $path . '/' . $fileName;
        return [
            'image_url' => $imageUrl,
            'image_type' => $extension
        ];
    }
}

/**
 *dd
 *
 *  @param string $name
 *  @return null|string
 */
if (!function_exists('da')) {
    function da($data)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        dd($data);
    }

}

