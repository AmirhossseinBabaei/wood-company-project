<?php

declare(strict_types=1);

namespace App\Models\Repositories;

use App\Models\Blog;

class BlogRepo implements RepositoryInterface
{
    public function query()
    {
        return Blog::query();
    }

    public function all()
    {
        return $this
            ->query()
            ->get()
            ->all();
    }

    public function getOneById(int $id)
    {
        return $this
            ->query()
            ->findOrFail($id);
    }

    public function delete(int $id)
    {
        return $this
            ->query()
            ->find($id)
            ->delete();
    }
}
