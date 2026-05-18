<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesPublicDiskImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SliderController extends Controller
{
    use ManagesPublicDiskImages;

    public function index(): View
    {
        $sliders = Slider::latest()->paginate(15);

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create(): View
    {
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request): RedirectResponse
    {
        Slider::create([
            'title' => $request->input('title'),
            'hashtag' => $request->input('hashtag'),
            'image' => $this->storeSingleImage($request->file('image'), 'slider'),
        ]);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider): View
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider): RedirectResponse
    {
        $data = [
            'title' => $request->input('title'),
            'hashtag' => $request->input('hashtag'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $this->replaceSingleImage($slider->image, $request->file('image'), 'slider');
        }

        $slider->update($data);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        if ($slider->image) {
            $this->deleteStoredImages([$slider->image]);
        }

        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}
