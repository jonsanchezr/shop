<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SettingTopmenu;


class CartController extends Controller
{

    public function cart()
    {
        $cartNow = [];
        $i = 0;
        foreach (session('products') as $product) {
            $cartNow[$i] = (int)$product['id'];
            $i++;
        }
        $products = Product::whereIn('id', $cartNow)->get();
        $productLike = Product::with('category')->inRandomOrder()->take(4)->get();
        $activeTopMenu = 'cart'; 

        $arg = [
            'products' => $products,
            'productLike' => $productLike,
            'activeTopMenu' => $activeTopMenu
        ];

        return $this->responseViewPublic('index.cart', $arg);
    }

    public function addCart(Request $request, $id)
    {
        $cartNow = [];
        $i = 0;
        $exist = false;
        foreach (session('products') as $product) {
            if ($product['id'] == $id) {
                $product['unit'] = $product['unit'] + $request->unit ?? 1;
                $cartNow[$i] = $product;
            } else {
                foreach (session('products') as $p) {
                    if ($p['id'] == $id) {
                        $exist = true;
                    }
                }
                $cartNow[$i] = $product;
            }
            $i++;
        }

        if ($exist) {
            session(['products' => $cartNow]);
        } else {
            $product = [
                [
                    'id' => $id,
                    'unit' => $request->unit ?? 1,
                ],
            ];

            $session = session('products');
            $newArg = array_merge($session, $product);
            session(['products' => $newArg]);
        }

        return redirect()->back();
    }

    public function destroyCart($id)
    {
        $cartNow = [];
        $i = 0;
        foreach (session('products') as $product) {
            if ($product['id'] != $id) {
                $cartNow[$i] = $product;
                $i++;
            }
        }
        session(['products' => $cartNow]);
        return redirect()->back();
    }

    public function emptyCart(Request $request)
    {
        session(['products' => [['id' => 0, 'unit' => 0]]]);
        return redirect()->back();
    }

}