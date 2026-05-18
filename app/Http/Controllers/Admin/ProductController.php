<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesPublicDiskImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    use ManagesPublicDiskImages;

    public function index(Request $request): View
    {
        $search = $request->string('search')->trim();

        $products = Product::with('category')
            ->when($search->isNotEmpty(), function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'search'));
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'categories' => Category::orderBy('name')->get(),
            'statuses' => $this->statusOptions(),
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $images = $this->storeUploadedImages($request->file('images', []), 'product');

        Product::create([
            ...$request->productAttributes(),
            'image' => $images,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product->load('category'),
            'categories' => Category::orderBy('name')->get(),
            'statuses' => $this->statusOptions(),
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $images = $this->syncStoredImages(
            $request->input('keep_images', []),
            $product->image,
            $request->file('images', []),
            'product',
        );

        if (empty($images)) {
            return back()
                ->withErrors(['images' => 'At least one product image is required.'])
                ->withInput();
        }

        $product->update([
            ...$request->productAttributes(),
            'image' => $images,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->deleteStoredImages($product->image);
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer', 'exists:products,id'],
        ]);

        $products = Product::whereIn('id', $request->input('ids'))->get();

        foreach ($products as $product) {
            $this->deleteStoredImages($product->image);
            $product->delete();
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', count($products).' product(s) deleted.');
    }

    /**
     * @return array<string, string>
     */
    private function statusOptions(): array
    {
        return [
            Product::BEST_SELLER => 'Best Seller',
            Product::NEW_ARRIVAL => 'New Arrival',
            Product::FEATURED => 'Featured',
        ];
    }
}
