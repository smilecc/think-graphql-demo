<?php

return [
    // 类型注册表
    'types' => [
        'blog' => [
            'query' => app\blog\QueryType::class,
            'mutation' => app\blog\MutationType::class
        ],
        'post' => [
            'query' => app\blog\type\Post::class,
            'mutation' => app\blog\type\PostMutation::class
        ],
        'result' => app\blog\type\Result::class
    ],
    // 入口类型
    'schema' => [
        'blog'
    ],
    // 中间件
    'middleware' => [],
    // 路由前缀
    'routePrefix' => 'api/'
];
