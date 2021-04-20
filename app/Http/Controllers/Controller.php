<?php

namespace App\Http\Controllers;

use App\Models\SettingTopmenu;
use App\Models\Product;
use App\Models\ProfileCompany;
use App\Models\SocialNetwork;
use App\Models\ShippingCompany;
use App\Models\Address;
use App\Models\CreditCard;
use App\Models\Tax;
use App\Models\AdsCheckout;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $view
     * @param array $arg
     *
     * @return view
     */
	public function responseViewPublic($view, $arg)
	{
		// inicio carrito
		$cartNow = [];
		$i = 0;
		foreach (session('products') as $product) {
			$cartNow[$i] = (int)$product['id'];
			$i++;
		}
		
		$cart = Product::whereIn('id', $cartNow)->get();


		// fin carrito
		$products = Product::all();
		$address = Address::all();
		$creditCart = CreditCard::all();
		$settingTopmenus = SettingTopmenu::all();
		$socialNetworks = SocialNetwork::with('profileCompany')->first();
        $profileCompany = ProfileCompany::where('id',1)->first(); 
        $shippingCompanies = ShippingCompany::all();
        $tax = Tax::all();
        $adsCheckout = AdsCheckout::all();

		$arg1 = [
			'cart' => $cart,
			'products' => $products,
			'address' => $address,
			'creditCart' => $creditCart,
			'settingTopmenus' => $settingTopmenus,
			'subTotalCart' => $this->subTotalCart(),
			'socialNetworks' => $socialNetworks,
            'profileCompany' => $profileCompany,
            'shippingCompanies' => $shippingCompanies,
            'tax' => $tax,
            'adsCheckout' => $adsCheckout,
			//'amountTotal' => $amountTotal
		];

		$newArg = array_merge($arg1, $arg);
		
	 	return view($view, $newArg);
	}

	public function subTotalCart()
	{
		// inicio carrito
		$cartNow = [];
		$i = 0;
		foreach (session('products') as $product) {
			$cartNow[$i] = (int)$product['id'];
			$i++;
		}
		$cart = Product::whereIn('id', $cartNow)->get();
		// fin carrito

		//inicio del monto total
        // $amountTotal = 0;
        // foreach ($cart as $cartsubtotal) {
        //     $amountTotal = $cartsubtotal['amount'] + $amountTotal;
        // }
		//fin del monto total

		// total precio carrito actual
		$subTotalCart = 0;
        foreach ($cart as $cartAmount) {
        	foreach (session('products') as $p) {
        		if ($p['id'] ==  $cartAmount['id']) {
        			$subTotalCart = ($p['unit'] * $cartAmount['amount']) + $subTotalCart;
        		}
        	}
        }

        $subTotalCart = formatMoney($subTotalCart);
        // fin total precio carrito actual

        return $subTotalCart;
	}

	public function responseViewAdmin($view, $arg)
	{
		$settingTopmenus = SettingTopmenu::all();
		$profileCompany = ProfileCompany::where('id',1)->first();

		$arg1 = [
			'settingTopmenus' => $settingTopmenus,
			'profileCompany' => $profileCompany,
		];
		
		$newArg = array_merge($arg1, $arg);
		
	 	return view($view, $newArg);
	}

	public function hasRole($role = 'user')
	{
		return request()->user()->authorizeRoles([$role]);
	}

	public function responseRedirectAdmin($name, $message = 'Item Modificado')
	{
		return redirect()->route($name)->with('message', $message);
	}
}
