<?php


namespace System\Cart\Http\Controllers;

use Hoster\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use System\Cart\Model\Order;

class OrderController extends AdminBaseController
{
    public function __construct()
    {
        view()->share('package_name', 'cart');
    }

    public function index()
    {
        $orders = Order::all();

        $data = [
            'order'         => $orders,
            'page_title'    => 'Đơn hàng',
            'no_page_title' => true
        ];

        return view('cart::order.index', $data);
    }

    public function create()
    {

    }

    public function show($order_id)
    {
        $order         = Order::findOrFail($order_id);
        $order_details = $order->details;

        $data = [
            'page_title'    => 'Chi tiết đơn hàng',
            'order'         => $order,
            'order_details' => $order_details
        ];

        return view('cart::order.show', $data);
    }

    public function toggleState(Request $request)
    {
        $page_id = $request->input('id');
        $page = Order::findOrFail($page_id);

        $property = $request->input('property', null);

        if ($page->$property == 1 || $page->$property == 0) {
            if ($page->$property == 1) {
                $page->$property = 0;
            } else {
                $page->$property = 1;
            }
            $page->save();

            return $page->$property;
        } else {
            abort(422);
        }
    }

    public function destroy(Request $request)
    {
        Order::destroy($request->input('id'));

        return $this->redirectTo();
    }
}