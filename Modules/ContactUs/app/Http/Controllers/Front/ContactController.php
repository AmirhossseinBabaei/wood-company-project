<?php

declare(strict_types=1);

namespace Modules\ContactUs\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\ContactUs\app\Models\ContactMessage;
use Modules\ContactUs\Http\Requests\ContactMessageRequest;

class ContactController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view('contactus::front.contact-us');
    }

    /**
     * @param ContactMessageRequest $request
     * @return RedirectResponse
     */
    public function sendForm(ContactMessageRequest $request): RedirectResponse
    {
        $data = $request->validated();
        ContactMessage::create($data);

        return back()->with('success', __('messages.education_success'));
    }
}
