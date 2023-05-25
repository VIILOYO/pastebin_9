<?php

namespace App\Console\Commands;

use App\Services\PasteService;
use Illuminate\Console\Command;

class PasteDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paste:deletePastes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(PasteService $pasteService): int
    {
        return $pasteService->deletePastes();
    }
}
