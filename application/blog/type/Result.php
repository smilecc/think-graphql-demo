<?php
namespace app\blog\Type;

use \smilecc\think\Support\Types;
use \smilecc\think\Support\ObjectType;

class Result extends ObjectType
{
    /**
     * 类型描述
     *
     * @return array
     */
    public function attrs()
    {
        return [
            'name' => 'ResultType',
            'desc' => '通用返回类型'
        ];
    }

    /**
     * 类型所包含的字段
     *
     * @return array
     */
    public function fields()
    {
        return [
            'code' => Types::int(),
            'message' => Types::string()
        ];
    }
}