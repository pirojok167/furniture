<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public static function destroyImage($image)
	{
		if(\Storage::disk('images')->exists($image)) {
			\Storage::disk('images')->delete($image);
			return true;
		}
		return false;
	}

	public static function getDeleteAllImages($id)
	{
		$directory = '/makings/'.$id;
		$result = (\Storage::disk('images')->has($directory)) ? \Storage::disk('images')->deleteDirectory($directory) : false;
		if ($result) {
			$result = 'Изображения удалены';
		} else {
			$result = 'Ошибка';
		}
		return $result;
	}

	public static function saveImage($request, $dir, $id = false) {
		if($request->hasFile('image') || $request->hasFile('image_1') || $request->hasFile('image_2')) {
			$file = $request->file('image') ?? $request->file('image_1') ?? $request->file('image_2');

				$validator = \Validator::make($request->all(), [
					'image' => 'image',
					'image_1' => 'image',
					'image_2' => 'image',
				]);

				if ($validator->fails()) return ['error' => 'Изображения должны быть с расширением gif, jpeg (jpg) или png'];

				$image = \Storage::disk('images')->putFile($dir, $file);
				return $image;
			}
		return ['errors' => 'Вы не выбрали изображение'];
	}

	public static function saveImages($request, $dir, $id)
	{
		$files = $request->file('images');
		if (is_array($files)) {
			foreach ($files as $file) {
				$mimeType = $file->getMimeType();
				if (($mimeType === "image/gif") || ($mimeType === "image/png") || ($mimeType === "image/jpeg"))
				{
					if ($file->isValid())
						\Storage::disk('images')->putFile("$dir/$id", $file);
					$result = 'Изделие добавлено';
				} else {
					$result = ['error' => 'Изображения должны быть с расширением gif, jpeg (jpg) или png'];
				}
			}
		} else {
			$result = ['error' => 'Ошибка добавления изображений'];
		}
		return $result;
	}
	public static function getImage($id)
	{
		$files = \Storage::disk('images')->files('/makings/'.$id);
		$file = $files[0] ?? config('settings.no_image');
		return $file;
	}
	public static function getImages($id)
	{
		$files = \Storage::disk('images')->files('/makings/'.$id);
		!empty($files) ?: $files[] = config('settings.no_image');
		return $files;
	}
}
