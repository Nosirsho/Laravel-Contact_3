<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    // Регистрация пользователя
    public function register(RegisterUserRequest $request)
    {
        //Добавление пользователя в БД
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // Ответ
        return response()
            ->json([
                "status" => true
            ])->setStatusCode(201, 'Account registered');
    }

    // Авторизация пользователя
    public function login(LoginUserRequest $request)
    {
        //Ищем пользователя из БД
        $user = User::where('email', $request->email)->first();

        //Если пользователь найден и пароль совподает то...
        if($user && Hash::check($request->password, $user->password)){

            //Генерируем токен и сохроняем в БД
            $user->api_token = Str::random(100);
            $user->save();

            //Успешныый Ответ: возвращаем сататус и данные о пользователе
            return response()
                ->json([
                    'status' => true,
                    'user' => $user
                    ])
                ->setStatusCode(200, 'Authenticated');
        }else{
            // Не успешный ответ
            return response()->json([
                'status' => false
                ])->setStatusCode(401, 'Not authorized');
        }
    }


}
