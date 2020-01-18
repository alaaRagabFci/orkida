<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Message;
use App\Models\Order;
use App\Models\Service;
use App\Services\UserService;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $messages = Message::count();
        $orders = Order::count();
        $services = Service::count();
        $blogs = Blog::count();
        return view('dashboard')
            ->with('modal','noModal')
            ->with('edit_modal','noModal')
            ->with('messages', $messages)
            ->with('orders', $orders)
            ->with('blogs', $blogs)
            ->with('services', $services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $id
     * @return view
     */
    public function profile(int $id): View
    {
        $user = $this->userService->getAdmin($id);
        return view('profile')
            ->with('modal','noModal')
            ->with('flag',0)
            ->with('info',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function updateUser(Request $request): RedirectResponse
    {
        $this->validate($request,
            [
                'name' =>'required',
                'email'=>'required',
            ]);

        $response = $this->userService->updateUser(Auth::user()->id, $request->all());
        if(isset($response['code']))
            dd($response['message']);

        return Redirect::back()
            ->with('msg', 'تم التحديث بنجاح')
            ->with('flag',1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function updateAdminImage(Request $request): RedirectResponse
    {
        $this->validate($request,
            [
                'profile_image' =>'required|max:1024',
            ]);

        if(Input::hasFile('profile_image')){
            $allowedExts = array("jpeg", "jpg", "png", "gif");
            $file = Input::file('profile_image');
            $ext  = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);

            if(in_array($ext,$allowedExts)){
                $filename =Auth::id().".png";
                $file->move('admin_ui', $filename);
                $msg = 'تم التحديث بنجاح';
            }
            else{
                $msg = 'You must choose image "jpeg", "jpg", "png", "gif"';
            }
        }

        return Redirect::back()
            ->with('msg', $msg)
            ->with('flag',1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function setPassword(Request $request): RedirectResponse
    {

        $user = User::findorFail(Auth::user()->id);

        if(Hash::check($request->old_pass, Auth::user()->password)){
            $user->password = bcrypt($request->new_pass);
            $user->save();

            $msg="تم التحديث بنجاح";
        }
        else{
            $msg="تأكد من الرقم السري الحالي";
        }
        return Redirect::back()
            ->with('msg', $msg)
            ->with('flag',1);
    }
}
