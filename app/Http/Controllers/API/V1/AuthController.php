<?php

namespace App\Http\Controllers\API\V1;

use App\Exceptions\InvalidCredentialExcption;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\AuthRequest;
use App\Services\Auth\V1\AuthInterface;
use Illuminate\HTTP\Response;

class AuthController extends Controller
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthRequest $request)
    {
        try {
            $res = $this->auth->login($request->input('email'), $request->input('password'));

            return response()->json(['data' => $res], Response::HTTP_CREATED); // Response should be in a resource layer.
        } catch (InvalidCredentialExcption $th) {
            return response()->json(['message' => __('auth.failed')], Response::HTTP_UNAUTHORIZED);
        } catch (\Throwable $th) {
            return response()->json(['message' => __('messages.internal_server_error')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
