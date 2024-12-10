<?php

namespace App\Http\Controllers;

use App\Events\notifyEvent;
use DataTables;
use App\Models\news;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\VerificationCode;
use App\Notifications\amdinsNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class dashboardController extends Controller
{
    public $news;
    public $category;
    public $user;
    public $article;
    public $dashboard_bath;

    public function __construct(Category $category, news $news, User $user, Article $article)
    {
        $this->news = $news;
        $this->category = $category;
        $this->user = $user;
        $this->article = $article;
        $this->dashboard_bath = 'dashboard';
    }
    function index()
    {
        return view($this->dashboard_bath . '.index');
    }

    function adminsShow() {
        return view($this->dashboard_bath . '.admin.show_news');

    }
    function adminsAdd() {
        return view($this->dashboard_bath . '.admin.form_news');
    }
    function adminsAddSubmit(Request $request) {
        // dd($request->all());
            // validation
            $request->validate([
                'admin_name' => 'required|max:20|min:3|string',
                'admin_email' => 'email|required',
                'admin_number' => 'required|min:10|max:11',
                'admin_password' => 'required|min:5',
                'admin_image' => 'image|required',
            ]);

            $file = $request->file('admin_image');
            $image_name = "image_" . time() . rand(1, 1000000) . $file->getClientOriginalName();
            $file->move(public_path('upload'), $image_name);

            $upload_data = $this->user->create([
                'name' => $request->admin_name,
                'email' => $request->admin_email,
                'phone_number' => $request->admin_number,
                'password' => Hash::make($request->admin_password),
                'image' => $image_name,
            ]);


            if ($upload_data) {
                return back()->with('message', 'New Admin successfully added');
            } else {
                return back()->with('message', 'Admin failed added');
            }
    }
    function categoryShow()
    {
        $data = $this->category->latest()->with('parent')->get();
        // dd($data);
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="edit" class="btn btn-success p-2 btn-sm" data-id="' . $row->id . '">Edit</button>
                     <a href="javascript:void(0)" data-id="' . $row->id . '" class="delete p-2 btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('parent', function ($row) {
                    return @$row->parent->name;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->dashboard_bath . '.category.show_category');
    }

    function categoryAdd()
    {
        $parent_categories = $this->category->latest()->whereNull('parent_id')->get();
        return view($this->dashboard_bath . '.category.form_category', compact('parent_categories'));
    }

    function newsShow()
    {
        $data = $this->news->with('getCategory', 'getUser')->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('getCategory', function ($row) {
                    return @$row->getCategory->name;
                })
                ->addColumn('getUser', function ($row) {
                    return @$row->getUser->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="edit" class="btn btn-success p-2 btn-sm" data-id="' . $row->id . '">Edit</button>
                     <a href="javascript:void(0)" data-id="' . $row->id . '" class="delete p-2 btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'getCategory', 'getUser'])
                ->make(true);
        }
        // dd($data);
        return view($this->dashboard_bath . '.news.show_news');
    }
    function articleShow()
    {
        $data = $this->article->with('getUser')->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('getUser', function ($row) {
                    return @$row->getUser->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success p-2 btn-sm">Edit</a> <a href="javascript:void(0)" class="delete p-2 btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'getUser'])
                ->make(true);
        }
        // dd($data);
        return view($this->dashboard_bath . '.article.show_article');
    }
    function newsAdd()
    {
        $categories = $this->category->latest()->get();

        return view($this->dashboard_bath . '.news.form_news', compact('categories'));
    }
    function articleAdd()
    {
        return view($this->dashboard_bath . '.article.form_article');
    }
    function profile()
    {
        // $data_news =
        $adminId = auth()->user()->id;
        $newsCount = $this->news->where('user_id', $adminId)->count();
        $newsdata = $this->news->where('user_id', $adminId)->take(3)->get();
        return view($this->dashboard_bath . '.admins.profile', compact('newsCount', 'newsdata'));
    }
    function editProfile($id)
    {
        // dd($id);
        $data = $this->user->where('id', $id)->get();
        // dd($data);
        return view($this->dashboard_bath . '.admins.edit_profile', compact('data'));
    }
    function updateProfile(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:35|min:3|string',
            // 'image' => 'image|nullable',
            'email' => 'email|required',
            'phone_number' => 'max:11|min:10|nullable',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = "image_" . time() . rand(1, 1000000) . $file->getClientOriginalName();
            $file->move(public_path('upload'), $image_name);

            $user1 = $this->user->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'image' => $image_name,
            ]);
            if ($user1) {
                return redirect()->back()->with('message', 'updated is successfully')->with('type','success');

            }else{
                return redirect()->back()->with('message', 'updated is failed')->with('type','danger');
            }
        }
        $user = $this->user->where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);
        if ($user) {
            return redirect()->back()->with('message', 'updated is successfully')->with('type','success');

            }else{
                return redirect()->back()->with('message', 'updated is failed')->with('type','danger');
            }
    }

    // functionality
    function submitNews(Request $request)
    {
        // dd($request->all());

        // validation
        $request->validate([
            'title_en' => 'required|max:70|min:3|string',
            'title_ar' => 'required|max:70|min:3|string',
            'image' => 'image|required',
            'description_en' => 'min:5|nullable',
            'description_ar' => 'min:5|nullable',
            'country' => 'required',
            'category_id' => 'required',
        ]);
        $title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];
        $description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];

        $file = $request->file('image');
        $image_name = "image_" . time() . rand(1, 1000000) . $file->getClientOriginalName();
        $file->move(public_path('upload'), $image_name);

        $is_active = $request->has('is_active') && in_array($request->is_active, [0, 1]) ? $request->is_active : '0';

        $upload_data = $this->news->create([
            'title' => $title,
            'image' => $image_name,
            'description' =>$description,
            'country' => $request->country,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'is_active' => $is_active,
        ]);
        $admin_id = Auth::user()->id;
        $admin_name = Auth::user()->name;
        $news_title = $request->title;
        $user = auth()->user();
        $notificationCount = $user->unreadNotifications->count();
        if ($upload_data) {
            event(new notifyEvent($admin_name,$news_title,$notificationCount));
            $user = User::where('id', '!=', $admin_id)->get();
            Notification::send($user, new amdinsNotify($admin_name , $news_title , $notificationCount));
            return back()->with('message', 'News successfully added');
        } else {
            return back()->with('message', 'News failed added');
        }
    }

    function submitArticle(Request $request)
    {
        // dd($request->all());

        // validation
        $request->validate([
           'title_en' => 'required|max:70|min:3|string',
            'title_ar' => 'required|max:70|min:3|string',
            'image' => 'image|required',
             'description_en' => 'min:5|nullable',
            'description_ar' => 'min:5|nullable',
        ]);
        $title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];
        $description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];
        $file = $request->file('image');
        $image_name = "image_" . time() . rand(1, 1000000) . $file->getClientOriginalName();
        $file->move(public_path('upload'), $image_name);
        $upload_data = $this->article->create([
            'title' => $title,
            'image' => $image_name,
            'description' => $description,
            'user_id' => Auth::user()->id,
        ]);

        if ($upload_data) {
            return back()->with('message', 'article successfully added');
        } else {
            return back()->with('message', 'article failed added');
        }
    }
    function submitCategory(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'name_en' => 'required|max:25|min:3|string',
            'name_ar' => 'required|max:25|min:3|string',
            'image' => 'image|required',
            'description_en' => 'max:300|min:5|nullable',
            'description_ar' => 'max:300|min:5|nullable',
        ]);
        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];
        $description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];
        $file = $request->file('image');
        $image_name = "image_" . time() . rand(1, 1000000) . $file->getClientOriginalName();
        $file->move(public_path('upload'), $image_name);

        $categoryData = [
            'name' => $name,
            'image' => $image_name,
            'description' => $description,
        ];

        if ($request->has('parent_id')) {
            $categoryData['parent_id'] = $request->parent_id;
        } else {
            // $categoryData['parent_id'] = 'null';
        }

        $category = $this->category->create($categoryData);

        if ($category) {
            $message = $request->has('parent_id') ? 'sub category' : 'category';
            return back()->with('message', 'News ' . $message . ' successfully added');
        } else {
            $message = $request->has('parent_id') ? 'sub category' : 'category';
            return back()->with('message', 'News ' . $message . ' failed added');
        }
    }
    function sendEmail($id)
    {
        $data_user = User::where('id', $id)->get();
        $token = rand(100000, 999999);
        VerificationCode::create([
            'user_id' => $data_user[0]->id,
            'token' => $token,
        ]);
        Mail::to($data_user[0]->email)->send(new ResetPasswordMail($token, $data_user));
    }
    function verifyCode(Request $request)
    {
        $user_id = Auth::id();
        $enteredToken = $request->token;

        $storedToken = VerificationCode::where('user_id', $user_id)
            ->latest()
            ->value('token');

        if ($enteredToken == $storedToken) {
            VerificationCode::where('user_id', $user_id)->delete();
            return response()->json(['message' => 'Verification is successful'], 200);
        } else {
            return response()->json(['message' => 'Verification is invalid'], 422);
        }
    }
    function updatePassword(Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'password' => 'confirmed|required|min:8'
        ]);
        $newPassword = Hash::make($request->password);

        $user = User::find($id);
        $user->password = $newPassword;
        $user->save();
        if ($user) {
            return response()->json(['message' => 'Updated is successful'], 200);
        } else {
            return response()->json(['message' => 'Updated is Failed'], 422);
        }
    }
    function showAdmins()
    {
        if (request()->ajax()) {
            $data = $this->user->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns([''])
                ->make(true);
        }
        return view($this->dashboard_bath . '.admins.show_admins');
    }
    function categoryEdit($id)
    {
        $data = Category::where('id', $id)->first();
        $categories = Category::all();
        if ($data) {
            return response()->json([
                'data' => $data,
                'cat' => $categories
            ]);
        } else {
            return response()->json('message', 'the category is not found');
        }
    }
    function categoryUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_en' => 'required|max:25|min:3|string',
            'name_ar' => 'required|max:25|min:3|string',
            'image' => 'image|nullable',
            'description_ar' => 'max:300|min:5|nullable',
            'description_en' => 'max:300|min:5|nullable',
        ]);
        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        $description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $image_name = "image_" . time() . rand(1, 1000000) . $file->getClientOriginalName();
            $file->move(public_path('upload'), $image_name);

            $category1 = Category::where('id', $request->id)->update([
                "name" => $name,
                'description' => $description,
                'image' => $image_name,
                'parent_id' => $request->parent_id,
            ]);
            if ($category1) {
                return response()->json(['message' => 'updated is successfuly']);

            }else{
                return response()->json(['message' => 'updated is failed']);
            }
        }
        $category = Category::where('id', $request->id)->update([
            "name" => $name,
            'description' => $description,
            'parent_id' => $request->parent_id,
        ]);
        if ($category) {
            return response()->json(['message' => 'updated is successfuly']);

            }else{
                return response()->json(['message' => 'updated is failed']);
            }
    }
    function categoryDelete($id) {
        $del = Category::where('id' , $id)->delete();
        if ($del) {
            return response()->json(['message' => 'deleted is successfuly']);
        }else{
            return response()->json(['message' => 'deleted is failed']);
        }
    }
    function newsEdit($id)
    {
        $data = news::where('id', $id)->first();
        $cat = Category::all();
        if ($data) {
            return response()->json([
                'data' => $data,
                'cat' => $cat
            ]);
        } else {
            return response()->json('message', 'the news is not found');
        }
    }
    function newsUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:125|min:3|string',
            // 'image' => 'image|nullable',
            'country' => 'required',
            'description' => 'max:300|min:5|nullable',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = "image_" . time() . rand(1, 1000000) . $file->getClientOriginalName();
            $file->move(public_path('upload'), $image_name);

            $news1 = news::where('id', $request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => $request->is_active,
                'category_id' => $request->category_id,
                'country' => $request->country,
                'image' => $image_name,
            ]);
            if ($news1) {
                return response()->json(['message' => 'updated is successfuly']);

            }else{
                return response()->json(['message' => 'updated is failed']);
            }
        }
        $news = news::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
            'country' => $request->country,
        ]);
        if ($news) {
            return response()->json(['message' => 'updated is successfuly']);

            }else{
                return response()->json(['message' => 'updated is failed']);
            }
    }
    function newsDelete($id) {
        $del = news::where('id' , $id)->delete();
        if ($del) {
            return response()->json(['message' => 'deleted is successfuly']);
        }else{
            return response()->json(['message' => 'deleted is failed']);
        }
    }
    public function markAsRead(Request $request)
    {
        $notificationId = $request->input('id');
        $notification = auth()->user()->notifications->where('id', $notificationId)->first();
        if ($notification) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }


}
