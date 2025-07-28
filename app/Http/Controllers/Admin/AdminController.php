<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\MainCategory;
use App\Models\Offer;
use App\Models\ScrollBanners;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function registerView()
    {
        return view('admin.admin-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:customers,email',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registered successfully.');
    }

    public function loginView()
    {
        return view('admin.admin-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')->with('success', 'Login successful.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    public function dashboardView()
    {

        return view('admin.admin-dashboard');
    }

    // Scroll Banners==============================================================>
    public function scrollBannersView()
    {
        $scrollBanners = ScrollBanners::all();

        return view('admin.admin-scroll-banners', compact('scrollBanners'));
    }


    public function addScrollBanner(Request $request)
    {
        // Validate image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Store the image in 'public/scroll_banners' (maps to storage/app/public/scroll_banners)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('scroll_banners', 'public'); // stores inside storage/app/public/scroll_banners

            // Save to DB
            ScrollBanners::create([
                'image' => $path, // only relative path needed
            ]);

            return back()->with('success', 'Scroll banner added successfully!');
        }

        return back()->with('error', 'Image upload failed.');
    }


    public function editScrollBanner(Request $request, $id)
    {
        // Validate image
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Find the banner
        $banner = ScrollBanners::findOrFail($id);

        // If a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            // Store new image
            $path = $request->file('image')->store('scroll_banners', 'public');
            $banner->image = $path;
        }

        $banner->save();

        return back()->with('success', 'Scroll banner updated successfully!');
    }

    public function deleteScrollBanner($id)
    {
        // Find the banner
        $banner = ScrollBanners::findOrFail($id);

        // Delete the image file if it exists
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        // Delete the banner record from the database
        $banner->delete();

        return back()->with('success', 'Scroll banner deleted successfully!');
    }

    // Offers Add==============================================================>
    public function offersAddView()
    {
        $offers = Offer::all();
        return view('admin.admin-offers-add', compact('offers'));
    }

    public function addOffers(Request $request)
    {
        // Validate image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Store the image in 'public/scroll_banners' (maps to storage/app/public/scroll_banners)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('scroll_banners', 'public'); // stores inside storage/app/public/scroll_banners

            // Save to DB
            Offer::create([
                'image' => $path, // only relative path needed
            ]);

            return back()->with('success', 'Scroll banner added successfully!');
        }

        return back()->with('error', 'Image upload failed.');
    }


    public function editOffers(Request $request, $id)
    {
        // Validate image
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Find the banner
        $banner = Offer::findOrFail($id);

        // If a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            // Store new image
            $path = $request->file('image')->store('scroll_banners', 'public');
            $banner->image = $path;
        }

        $banner->save();

        return back()->with('success', 'Scroll banner updated successfully!');
    }

    public function deleteOffers($id)
    {
        // Find the banner
        $banner = Offer::findOrFail($id);

        // Delete the image file if it exists
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        // Delete the banner record from the database
        $banner->delete();

        return back()->with('success', 'Scroll banner deleted successfully!');
    }

    // Main Category==============================================================>
    public function mainCategoryView()
    {
        $maincategories = MainCategory::all();
        return view('admin.admin-main-category', compact('maincategories'));
    }


    public function addMainCategory(Request $request)
    {
        // Validate input
        $request->validate([
            'main_category_name' => 'required|string|max:255|unique:main_categories,main_category_name',
        ]);

        // Create new main category
        MainCategory::create([
            'main_category_name' => $request->main_category_name,
            'slug' => Str::slug($request->main_category_name),
        ]);

        return back()->with('success', 'Main category added successfully!');
    }

    public function editMainCategory(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'main_category_name' => 'required|string|max:255|unique:main_categories,main_category_name,' . $id,
        ]);

        // Find the main category
        $mainCategory = MainCategory::findOrFail($id);

        // Update main category
        $mainCategory->update([
            'main_category_name' => $request->main_category_name,
            'slug' => Str::slug($request->main_category_name),
        ]);

        return back()->with('success', 'Main category updated successfully!');
    }

    public function deleteMainCategory($id)
    {
        // Find the main category
        $mainCategory = MainCategory::findOrFail($id);

        // Delete the main category
        $mainCategory->delete();

        return back()->with('success', 'Main category deleted successfully!');
    }

    // Sub Category==============================================================>

    public function subCategoryView()
    {
        $subcategories = SubCategory::with('mainCategory')->get();
        $maincategories = MainCategory::get();
        return view('admin.admin-sub-category', compact('subcategories', 'maincategories'));
    }

    public function addSubCategory(Request $request)
    {
        // Validate input
        $request->validate([
            'sub_category_name' => 'required|string|max:255|unique:sub_categories,sub_category_name',
            'main_category_id' => 'required|exists:main_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Create new sub category
        SubCategory::create([
            'sub_category_name' => $request->sub_category_name,
            'main_category_id' => $request->main_category_id,
            'slug' => Str::slug($request->sub_category_name),
            'image' => $request->hasFile('image') ? $request->file('image')->store('sub_categories', 'public') : null,
        ])->save();
        return back()->with('success', 'Sub category added successfully!');
    }

    public function editSubCategory(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'sub_category_name' => 'required|string|max:255|unique:sub_categories,sub_category_name,' . $id,
            'main_category_id' => 'required|exists:main_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Find the subcategory
        $subCategory = SubCategory::findOrFail($id);

        // If new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($subCategory->image && Storage::disk('public')->exists($subCategory->image)) {
                Storage::disk('public')->delete($subCategory->image);
            }

            // Store new image
            $newImagePath = $request->file('image')->store('sub_categories', 'public');
        } else {
            $newImagePath = $subCategory->image; // keep old image
        }

        // Update the subcategory
        $subCategory->update([
            'sub_category_name' => $request->sub_category_name,
            'main_category_id' => $request->main_category_id,
            'slug' => Str::slug($request->sub_category_name),
            'image' => $newImagePath,
        ]);

        return back()->with('success', 'Sub category updated successfully!');
    }


    public function deleteSubCategory($id)
    {
        // Find the sub category
        $subCategory = SubCategory::findOrFail($id);

        // Delete the image file if it exists
        if ($subCategory->image && Storage::disk('public')->exists($subCategory->image)) {
            Storage::disk('public')->delete($subCategory->image);
        }

        // Delete the sub category record from the database
        $subCategory->delete();

        return back()->with('success', 'Sub category deleted successfully!');
    }
}
