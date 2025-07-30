<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            throw new BadRequestHttpException('Invalid credentials');
        }

        $data = [
            'token' => Auth::user()->createToken('auth_token', ['*'], now()->addWeek())->plainTextToken,
        ];

        return ApiResponse::responseWithData($data, 'Success login');
    }

    public function me(Request $request)
    {
        return ApiResponse::responseWithData($request->user(), 'Success get user');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::response('Success logout');
    }
}
