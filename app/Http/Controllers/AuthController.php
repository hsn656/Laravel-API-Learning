<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     * func
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(["login"]);
        $this->middleware("checkToken")->only(["getToken"]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $user = User::where("email", "=", request()->email, "and", "password", "=", request()->password)->first();

        $credentials = request(['email', 'password']);

        // JWTAuth::fromUser($user)
        $customClaims = [
            'email' => $user->email,
            'role' => $user->role,
        ];

        if (!$token = JWTAuth::claims($customClaims)->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

    //added by me to get token payload
    public function getToken()
    {
        // $token = request()->header()["authorization"];
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json(auth()->payload());

        // return response()->json($user);
    }
}
