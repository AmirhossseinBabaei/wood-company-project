<?php

declare(strict_types=1);

namespace Modules\ContactUs\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Modules\ContactUs\Http\Requests\TeamMemberRequest;
use Modules\ContactUs\Models\TeamMember;

class TeamMemberController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $teamMembers = TeamMember::latest()->paginate(10);

        return view('contact-messages::admin.team.index', compact('teamMembers'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('contact-messages::admin.team.create');
    }

    /**
     * @param TeamMemberRequest $request
     * @return RedirectResponse
     */
    public function store(TeamMemberRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/team
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('team', 'public');
        }

        TeamMember::create($data);

        return to_route((app()->getLocale() . ".dashboard.team-members.index"));
    }

    /**
     * @param TeamMember $teamMember
     * @return View
     */
    public function edit(TeamMember $teamMember): View
    {
        return view('contact-messages::admin.team.edit', compact('teamMember'));
    }

    /**
     * @param TeamMember $teamMember
     * @param TeamMemberRequest $request
     * @return RedirectResponse
     */
    public function update(TeamMember $teamMember, TeamMemberRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/team
        if ($request->hasFile('image')) {
            if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {

                //Delete before image
                Storage::disk('public')->delete($data['image']);
            }

            $data['image'] = $request->file('image')
                ->store('team', 'public');
        }

        $teamMember->update($data);

        return to_route((app()->getLocale() . ".dashboard.team-members.index"));
    }

    /**
     * @param TeamMember $teamMember
     * @return View
     */
    public function show(TeamMember $teamMember): View
    {
        return view('contact-messages::admin.team.show', compact('teamMember'));
    }

    /**
     * @param TeamMember $teamMember
     * @return RedirectResponse
     */
    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
            //Delete before image
            Storage::disk('public')->delete($data['image']);
        }

        $teamMember->delete();

        return to_route((app()->getLocale() . ".dashboard.team-members.index"));
    }
}
