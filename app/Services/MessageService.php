<?php

namespace App\Services;
use App\Models\Message;
use Yajra\Datatables\Datatables as Datatables;

class MessageService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listMessages()
    {
        return Message::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($messages)
    {
        return Datatables::of($messages)
            ->editColumn('message', function (Message $message)
            {
                return '<span data-toggle="tooltip" data-placement="top" title="'.$message->message.'">'.charsLimit($message->message, 20).'</span>';
            })
            ->editColumn('is_benefit', function (Message $message){
                if($message->is_benefit == 1)
                    return '<span class="label label-sm label-primary"> نعم </span>';
                else
                    return '<span class="label label-sm label-warning">لا</span>';
            })
            ->rawColumns(['is_benefit', 'message'])->make(true);
    }
}
