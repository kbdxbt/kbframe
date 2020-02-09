<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;

/**
 * Class AbstractRequest 抽象请求类
 * @package App\Http\Requests
 * @author kbdxbt <1194174530@qq.com>
 */
class AbstractRequest extends FormRequest
{
    public $scenes = [];
    public $currentScene;               //当前场景
    public $autoValidate = false;       //是否注入之后自动验证
    public $extendRules;

    public function authorize()
    {
        return true;
    }

    /**
     * 设置场景
     * @param $scene
     * @return $this
     */
    public function scene($scene)
    {
        $this->currentScene = $scene;
        return $this;
    }

    /**
     * 使用扩展rule
     * @param string $name
     * @return AbstractRequest
     */
    public function with($name = '')
    {
        if (is_array($name)) {
            $this->extendRules = array_merge($this->extendRules[], array_map(function ($v) {
                return Str::camel($v);
            }, $name));
        } else if (is_string($name)) {
            $this->extendRules[] = Str::camel($name);
        }

        return $this;
    }

    /**
     * 覆盖自动验证方法
     */
    public function validateResolved()
    {
        if ($this->autoValidate) {
            $this->handleValidate();
        }
    }

    /**
     * 验证方法
     * @param string $scene
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate($scene = '')
    {
        if ($scene) {
            $this->currentScene = $scene;
        }
        $this->handleValidate();
    }

    /**
     * 根据场景获取规则
     * @return array|mixed
     */
    public function getRules()
    {
        $rules = $this->container->call([$this, 'rules']);
        $newRules = [];
        if ($this->extendRules) {
            $extendRules = array_reverse($this->extendRules);
            foreach ($extendRules as $extendRule) {
                if (method_exists($this, "{$extendRule}Rules")) {   //合并场景规则
                    $rules = array_merge($rules, $this->container->call(
                        [$this, "{$extendRule}Rules"]
                    ));
                }
            }
        }
        if ($this->currentScene && isset($this->scenes[$this->currentScene])) {
            $sceneFields = is_array($this->scenes[$this->currentScene])
                ? $this->scenes[$this->currentScene] : explode(',', $this->scenes[$this->currentScene]);
            foreach ($sceneFields as $field) {
                if (array_key_exists($field, $rules)) {
                    $newRules[$field] = $rules[$field];
                }
            }
            return $newRules;
        }
        return $rules;
    }

    /**
     * 覆盖设置 自定义验证器
     * @param $factory
     * @return mixed
     */
    public function validator($factory)
    {
        return $factory->make(
            $this->validationData(), $this->getRules(),
            $this->messages(), $this->attributes()
        );
    }

    /**
     * 最终验证方法
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function handleValidate()
    {
        if (!$this->passesAuthorization()) {
            $this->failedAuthorization();
        }
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            $this->failedValidation($instance);
        }
    }

    // 重写ajax请求验证错误响应格式（防止验证422报错）
    protected function failedValidation(Validator $validator)
    {
        // 此处自定义您想要返回的数据类型
        $data = [
            'code' => FoundationResponse::HTTP_UNPROCESSABLE_ENTITY,
            'msg' => $validator->errors()->first(),
        ];
        $respone = new Response(json_encode($data));
        throw (new ValidationException($validator, $respone))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
