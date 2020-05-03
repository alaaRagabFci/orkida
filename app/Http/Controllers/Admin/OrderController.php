<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller {

    public $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->middleware('auth');
        $this->orderService = $orderService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $orders  = $this->orderService->listOrders();
        $tableData = $this->orderService->datatables($orders);

        if($request->ajax())
            return $tableData;

        return view('orders.index')
              ->with('modal', 'orders')
              ->with('edit_modal', 'orders')
              ->with('tableData', $tableData);
    }
}
