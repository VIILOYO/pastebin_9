<?php

namespace App\Services;

use App\DTO\Paste\PasteData;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class PasteService implements PasteServiceInterface
{

    public function __construct(
        public readonly PasteRepositoryInterface $pasteRepository
    )
    {}

    /**
     * @inheritDoc
     */
    public function savePaste(PasteData $data, ?int $user_id = null): Paste
    {
        $data->url = str_replace(['/', '\\', '|', '$', '%'], '', Hash::make($data->title));
        $data->user_id = $user_id;
        if($data->expiration_time) $data->timeToDelete = Carbon::now()->addMinutes($data->expiration_time);
        return $this->pasteRepository->create($data->toArray());
    }

    /**
     * @inheritDoc
     */
    public function showPaste(string $url): Paste
    {
        return $this->pasteRepository->getPasteByUrl($url);
    }

    /**
     * @inheritDoc
     */
    public function getPastesByUser(int $id): LengthAwarePaginator
    {
        return $this->pasteRepository->pastesPaginate($id);
    }

    /**
     * @inheritDoc
     */
    public function deletePastes(): int
    {
        return $this->pasteRepository->deletePastes();
    }
}
