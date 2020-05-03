<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MessageService;

class MessageController extends Controller {

    public $messageService;
    public function __construct(MessageService $messageService)
    {
        $this->middleware('auth');
        $this->messageService = $messageService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $messages  = $this->messageService->listMessages();
        $tableData = $this->messageService->datatables($messages);

        if($request->ajax())
            return $tableData;

        return view('messages.index')
              ->with('modal', 'messages')
              ->with('edit_modal', 'messages')
              ->with('tableData', $tableData);
    }
}
