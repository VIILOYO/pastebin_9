<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PasteRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Paste;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PasteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PasteRepositoryEloquent extends BaseRepository implements PasteRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Paste::class;
    }

    /**
     * @inheritDoc
     */
    public function pastesPaginate(int $user_id): LengthAwarePaginator
    {
        return $this->getModel()->where('user_id', $user_id)->paginate();
    }

    /**
     * @inheritDoc
     */
    public function  getPasteByUrl(string $url): Paste
    {
        return $this->getModel()->where('url', $url)->firstOrFail();
    }
}
