<?php

declare(strict_types=1);

namespace Modules\ContactUs\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\ContactUs\app\Models\ContactMessage;

class ContactController extends Controller
{
    public function index(): View
    {
        $contacts = ContactMessage::orderBy('id', 'desc')
            ->paginate(10);

        return view('contactus::admin.index', compact('contacts'));
    }

    public function show(ContactMessage $contactMessage): View
    {
        return view('contactus::admin.show', compact('contactMessage'));
    }

    public function read(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->update(['is_read' => 'true']);

        return to_route('dashboard.contact-us.index')
            ->with('success', __('messages.education_success'));
    }
}
