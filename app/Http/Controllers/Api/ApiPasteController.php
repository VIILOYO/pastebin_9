<?php

namespace App\Http\Controllers\Api;

use App\DTO\Paste\PasteData;
use App\Enums\PasteEnum;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasteCreateRequest;
use App\Http\Resources\PasteCollection;
use App\Http\Resources\PasteResource;
use App\Models\Paste;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Support\Facades\Auth;

class ApiPasteController extends Controller
{
    public function __construct(
        public readonly PasteServiceInterface $pasteService,
    )
    {}

    /**
     * @param PasteCreateRequest $request
     * @return PasteResource
     */
    public function store(PasteCreateRequest $request): PasteResource
    {
        $data = PasteData::create($request);
        $user_id = Auth::id();

        $paste = $this->pasteService->savePaste($data, $user_id);

        return PasteResource::make($paste);
    }

    /**
     * @param string $url
     * @return PasteResource
     */
    public function show(string $url): PasteResource
    {
        /** @var Paste $paste */
        $paste = $this->pasteService->showPaste($url);

        if($paste->access_restriction == PasteEnum::PRIVATE && Auth::id() !== $paste->user_id) {
            throw new NotFoundException();
        };

        return new PasteResource($paste);
    }

    /**
     * @param int $id
     * @return PasteCollection
     */
    public function userPastes(int $id): PasteCollection
    {
        if($id != Auth::id()) {
            throw new NotFoundException();
        };

        $pastes = $this->pasteService->getPastesByUser($id);

        return PasteCollection::make($pastes);
    }
}


