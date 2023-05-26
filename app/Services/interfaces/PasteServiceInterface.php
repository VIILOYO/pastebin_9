<?php

namespace App\Services\interfaces;

use App\DTO\Paste\PasteData;
use App\Models\Paste;
use Illuminate\Pagination\LengthAwarePaginator;
interface PasteServiceInterface
{
    /**
     * @param PasteData $data
     * @param int|null $user_id
     * @return Paste
     */
    public function savePaste(PasteData $data, ?int $user_id = null): Paste;

    /**
     * @param string $url
     * @return Paste
     */
    public function showPaste(string $url): Paste;

    /**
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function getPastesByUser(int $id): LengthAwarePaginator;

    /**
     * @return int
     */
    public function deletePastes(): int;
}
