<?php
namespace app\blog\type;

use \smilecc\think\Support\Types;
use \smilecc\think\Support\ObjectType;

class Post extends ObjectType
{
    /**
     * 类型描述
     *
     * @return array
     */
    public function attrs()
    {
        return [
            'name' => 'PostType',
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
            'id' => Types::id(),
            'author' => Types::string(),
            'title' => Types::string(),
            'content' => Types::string(),
            'createTime' => Types::string(),
            'updateTime' => [
                'type' => Types::string(),
                'deprecationReason' => '不再使用'
            ]
        ];
    }

    public function fieldsMap()
    {
        return [
            'createTime' => 'create_time',
            'updateTime' => 'update_time'
        ];
    }
}