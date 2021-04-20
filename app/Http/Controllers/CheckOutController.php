<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SettingTopcategory;
use App\Models\SettingTopmenu;
use App\Models\Address;
use App\Models\CreditCard;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Tax;


class CheckOutController extends Controller
{

	public function checkoutStep_1()
    {
        $activeTopMenu = 'step1';

        $arg = [
            
            'activeTopMenu' => $activeTopMenu
        ];
    
        return $this->responseViewPublic('index.checkout1', $arg);          
    }

    public function checkoutStep_2(Request $request)
    {
        $step1 = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company ?? '',
            'country' => $request->country,
            'city' => $request->city ?? '',
            'code_postal' => $request->code_postal ?? '',
            'address_1' => $request->address_1,
            'address_2' => $request->address_2 ?? '',
       ];
        $activeTopMenu = 'step2';

        $arg = [
            'step1' => $step1,
            'activeTopMenu' => $activeTopMenu,
        ];

        return $this->responseViewPublic('index.checkout2', $arg);
    }

    public function checkoutStep_3(Request $request)
    {
        $step1 = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company ?? '',
            'country' => $request->country,
            'city' => $request->city ?? '',
            'code_postal' => $request->code_postal ?? '',
            'address_1' => $request->address_1,
            'address_2' => $request->address_2 ?? '',
       ];

       $step2 = $request->id_shipping;
        $activeTopMenu = 'step3';

        $arg = [
            'step1' => $step1,
            'activeTopMenu' => $activeTopMenu,
            'step2' => $step2,
        ];

        return $this->responseViewPublic('index.checkout3', $arg);
    }

    public function checkoutStep_4(Request $request)
    {
        $step1 = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company ?? '',
            'country' => $request->country,
            'city' => $request->city ?? '',
            'code_postal' => $request->code_postal ?? '',
            'address_1' => $request->address_1,
            'address_2' => $request->address_2 ?? '',
       ];

       $step2 = $request->id_shipping;

       $step3 = [
            'card_number' => $request->card_number,
            'name' => $request->name,
            'expire' => $request->expire,
            'cvc' => $request->cvc,
       ];

        $cartNow = [];
        $i = 0;
        foreach (session('products') as $product) {
            $cartNow[$i] = (int)$product['id'];
            $i++;
        }
        $productCart = Product::whereIn('id', $cartNow)->get();
        $activeTopMenu = 'step4';

        $arg = [
            'step1' => $step1,
            'activeTopMenu' => $activeTopMenu,
            'step2' => $step2,
            'step3' => $step3,
            'productCart' => $productCart
        ];

        return $this->responseViewPublic('index.checkout4', $arg);
    }

    public function checkoutStep_login(Request $request)
    {
        $step1 = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company ?? '',
            'country' => $request->country,
            'city' => $request->city ?? '',
            'code_postal' => $request->code_postal ?? '',
            'address_1' => $request->address_1,
            'address_2' => $request->address_2 ?? '',
       ];

       $step2 = $request->id_shipping;

       $step3 = [
            'card_number' => $request->card_number,
            'name' => $request->name,
            'expire' => $request->expire,
            'cvc' => $request->cvc,
       ];
        $activeTopMenu = 'steplogin';

        $arg = [
            'step1' => $step1,
            'activeTopMenu' => $activeTopMenu,
            'step2' => $step2,
            'step3' => $step3,
        ];

        return $this->responseViewPublic('index.checkoutlogin', $arg);
    }

    public function checkoutStep_register(Request $request)
    {
        $step1 = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company ?? '',
            'country' => $request->country,
            'city' => $request->city ?? '',
            'code_postal' => $request->code_postal ?? '',
            'address_1' => $request->address_1,
            'address_2' => $request->address_2 ?? '',
       ];

       $step2 = $request->id_shipping;

       $step3 = [
            'card_number' => $request->card_number,
            'name' => $request->name,
            'expire' => $request->expire,
            'cvc' => $request->cvc,
       ];
        $activeTopMenu = 'stepregister';

        $arg = [
            'step1' => $step1,
            'activeTopMenu' => $activeTopMenu,
            'step2' => $step2,
            'step3' => $step3,
        ];

        return $this->responseViewPublic('index.checkoutRegister', $arg);
    }

    public function checkoutStep_5(Request $request)
    {
        $cartNow = [];
        $i = 0;
        foreach (session('products') as $product) {
            $cartNow[$i] = (int)$product['id'];
            $i++;
        }
        $productCart = Product::whereIn('id', $cartNow)->get();
        
        $activeTopMenu = 'step5';
        $order = session('order');

        $arg = [
            'activeTopMenu' => $activeTopMenu,
            'productCart' => $productCart,
            'order' => $order
        ];

        return $this->responseViewPublic('index.checkout5', $arg);
    }

    public function checkoutStep_order(Request $request)
    {
        $tax = Tax::where('id', 1)->first();
        $total = str_replace('.', '', $this->subTotalCart());
        $total = str_replace(',', '.', $total);

        $subtotal = str_replace('.', '', $this->subTotalCart());
        $subtotal = str_replace(',', '.', $subtotal);

        if ($request->login != '1') {
            $order = session('order');

            $address = new Address;
            $address->user_id = \Auth::user()->id;
            $address->first_name = $order['step1']['first_name'];
            $address->last_name = $order['step1']['last_name'];
            $address->email = $order['step1']['email'];
            $address->phone = $order['step1']['phone'];
            $address->company = $order['step1']['company'] ?? null;
            $address->country = $order['step1']['country'];
            $address->city = $order['step1']['city'] ?? null;
            $address->code_postal = $order['step1']['code_postal'] ?? null;
            $address->address_1 = $order['step1']['address_1'];
            $address->address_2 = $order['step1']['address_2'] ?? null;
            $address->save();

            $card = new CreditCard;
            $card->user_id = \Auth::user()->id;
            $card->card_number = $order['step3']['card_number'];
            $card->name = $order['step3']['name'];   
            $card->expire = $order['step3']['expire'];
            $card->cvc = $order['step3']['cvc'];
            $card->save();

            $orderComplete = new Order;
            $orderComplete->user_id = \Auth::user()->id;
            $orderComplete->address_id = $address->id;
            $orderComplete->payment_method_id = 1;
            $orderComplete->statu_id = 1;
            $orderComplete->shipping_company_id = $order['step2'];
            $orderComplete->total = (float)$total;
            $orderComplete->subtotal = (float)$subtotal;
            $orderComplete->tax = $tax->amount;  
            $orderComplete->save();
        } else {
            $address = new Address;
            $address->user_id = \Auth::user()->id;
            $address->first_name = $request->first_name;
            $address->last_name = $request->last_name;
            $address->email = $request->email;
            $address->phone = $request->phone;
            $address->company = $request->company ?? null;
            $address->country = $request->country;
            $address->city = $request->city ?? null;
            $address->code_postal = $request->code_postal ?? null;
            $address->address_1 = $request->address_1;
            $address->address_2 = $request->address_2 ?? null;
            $address->save();

            $card = new CreditCard;
            $card->user_id = \Auth::user()->id;
            $card->card_number = $request->card_number;
            $card->name = $request->name;   
            $card->expire = $request->expire;
            $card->cvc = $request->cvc;
            $card->save();

            $orderComplete = new Order;
            $orderComplete->user_id = \Auth::user()->id;
            $orderComplete->address_id = $address->id;
            $orderComplete->payment_method_id = 1;
            $orderComplete->statu_id = 1;
            $orderComplete->shipping_company_id = $request->id_shipping;
            $orderComplete->total = (float)$total;
            $orderComplete->subtotal = (float)$subtotal;
            $orderComplete->tax = $tax->amount;  
            $orderComplete->save();
        }

        foreach (session('products') as $product) {
            if ((int)$product['id'] != 0) {
                OrderProduct::create([
                    'order_id' => $orderComplete->id,
                    'product_id' => (int)$product['id'],
                    'unit' => (int)$product['unit'],
                ]);
            }
        }

        session(['products' => [['id' => 0, 'unit' => 0]]]);
        session()->forget('orders');
        
        return redirect()->route('users.order');
    }


}