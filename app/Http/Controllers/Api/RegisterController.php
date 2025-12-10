<?php

/**
 * Handles the registration of a new user.
 *
 * This endpoint accepts a POST request with the following parameters:
 * - `name`: the name of the user
 * - `email`: the email address of the user
 * - `password`: the password for the user
 * - `c_password`: the confirmation password, must match the `password` field
 *
 * If the validation passes, a new user is created and a success response is returned with the user's name and an access token.
 * If the validation fails, an error response is returned with the validation errors.
 *
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param Request $request The incoming request
 *                         =======
 * @param Request $request The incoming request
 *
 * >>>>>>> laraxot/develop
 *
 * =======
 * @param Request $request The incoming request
 *
 * >>>>>>> a382d4f1 (.)
 *
 * @return JsonResponse The JSON response
 */
declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Http\Controllers\XotBaseController;

class RegisterController extends XotBaseController
{
    /**
     * Register api.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $success = [];
        $messages = __('user::validation');
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                // 'password' => 'required',
                'password' => ['required', PasswordRule::defaults()],
                'c_password' => 'required|same:password',
            ],
            $messages,
        );
<<<<<<< HEAD
=======
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
            'password' => ['required',  PasswordRule::defaults()],
            'c_password' => 'required|same:password',
        ], $messages);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->all());
        }

<<<<<<< HEAD
<<<<<<< HEAD
        /** @var array<string, mixed> $input */
        $input = $request->all();
        $input['password'] = bcrypt((string) $input['password']);
=======
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
>>>>>>> fbc8f8e (.)
=======
        /** @var array<string, mixed> $input */
        $input = $request->all();
        $input['password'] = bcrypt((string) $input['password']);
>>>>>>> 6d20fbe (.)
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
        $user = $user_class::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = isset($user->name) ? $user->name : '';

        return $this->sendResponse('User register successfully.', $success);
    }
}
