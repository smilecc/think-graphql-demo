<?php

namespace app\model;

use think\Model;

class Posts extends Model
{
    public function getList($page, $pageSize)
    {
        return $this->page($page, $pageSize)->order('id desc')->select();
    }

    public function savePost($post, $id = null)
    {
        $this->allowField([
            'title',
            'content',
            'author'
        ]);

        if (!empty($id)) {
            return $this->isUpdate(true)->save($post, [ 'id' => $id ]);
        } else {
            $this->isUpdate(false)->save($post);
            return $this->id;
        }
    }
}
