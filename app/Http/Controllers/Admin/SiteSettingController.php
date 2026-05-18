<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteSettingRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        $siteSetting = SiteSetting::current();

        return view('admin.site-settings.edit', compact('siteSetting'));
    }

    public function update(SiteSettingRequest $request): RedirectResponse
    {
        $siteSetting = SiteSetting::current();

        $data = collect($request->validated())
            ->map(fn (?string $v) => $v === '' || $v === null ? null : $v)
            ->all();

        $siteSetting->update($data);

        return redirect()
            ->route('admin.site-settings.edit')
            ->with('success', 'Site contact & social settings saved.');
    }
}
