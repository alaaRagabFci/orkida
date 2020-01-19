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
        return Datatables::of($orders)->make(true);
    }
}
