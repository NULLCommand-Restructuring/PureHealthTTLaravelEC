<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Customer;
use App\Services\CustomerService;
use App\Services\ScriptService;

class CustomerViewComposer
{
    protected $customerService;
    protected $scriptService;

    public function __construct(CustomerService $customerService, ScriptService $scriptService)
    {
        $this->customerService = $customerService;
        $this->scriptService = $scriptService;
    }

    public function compose(View $view)
    {
        $allType = $this->customerService->getAllType();
        $view->with('types', $allType);
        $view->with([
            'poelink' => $this->scriptService->getPoeLink(),
            'chatboxlink' => $this->scriptService->getChatBoxLink(),
            'minilink' => $this->scriptService->getCustomerMiniLink(),
        ]);
    }
}
