<?php
namespace app\blog;

use \smilecc\think\Support\Types;
use \smilecc\think\Support\ObjectType;

class MutationType extends ObjectType
{
    /**
     * 类型描述
     *
     * @return array
     */
    public function attrs()
    {
        return [
            'name' => 'BlogMutationType',
            'desc' => ''
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
            'post' => [
                'type' => Types::post('mutation')
            ]
        ];
    }

    public function resolveField()
    {
        return [];
    }
}