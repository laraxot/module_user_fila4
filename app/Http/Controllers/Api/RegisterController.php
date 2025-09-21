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
<<<<<<< HEAD
 * @param Request $request The incoming request
 * @return JsonResponse The JSON response
 */
=======
<<<<<<< HEAD
 * @param Request $request The incoming request
 * @return JsonResponse The JSON response
 */
=======
 * @param  \Illuminate\Http\Request  $request  The incoming request
 * @return \Illuminate\Http\JsonResponse The JSON response
 */

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as PasswordRule;
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
            'password' => ['required',  PasswordRule::defaults()],
            'c_password' => 'required|same:password',
        ], $messages);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->all());
        }

<<<<<<< HEAD
        /** @var array<string, mixed> $input */
        $input = $request->all();
        $input['password'] = bcrypt((string) $input['password']);
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var array<string, mixed> $input */
        $input = $request->all();
        $input['password'] = bcrypt((string) $input['password']);
=======
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
>>>>>>> a12f125f4a (.)
=======
        /** @var array<string, mixed> $input */
        $input = $request->all();
        $input['password'] = bcrypt((string) $input['password']);
>>>>>>> b93ef594b4 (.)
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
=======
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user_class = \Modules\Xot\Datas\XotData::make()->getUserClass();
        /** @var \Modules\Xot\Contracts\UserContract */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user = $user_class::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse('User register successfully.', $success);
    }
}
