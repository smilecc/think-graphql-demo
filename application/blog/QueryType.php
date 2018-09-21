<?php
namespace app\blog;

use \smilecc\think\Support\Types;
use \smilecc\think\Support\ObjectType;

class QueryType extends ObjectType
{
    /**
     * 类型描述
     *
     * @return array
     */
    public function attrs()
    {
        return [
            'name' => 'BlogQueryType',
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
            'posts' => [
                'type' => Types::listOf(Types::post()),
                'args' => [
                    'page' => [
                        'type' => Types::int(),
                        'desc' => '页码',
                        'defaultValue' => 1
                    ],
                    'pageSize' => [
                        'type' => Types::int(),
                        'defaultValue' => 20
                    ]
                ]
            ]
        ];
    }

    public function resolvePosts($value, $args, $context, $info)
    {
        return model('Posts')->getList($args['page'], $args['pageSize'])->toArray();
    }
}
