<?php

namespace App\Http\Controllers;

use App\DTO\Paste\PasteData;
use App\Enums\PasteEnum;
use App\Http\Requests\PasteCreateRequest;
use App\Models\Paste;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class PasteController extends Controller
{
    public function __construct(
        public readonly PasteServiceInterface $pasteService,
    )
    {}

    /**
     * @return View
     */
    public function create(): View
    {
        return view('paste.create');
    }

    /**
     * @param PasteCreateRequest $request
     * @return RedirectResponse
     */
    public function store(PasteCreateRequest $request): RedirectResponse
    {
        $data = PasteData::create($request);
        $user_id = Auth::id();

        $paste = $this->pasteService->savePaste($data, $user_id);

        return redirect()->route('pastes.show', $paste->url);
    }

    /**
     * @param string $url
     * @return View|RedirectResponse
     */
    public function show(string $url): View|RedirectResponse
    {
        /** @var Paste $paste */
        $paste = $this->pasteService->showPaste($url);

        if($paste->access_restriction === PasteEnum::PRIVATE && Auth::id() !== $paste->user_id) {
            return redirect()->back();
        };

        return view('paste.show', compact('paste'));
    }

    /**
     * @param int $id
     * @return View|RedirectResponse
     */
    public function userPastes(int $id): View|RedirectResponse
    {
        if($id != Auth::id()) {
            return redirect()->back();
        };

        $pastes = $this->pasteService->getPastesByUser($id);

        return view('paste.index', compact('pastes'));
    }
}
