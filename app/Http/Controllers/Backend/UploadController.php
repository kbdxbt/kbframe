<?php

namespace App\Http\Controllers\Backend;

use App\Common\Enums\UploadEnum;
use Illuminate\Http\Request;
use App\Helpers\UploadHelper;
use Illuminate\Support\Facades\Storage;

/**
 * Class UploadController 上传控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class UploadController extends BaseController
{
    /**
     * 图片上传
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \League\Flysystem\FileExistsException
     * @throws \League\Flysystem\FileNotFoundException
     * ps:本地上传请先设置storage软连接到public
     */
    public function images(Request $request)
    {
        $upload = new UploadHelper($request->file(), UploadEnum::UPLOAD_TYPE_IMAGES);
        $upload->verifyFile();
        $upload->save();

        return $this->success($upload->getBaseInfo());
    }

    /**
     * 视频上传
     * @return array
     * @throws \League\Flysystem\FileExistsException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function videos(Request $request)
    {
        $upload = new UploadHelper($request->file(), UploadEnum::UPLOAD_TYPE_VIDEOS);
        $upload->verifyFile();
        $upload->save();

        return $this->success($upload->getBaseInfo());
    }


    /**
     * 语音上传
     * @return array
     * @throws NotFoundHttpException
     * @throws \League\Flysystem\FileExistsException
     * @throws \Exception
     */
    public function voices(Request $request)
    {
        $upload = new UploadHelper($request->file(), UploadEnum::UPLOAD_TYPE_VOICES);
        $upload->verifyFile();
        $upload->save();

        return $this->success($upload->getBaseInfo());
    }

    /**
     * 文件上传
     * @return array
     * @throws NotFoundHttpException
     * @throws \League\Flysystem\FileExistsException
     * @throws \Exception
     */
    public function files(Request $request)
    {
        $upload = new UploadHelper($request->file(), UploadEnum::UPLOAD_TYPE_FILES);
        $upload->verifyFile();
        $upload->save();

        return $this->success($upload->getBaseInfo());
    }

    /**
     * base64编码的图片上传
     * @return array
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function base64(Request $request)
    {
        // 保存扩展名称
        $extend = $request->post('extend', 'jpg');
        !in_array($extend, config('filesystems.uploadConfig.images.extensions')) && $extend = 'jpg';
        $data = $request->post('image', '');

        $upload = new UploadHelper($request->post(), UploadEnum::UPLOAD_TYPE_IMAGES);
        $upload->verifyBase64($data, $extend);
        $upload->save(base64_decode($data));

        return $this->success($upload->getBaseInfo());
    }
}
