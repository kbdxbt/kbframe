<?php
namespace App\Http\Requests;

use App\Models\Notify;

/**
 * Class AnnounceRequest 公告请求类
 * @package App\Http\Requests
 * @author kbdxbt <1194174530@qq.com>
 */
class AnnounceRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => ['required', 'max:150'],
            'content' => ['required'],
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => '标题',
            'content' => '消息内容',
            'type' => '消息类型',
            'target_id' => '目标id',
            'target_type' => '目标类型',
            'target_display' => '接受者是否删除',
            'action' => '动作',
            'view' => '浏览量',
            'sender_id' => '发送者id',
            'sender_display' => '发送者是否删除',
            'sender_withdraw' => '是否撤回 0是撤回',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更改时间'
        ];
    }

    /**
     * 填充数据
     * @return array
     */
    public function filldata()
    {
        parent::filldata();

        $this->data = array_merge($this->data, [
            'type' => Notify::TYPE_ANNOUNCE,
            'sender_id' => \Auth::user()->id,
        ]);

        return $this->data;
    }
}
