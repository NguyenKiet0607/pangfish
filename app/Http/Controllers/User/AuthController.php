<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected string $redirectTo = '/';
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('client.login');
    }

    public function showLoginScreen()
    {
        return view('client.login-screen');
    }

    public function showRegisterScreen()
    {
        return view('client.register-screen');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:3|max:50|unique:users,username',
            'phone' => 'required|string|regex:/^0[0-9]{9}$/|unique:users,phone',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
            'register_code' => 'required|captcha'
        ], [
            'username.required' => 'Tên người dùng là bắt buộc.',
            'username.string' => 'Tên người dùng phải là chuỗi.',
            'username.min' => 'Tên người dùng phải có ít nhất 3 ký tự.',
            'username.max' => 'Tên người dùng không được vượt quá 50 ký tự.',
            'username.unique' => 'Tên người dùng đã tồn tại.',

            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là chuỗi.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',

            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',

            'register_code.required' => 'Mã đăng ký là bắt buộc.',
            'register_code.captcha' => 'Mã xác nhận không hợp lệ.',

            'password_confirmation.required' => 'Mật khẩu xác nhận là bắt buộc.',
            'password_confirmation.string' => 'Mật khẩu xác nhận phải là chuỗi.',
            'password_confirmation.min' => 'Mật khẩu xác nhận phải có ít nhất 6 ký tự.',
            'password_confirmation.same' => 'Mật khẩu xác nhận không khớp.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422, [], JSON_UNESCAPED_UNICODE);
        }


        // Khởi tạo mảng lỗi
        $errors = [];

        // Kiểm tra xem username hoặc phone đã tồn tại chưa
        if (User::where('username', $request->username)->exists()) {
            $errors['username'] = ['Tên người dùng đã tồn tại.'];
        }

        if (User::where('phone', $request->phone)->exists()) {
            $errors['phone'] = ['Số điện thoại đã tồn tại.'];
        }

        // Nếu có lỗi, trả về tất cả các lỗi
        if (!empty($errors)) {
            return response()->json([
                'success' => false,
                'errors' => $errors,
            ], 422, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json([
            'success' => true,
            'message' => 'Đăng ký thành công!'
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function registerDisplayName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:3|max:50|unique:users,username',
            'phone' => 'required|string|regex:/^0[0-9]{9}$/|unique:users,phone',
            'password' => 'required|string|min:6',
            'displayname' => 'required|string|min:3|max:50',
        ], [
            'username.required' => 'Tên người dùng là bắt buộc.',
            'username.string' => 'Tên người dùng phải là chuỗi.',
            'username.min' => 'Tên người dùng phải có ít nhất 3 ký tự.',
            'username.max' => 'Tên người dùng không được vượt quá 50 ký tự.',
            'username.unique' => 'Tên người dùng đã tồn tại.',

            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là chuỗi.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',

            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',

            'displayname.required' => 'Tên hiển thị là bắt buộc.',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422, [], JSON_UNESCAPED_UNICODE);
        }

        // Create user

        $user = User::create([
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => bcrypt($request->password), // Hash password
            'name' => $request->displayname,
            'coin' => env('DEFAULT_COIN', 0),
        ]);



        return response()->json([
            'success' => true,
            'message' => 'Đăng ký thành công!',
            'data' => $user
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $input = $request->only(['username', 'password']);
        $user = User::query()->where('username', $input['username'])->first();
        $input['status'] = 1;
        if ($this->guard()->attempt($input)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            //            //reset creit = 0 if user not login in 3 days
            //            if ($user->last_login < now()->subDays(3)) {
            //                $user->coin = 0;
            //            }

            $user->last_login = now();
            //            //save ip of user login
            $user->ip = $request->ip();
            $user->save();
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        //        $request->session()->invalidate();

        //        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
}
