<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesPublicDiskImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryImageRequest;
use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GalleryImageController extends Controller
{
    use ManagesPublicDiskImages;

    public function index(): View
    {
        $images = GalleryImage::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(15);

        return view('admin.gallery-images.index', compact('images'));
    }

    public function create(): View
    {
        return view('admin.gallery-images.create');
    }

    public function store(GalleryImageRequest $request): RedirectResponse
    {
        $sort = $request->input('sort_order');
        if ($sort === null || $sort === '') {
            $sort = (GalleryImage::max('sort_order') ?? 0) + 1;
        }

        GalleryImage::create([
            'image' => $this->storeSingleImage($request->file('image'), 'gallery'),
            'title' => $request->input('title'),
            'sort_order' => (int) $sort,
        ]);

        return redirect()
            ->route('admin.gallery-images.index')
            ->with('success', 'Gallery image added successfully.');
    }

    public function edit(GalleryImage $gallery_image): View
    {
        return view('admin.gallery-images.edit', ['image' => $gallery_image]);
    }

    public function update(GalleryImageRequest $request, GalleryImage $gallery_image): RedirectResponse
    {
        $data = [
            'title' => $request->input('title'),
            'sort_order' => $request->filled('sort_order') ? (int) $request->input('sort_order') : $gallery_image->sort_order,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $this->replaceSingleImage($gallery_image->image, $request->file('image'), 'gallery');
        }

        $gallery_image->update($data);

        return redirect()
            ->route('admin.gallery-images.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(GalleryImage $gallery_image): RedirectResponse
    {
        $this->deleteStoredImages([$gallery_image->image]);
        $gallery_image->delete();

        return redirect()
            ->route('admin.gallery-images.index')
            ->with('success', 'Gallery image removed successfully.');
    }
}
