<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\UserSendResetLinkRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends ApiBaseController
{
    public function sendResetEmailLink(UserSendResetLinkRequest $request)
    {
        $response = $this->broker()->sendResetLink($request->only('email'));

        if($response !== Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages(['Error Occurs']);
        }
        return $this->successResponse();
    }

    protected function broker()
    {
        return Password::broker();
    }
}
