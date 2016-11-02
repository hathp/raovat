<?php

namespace Front\Http\Controllers\Auth;

use Core\Upload\V2\Upload;
use Hoster\Events\UserWasRegistered;
use Hoster\Model\User\Role;
use Hoster\Model\User\User;
use Hoster\Services\UserService;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Hoster\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * User login view
     *
     * @var string
     */
    protected $loginView = 'front::page.index';

    /**
     * User register view
     * @var string
     */
    protected $registerView = 'front::auth.register';

    protected $upload;

    /**
     * Create a new authentication controller instance.
     * @param Upload $upload
     */
    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param Request|\Illuminate\Http\Request $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        $credentials = $request->only($this->loginUsername(), 'password');
        $credentials = array_add($credentials, 'active', 1);

        return $credentials;
    }

    /**
     *Check whether account is valid
     *
     * @param Request $request
     * @return mixed
     */
    public function checkLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|max:255|exists:users',
            'password' => 'required'
        ], ['exists' => 'Tài khoản không tồn tại']);

        $errors_message = $validator->getMessageBag()->all();

        if ($validator->failed()) {
            $message['success'] = false;
            $message['message'] = $errors_message;

            return $message;
        }

        $user = User::where('email', $request->input('email'))->first();

        if($user->active == 0) {
            $message['success'] = false;
            $message['message'] = ['Tài khoản chưa kích hoạt'];

            return $message;
        }

        if (!password_verify($request->input('password'), $user->password)) {
            $message['success'] = false;
            $message['message'] = ['Mật khẩu không chính xác'];

            return $message;
        }

        $message['success'] = true;
        $message['message'] = '';

        return $message;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $data = [
            'page_title' => 'Đăng ký thành viên'
        ];

        if (property_exists($this, 'registerView')) {
            return view($this->registerView, $data);
        }

        return view('auth.register', $data);
    }

    public function confirmUser($user_id, $confirmation_token)
    {
        $user = User::findOrFail($user_id);

        if($user->active == 0 && $user->confirmation_token == $confirmation_token) {
            $user->confirmation_token = null;
            $user->active = 1;
            $user->save();

            return 'Kích hoạt tài khoản thành công';
        }

        return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'gender'        => 'required|boolean',
            'avatar'        => 'image',
            'phone'         => 'digits_between:6,11',
            'password'      => 'required|min:6|confirmed',
            'captcha'       => 'required|captcha'
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $avatar = $this->upload->images(\Request::file('avatar'), UserService::getAvatarConfig());

        return User::create([
            'name'               => $data['name'],
            'email'              => $data['email'],
            'password'           => $data['password'],
            'date_of_birth'      => $data['date_of_birth'],
            'gender'             => $data['gender'],
            'phone'              => $data['phone'],
            'avatar'             => $avatar,
            'confirmation_token' => sha1(uniqid(rand(), true)),
            'active'             => 0
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());
        $user_role_id = Role::where('slug', 'user')->first()->id;
        $user->roles()->attach($user_role_id);

        event(new UserWasRegistered($user));

        return redirect($this->redirectPath());
    }
}
