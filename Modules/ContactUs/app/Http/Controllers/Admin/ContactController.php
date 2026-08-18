<?php

declare(strict_types=1);

namespace Modules\ContactUs\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\ContactUs\app\Models\ContactMessage;

class ContactController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $contacts = ContactMessage::latest()
            ->paginate(10);

        return view('contact-messages::admin.contact-messages.index', compact('contacts'));
    }

    /**
     * @param ContactMessage $contactMessage
     * @return View
     */
    public function show(ContactMessage $contactMessage): View
    {
        return view('contact-messages::admin.contact-messages.show', compact('contactMessage'));
    }

    /**
     * @param ContactMessage $contactMessage
     * @return RedirectResponse
     */
    public function read(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->update(['is_read' => 'true']);

        return to_route((app()->getLocale() . '.dashboard.contact-us.index'))
            ->with('success', __('messages.education_success'));
    }
}
