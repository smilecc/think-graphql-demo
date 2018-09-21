<?php
namespace app\blog\type;

use \smilecc\think\Support\Types;
use \smilecc\think\Support\ObjectType;
use \smilecc\think\Support\InputObjectType;

class PostMutation extends ObjectType
{
    /**
     * 类型描述
     *
     * @return array
     */
    public function attrs(): array
    {
        return [
            'name' => 'PostMutationType',
            'desc' => ''
        ];
    }

    /**
     * 类型所包含的字段
     *
     * @return array
     */
    public function fields(): array
    {
        $postInputType = new InputObjectType([
            'name' => 'PostInputType',
            'fields' => [
                'author' => Types::nonNull(Types::string()),
                'title' => [
                    'type' => Types::nonNull(Types::string()),
                    'desc' => '文章标题'
                ],
                'content' => Types::string()
            ]
        ]);
        return [
            'create' => [
                'type' => Types::result('query', [
                    'name' => 'PostCreateResult',
                    'fields' => [
                        'postId' => Types::id()
                    ]
                ]),
                'args' => [
                    'post' => $postInputType
                ]
            ],
            'modify' => [
                'type' => Types::result(),
                'args' => [
                    'id' => Types::nonNull(Types::id()),
                    'post' => $postInputType
                ]
            ]
        ];
    }

    /**
     * 创建文章
     *
     * @param [type] $value
     * @param [type] $args
     * @return array
     */
    public function resolveCreate($value, $args): array
    {
        try {
            $postId = model('Posts')->savePost($args['post']);

            return [
                'code' => 1,
                'message' => 'success',
                'postId' => $postId
            ];
        } catch (\Exception $e) {
            return [
                'code' => 0,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * 创建文章
     *
     * @param [type] $value
     * @param [type] $args
     * @return array
     */
    public function resolveModify($value, $args): array
    {
        try {
            model('Posts')->savePost($args['post'], $args['id']);

            return [
                'code' => 1,
                'message' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                'code' => 0,
                'message' => $e->getMessage()
            ];
        }
    }
}