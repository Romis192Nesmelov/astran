<?php

namespace App\Http\Controllers;
use App\Http\Requests\Feedback\FeedbackRequest;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    use HelperTrait;

    public function __invoke(FeedbackRequest $request): JsonResponse
    {
        return $this->sendMessage('feedback', env('MAIL_TO'), null, $request->validated());
    }
}
