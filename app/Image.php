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

	public static function image_resize($image_path, $dst, $width, $height, $crop = 0)
	{
		if(!list($w, $h) = getimagesize($image_path)) return "Неподдерживаемый тип изображения!";

		$type = strtolower(substr(strrchr($image_path,"."),1));
		if($type == 'jpeg') $type = 'jpg';
		switch($type){
			case 'bmp': $img = imagecreatefromwbmp($image_path); break;
			case 'gif': $img = imagecreatefromgif($image_path); break;
			case 'jpg': $img = imagecreatefromjpeg($image_path); break;
			case 'png': $img = imagecreatefrompng($image_path); break;
			default : return "Неподдерживаемый тип изображения!";
		}

		// resize
		if($crop){
			if($w < $width or $h < $height) return "Picture is too small!";
			$ratio = max($width/$w, $height/$h);
			$h = $height / $ratio;
			$x = ($w - $width / $ratio) / 2;
			$w = $width / $ratio;
		}
		else{
			if($w < $width and $h < $height) return "Picture is too small!";
			$ratio = min($width/$w, $height/$h);
			$width = $w * $ratio;
			$height = $h * $ratio;
			$x = 0;
		}

		$new = imagecreatetruecolor($width, $height);

		// preserve transparency
		if($type == "gif" or $type == "png"){
			imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
			imagealphablending($new, false);
			imagesavealpha($new, true);
		}

		imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

		switch($type){
			case 'bmp': imagewbmp($new, $dst); break;
			case 'gif': imagegif($new, $dst); break;
			case 'jpg': imagejpeg($new, $dst); break;
			case 'png': imagepng($new, $dst); break;
		}
		return true;


		// задание максимальной ширины и высоты
		$width = 1280;
		$height = 1000;

		// получение новых размеров
		list($width_orig, $height_orig) = getimagesize($filename);
		$ratio_orig = $width_orig/$height_orig;

		if ($width/$height > $ratio_orig) {
			$width = $height*$ratio_orig;
		} else {
			$height = $width/$ratio_orig;
		}

		// ресэмплирование
		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		return $image_p;
	}
}
