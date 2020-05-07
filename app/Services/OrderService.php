<?php

namespace App\Services;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Order;

class OrderService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listOrders()
    {
        return Order::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($orders)
    {
        return Datatables::of($orders)
        ->editColumn('message', function (Order $order)
        {
            return '<span data-toggle="tooltip" data-placement="top" title="'.$order->message.'">'.charsLimit($order->message, 20).'</span>';
        })->rawColumns(['message'])->make(true);
    }
}
