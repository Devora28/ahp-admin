<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller{
    public function index(Request $request){
        $users = User::count();
        $lastWeekUsers = User::where('created_at','>=',now()->subDays(7))->count();
        $lastWeekUsersPercentage = $users > 0 ? ($lastWeekUsers / $users) * 100 : 0;
        $sort = $request->get('sort','all');
        $recentOrders = Order::query();
        if (in_array($sort, ['pending', 'shipped', 'cancelled'])) {
            $recentOrders->where('status', $sort);
        }
        $recentOrders = $recentOrders->latest()->with(['user','address'])->paginate(5);
        return view('index',[
            'users' => $users,
            'userWeekPercent' => $lastWeekUsersPercentage,
            'recentOrders' => $recentOrders,
        ]);
    }
    public function usersList(Request $request){
        $sort = $request->get('sort','newest');
        $usersList = User::query();
        if ($sort === 'oldest') {
            $usersList->oldest();
        } else {
            $usersList->latest();
        }
        $usersList = $usersList->paginate(10)->withQueryString();
        return view('users-list',['users'=>$usersList]);
    }
    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','کاربر با موفقیت حذف شد');
    }
    public function editUser(Request $request,$id){
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'first-name' => 'required|string|max:150',
            'last-name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:users,email,'.$user->id,
            'mobile' => 'required|string|max:150|unique:users,mobile,'.$user->id,
            'national-code' => 'required|string|max:10|unique:users,national_code,'.$user->id,
            'password' => 'nullable|string|min:6',
            'status' => 'required|string|in:active,inactive',
        ]);
        $data = [
            'first_name' => $validated['first-name'],
            'last_name' => $validated['last-name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'national_code' => $validated['national-code'],
            'status' => $validated['status'],
        ];
        if(!empty($validated['password'])){
            $data['password'] = Hash::make($validated['password']);
        }
        $user->update($data);
        return redirect()->back()->with('success', 'اطلاعات کاربر با موفقیت ویرایش شد');
    }
    public function profilePage($id){
        $user = User::findOrFail($id);
        return view('profile',['user'=>$user]);
    }
    public function editProfilePage($id){
        $user = User::findOrFail($id);
        return view('edit-profile',['user'=>$user]);
    }
    public function updatePassword(Request $request){
        $admin = auth()->user();
        $validator = Validator::make($request->all(),[
            'current_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(!Hash::check($request->current_password,$admin->password)){
            return redirect()->back()->withErrors(['current_password' => 'رمز وارد شده نادرست است']);
        }
        $admin->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success','رمز عبور به روزرسانی شد');
    }
    public function updateAdminProfile(Request $request){
        $admin = auth()->user();
        $validator = Validator::make($request->all(),[
            'first_name' => 'nullable|string|max:150',
            'last_name' => 'nullable|string|max:150',
            'email' => 'nullable|string|email|max:150|unique:admins,email,'.$admin->id,
            'mobile' => 'nullable|string|max:150|unique:admins,mobile,'.$admin->id,
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = [];
        if($request->filled('first_name')){
            $data['first_name'] = $request->first_name;
        }
        if($request->filled('last_name')){
            $data['last_name'] = $request->last_name;
        }
        if($request->filled('email')){
            $data['email'] = $request->email;
        }
        if($request->filled('mobile')){
            $data['mobile'] = $request->mobile;
        }
        if(!empty($data)){
            $admin->update($data);
        }
        return redirect()->back()->with('success','اطلاعات کاربری بروزرسانی شد');
    }
}
