<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function actionAddToCarts(Request $request)
    {
        return response()->json($this->cartService->handle($request));
    }

    public function actionDeleteProductCarts(Request $request)
    {
        return response()->json($this->cartService->delete($request));
    }
}
