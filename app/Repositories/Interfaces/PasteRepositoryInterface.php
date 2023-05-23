<?php

namespace App\Repositories\Interfaces;

use App\Models\Paste;
use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

interface PasteRepositoryInterface extends RepositoryInterface
{
    /**
     * @param int $user_id
     * @return LengthAwarePaginator
     */
    public function pastesPaginate(int $user_id): LengthAwarePaginator;

    /**
     * @param string $url
     * @return Paste
     */
    public function  getPasteByUrl(string $url): Paste;

    /**
     * @return int
     */
    public function deletePastes(): int;
}
