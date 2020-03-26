<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Storage;
use Image;

class ImageUploadHandler
{
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {       $folder_name = "/uploads/images/$folder/" . date("Ym", time()) . '/' . date("d", time()) . '/';
        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        // 如果上传的不是图片将终止操作
        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }

        //文件上传upyun
        $domain = "http://" . config('filesystems.disks.upyun.domain');
        $file_path = Storage::disk('upyun')->put($folder_name, $file);
        $filename = $domain . "/$file_path";

//        // 如果限制了图片宽度，就进行裁剪
//        if ($max_width && $extension != 'gif') {
//
//            // 此类中封装的函数，用于裁剪图片
//            $this->reduseSize($upload_path . $filename, $max_width);
//        }

        return [
            'path' => $filename
        ];
    }

    public function reduseSize($file_path, $max_width)
    {
        // 先实例化，传参是文件的磁盘物理路径
        $image = Image::make($file_path);

        // 进行大小调整的操作
        $image->resize($max_width, null, function ($constraint) {

            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });

        // 对图片修改后进行保存
        $image->save();
    }
}