<?php
/**
 * User: Viet Trung
 * Date: 8/6/2016
 * Time: 3:30 PM
 */

namespace Front\Http\Controllers;

use Illuminate\Http\Request;
use System\Cart\Model\Order;
use System\Classified\Model\Classified;

class CartController extends BaseController
{
    protected $carts;

    public function __construct()
    {
        parent::__construct();
        $this->carts = empty(session('carts')) ? [] : session('carts');
    }

    public function getCart()
    {
        return empty(session('carts')) ? [] : session('carts');
    }

    public function setCarts($carts)
    {
        session(['carts' => $carts]);
        $this->carts = $carts;

        return $carts;
    }

    public function index()
    {
        if(count($this->carts) == 0)  {
            return redirect('/');
        }
        $data = [
            'carts'       => Classified::whereIn('id', array_keys($this->carts))->get(),
            'quantity'    => $this->carts,
            'total_price' => $this->totalPrice()
        ];

        return view(self::PACKAGE_NAME . '::cart.index', $data);
    }

    public function add($id)
    {
        if (!in_array($id, $this->getCart())) {
            $this->carts[$id] = 1;
            $this->setCarts($this->carts);
        }

        return redirect()->back();
    }

    public function remove($id)
    {
        if (empty($this->carts)) {
            return redirect()->back();
        }

        if (array_key_exists(intval($id), $this->carts)) {
            unset($this->carts[$id]);
            $this->setCarts($this->carts);
        }

        session(['carts' => $this->carts]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $inputs   = $request->all();
        $quantity = $inputs['quantity'];
        foreach ($quantity as $key => $value) {
            $quantity[$key] = intval($value);
            if (intval($value) <= 0) {
                $quantity[$key] = 1;
            }
        }

        session(['carts' => $quantity]);

        return redirect()->back();
    }

    public function getPayment()
    {
        $data = [
            'carts'       => Classified::whereIn('id', array_keys($this->carts))->get(),
            'quantity'    => $this->carts,
            'total_price' => $this->totalPrice()
        ];

        return view(self::PACKAGE_NAME . '::cart.payment', $data);
    }

    public function postPayment(Request $request)
    {
        $inputs = $request->all();
        if($request->has('same_as_order')) {
            $inputs['receiver_name'] = null;
            $inputs['receiver_mobile'] = null;
            $inputs['receiver_address'] = null;
        }

        if(\Auth::check()) {
            $inputs['user_id'] = \Auth::user()->id;
        }

        $order = Order::create($inputs);

        foreach($this->carts as $classified_id => $quantity) {
            $classified = Classified::findOrFail($classified_id);
            $order->classifieds()->attach($classified_id, ['quantity' => $quantity, 'price' => $classified->price]);
        }

        session(['carts' => []]);

        $request->session()->flash('success', 1);

        return redirect(route('front.cart.success'));
    }

    public function success()
    {
        if(session()->has('success')) {
            return view(self::PACKAGE_NAME . '::cart.success');
        }

        return redirect('/');
    }

    public function totalPrice()
    {
        $price = 0;
        foreach ($this->carts as $item_id => $quantity) {
            $price += Classified::findOrFail($item_id)->price * $quantity;
        }

        return $price;
    }

}