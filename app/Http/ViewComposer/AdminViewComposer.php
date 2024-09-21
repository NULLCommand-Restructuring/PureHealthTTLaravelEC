<?php

namespace App\Http\ViewComposer;

use App\Services\ScriptService;
use Illuminate\View\View;

class AdminViewComposer
{
    protected $scriptService;

    public function __construct(ScriptService $scriptService)
    {
        $this->scriptService = $scriptService;
    }

    public function compose(View $view)
    {
        $view->with('adminminilink', $this->scriptService->getAdminMiniLink());
    }
}
