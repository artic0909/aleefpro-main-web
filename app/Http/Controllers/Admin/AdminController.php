<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Customer;
use App\Models\CartEnquiry;
use App\Models\CustomEnquiry;
use App\Models\Faq;
use App\Models\MainCategory;
use App\Models\ProductEnquiry;
use App\Models\Offer;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ScrollBanners;
use App\Models\Social;
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'offer_percentage' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('offers', 'public');

            Offer::create([
                'image' => $path,
                'link' => $request->link,
                'offer_percentage' => $request->offer_percentage,
            ]);

            return back()->with('success', 'Offer added successfully!');
        }

        return back()->with('error', 'Image upload failed.');
    }

    public function editOffers(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'offer_percentage' => 'nullable|string|max:100',
        ]);

        $offer = Offer::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($offer->image && Storage::disk('public')->exists($offer->image)) {
                Storage::disk('public')->delete($offer->image);
            }

            $path = $request->file('image')->store('offers', 'public');
            $offer->image = $path;
        }

        // Always update these fields regardless of image presence
        $offer->link = $request->link;
        $offer->offer_percentage = $request->offer_percentage;

        $offer->save();

        return back()->with('success', 'Offer updated successfully!');
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

    // Products==============================================================>
    public function getSubCategories(Request $request)
    {
        $subcategories = SubCategory::where('main_category_id', $request->main_category_id)->get();
        return response()->json(['subcategories' => $subcategories]);
    }

    public function productsView()
    {

        $mainCategories = MainCategory::with('subCategories')->get();
        $subCategories = SubCategory::with('mainCategory')->get();
        $products = Product::with('subCategory')->get();
        return view('admin.admin-products', compact('mainCategories', 'products', 'subCategories'));
    }


    public function addProduct(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:255',
            'images.*' => 'nullable|image',
            'sizes' => 'nullable|string',
            'colors' => 'nullable|string',
            'actual_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'description' => 'nullable|string',
            'information' => 'nullable|string',
            'size_chart_image' => 'nullable|image',
            'front_customize' => 'nullable|image',
            'back_customize' => 'nullable|image',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('products/images', $filename, 'public');
                $imagePaths[] = $path;
            }
        }

        $sizeChartPath = null;
        if ($request->hasFile('size_chart_image')) {
            $file = $request->file('size_chart_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $sizeChartPath = $file->storeAs('products/size_charts', $filename, 'public');
        }

        $frontCustomizePath = null;
        if ($request->hasFile('front_customize')) {
            $file = $request->file('front_customize');
            $filename = time() . '_' . $file->getClientOriginalName();
            $frontCustomizePath = $file->storeAs('products/front_customize', $filename, 'public');
        }

        $backCustomizePath = null;
        if ($request->hasFile('back_customize')) {
            $file = $request->file('back_customize');
            $filename = time() . '_' . $file->getClientOriginalName();
            $backCustomizePath = $file->storeAs('products/back_customize', $filename, 'public');
        }



        Product::create([
            'sub_category_id' => $request->sub_category_id,
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'images' => json_encode($imagePaths),
            'sizes' => $request->sizes,
            'colors' => $request->colors,
            'actual_price' => $request->actual_price,
            'selling_price' => $request->selling_price,
            'description' => $request->description,
            'information' => $request->information,
            'size_chart_image' => $sizeChartPath,
            'slug' => Str::slug($request->product_name),
            'front_customize' => $frontCustomizePath,
            'back_customize' => $backCustomizePath,
        ]);

        return back()->with('success', 'Product saved successfully.');
    }

    public function editProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:255',
            'images.*' => 'nullable|image',
            'sizes' => 'nullable|string',
            'colors' => 'nullable|string',
            'actual_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'description' => 'nullable|string',
            'information' => 'nullable|string',
            'size_chart_image' => 'nullable|image',
            'front_customize' => 'nullable|image',
            'back_customize' => 'nullable|image',
        ]);


        if ($request->hasFile('images')) {
            $oldImages = json_decode($product->images ?? '[]', true);
            foreach ($oldImages as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('products/images', $filename, 'public');
                $imagePaths[] = $path;
            }
        } else {
            $imagePaths = json_decode($product->images ?? '[]', true);
        }


        $sizeChartPath = $product->size_chart_image;
        if ($request->hasFile('size_chart_image')) {
            if ($sizeChartPath) {
                Storage::disk('public')->delete($sizeChartPath);
            }
            $file = $request->file('size_chart_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $sizeChartPath = $file->storeAs('products/size_charts', $filename, 'public');
        }

        $frontCustomizePath = $product->front_customize;
        if ($request->hasFile('front_customize')) {
            if ($frontCustomizePath) {
                Storage::disk('public')->delete($frontCustomizePath);
            }
            $file = $request->file('front_customize');
            $filename = time() . '_' . $file->getClientOriginalName();
            $frontCustomizePath = $file->storeAs('products/front_customize', $filename, 'public');
        }

        $backCustomizePath = $product->back_customize;
        if ($request->hasFile('back_customize')) {
            if ($backCustomizePath) {
                Storage::disk('public')->delete($backCustomizePath);
            }
            $file = $request->file('back_customize');
            $filename = time() . '_' . $file->getClientOriginalName();
            $backCustomizePath = $file->storeAs('products/back_customize', $filename, 'public');
        }

        $product->update([
            'sub_category_id' => $request->sub_category_id,
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'images' => json_encode($imagePaths),
            'sizes' => $request->sizes,
            'colors' => $request->colors,
            'actual_price' => $request->actual_price,
            'selling_price' => $request->selling_price,
            'description' => $request->description,
            'information' => $request->information,
            'size_chart_image' => $sizeChartPath,
            'slug' => Str::slug($request->product_name),
            'front_customize' => $frontCustomizePath,
            'back_customize' => $backCustomizePath,
        ]);

        return back()->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $images = json_decode($product->images ?? '[]', true);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
            if ($product->size_chart_image) {
                Storage::disk('public')->delete($product->size_chart_image);
            }
            $product->delete();
            return back()->with('success', 'Product deleted successfully.');
        }
        return back()->with('error', 'Product not found.');
    }

    // Blogs==============================================================>
    public function blogsView()
    {
        $blogs = Blog::all();
        return view('admin.admin-blogs', compact('blogs'));
    }

    public function addBlog(Request $request)
    {

        $request->validate([
            'blog_name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);


        Blog::create([
            'blog_name' => $request->blog_name,
            'description' => $request->description,
            'slug' => Str::slug($request->blog_name),
            'posted_date' => now(),
            'image' => $request->hasFile('image') ? $request->file('image')->store('blogs', 'public') : null,
        ])->save();
        return back()->with('success', 'Blog added successfully!');
    }

    public function editBlog(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'blog_name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $blog = Blog::findOrFail($id);

        // If new image is uploaded
        if ($request->hasFile('image')) {

            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            // Store new image
            $newImagePath = $request->file('image')->store('blogs', 'public');
        } else {
            $newImagePath = $blog->image; // keep old image
        }

        // Update the subcategory
        $blog->update([
            'blog_name' => $request->blog_name,
            'description' => $request->description,
            'slug' => Str::slug($request->blog_name),
            'posted_date' => now(),
            'image' => $newImagePath,
        ]);

        return back()->with('success', 'Blog updated successfully!');
    }

    public function deleteBlog($id)
    {
        // Find the blog
        $blog = Blog::findOrFail($id);

        // Delete the image file if it exists
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }


        $blog->delete();

        return back()->with('success', 'Blog deleted successfully!');
    }

    // Customers==============================================================>
    public function customersView()
    {

        $users = Customer::all();
        return view('admin.admin-users', compact('users'));
    }

    public function deleteCustomer($id)
    {

        $users = Customer::findOrFail($id);

        $users->delete();

        return back()->with('success', 'User deleted successfully!');
    }

    // Partners==============================================================>
    public function partnersView()
    {

        $partners = Partner::all();
        return view('admin.admin-partners', compact('partners'));
    }

    public function addPartner(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);
        $partner = new Partner();
        $partner->image = $request->file('image')->store('partners', 'public');
        $partner->save();

        return back()->with('success', 'Partner added successfully!');
    }

    public function editPartner(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('image')) {
            if ($partner->image && Storage::disk('public')->exists($partner->image)) {
                Storage::disk('public')->delete($partner->image);
            }
            $partner->image = $request->file('image')->store('partners', 'public');
        }

        $partner->save();

        return back()->with('success', 'Partner updated successfully!');
    }

    public function deletePartner($id)
    {
        $partner = Partner::findOrFail($id);
        if ($partner->image && Storage::disk('public')->exists($partner->image)) {
            Storage::disk('public')->delete($partner->image);
        }
        $partner->delete();
        return back()->with('success', 'Partner deleted successfully!');
    }

    // About Page =============================================================>
    public function aboutView()
    {
        $abouts = About::all();
        return view('admin.admin-about', compact('abouts'));
    }

    public function addAboutUs(Request $request)
    {
        $request->validate([
            'breadcrumb' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'side_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'moto' => 'required',
            'vision' => 'required',
        ]);


        About::create([
            'breadcrumb' => $request->hasFile('breadcrumb') ? $request->file('breadcrumb')->store('abouts', 'public') : null,
            'side_image' => $request->hasFile('side_image') ? $request->file('side_image')->store('abouts', 'public') : null,
            'moto' => $request->moto,
            'vision' => $request->vision,

        ])->save();
        return back()->with('success', 'About detaila added successfully!');
    }

    public function editAboutUs(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'breadcrumb' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'side_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'moto' => 'required',
            'vision' => 'required',
        ]);

        if ($request->hasFile('breadcrumb')) {
            if ($about->breadcrumb && Storage::disk('public')->exists($about->breadcrumb)) {
                Storage::disk('public')->delete($about->breadcrumb);
            }
            $about->breadcrumb = $request->file('breadcrumb')->store('abouts', 'public');
        }

        if ($request->hasFile('side_image')) {
            if ($about->side_image && Storage::disk('public')->exists($about->side_image)) {
                Storage::disk('public')->delete($about->side_image);
            }
            $about->side_image = $request->file('side_image')->store('abouts', 'public');
        }

        $about->moto = $request->moto;
        $about->vision = $request->vision;
        $about->save();

        return back()->with('success', 'About detaila updated successfully!');
    }

    public function deleteAboutUs($id)
    {
        $about = About::findOrFail($id);
        if ($about->breadcrumb && Storage::disk('public')->exists($about->breadcrumb)) {
            Storage::disk('public')->delete($about->breadcrumb);
        }
        if ($about->side_image && Storage::disk('public')->exists($about->side_image)) {
            Storage::disk('public')->delete($about->side_image);
        }
        $about->delete();
        return back()->with('success', 'About detaila deleted successfully!');
    }

    // FAQ ====================================================================>
    public function faqView()
    {
        $faqs = Faq::all();
        return view('admin.admin-faq', compact('faqs'));
    }

    public function addFaq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ])->save();

        return back()->with('success', 'Faq added successfully!');
    }

    public function editFaq(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return back()->with('success', 'Faq updated successfully!');
    }

    public function deleteFaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return back()->with('success', 'Faq deleted successfully!');
    }

    // Social ===========================================================>
    public function socialView()
    {
        $socialHandels = Social::all();
        return view('admin.admin-social-handels', compact('socialHandels'));
    }

    public function addSocial(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required|string|max:20',
            'address' => 'required|string',
            'link' => 'nullable|url',
            'fb' => 'nullable|url',
            'insta' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        Social::create([
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'link' => $request->link,
            'fb' => $request->fb,
            'insta' => $request->insta,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        return back()->with('success', 'Social handle added successfully!');
    }

    public function editSocial(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required|string|max:20',
            'address' => 'required|string',
            'link' => 'nullable|url',
            'fb' => 'nullable|url',
            'insta' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $social = Social::findOrFail($id);
        $social->update([
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'link' => $request->link,
            'fb' => $request->fb,
            'insta' => $request->insta,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        return back()->with('success', 'Social handle updated successfully!');
    }

    public function deleteSocial($id)
    {
        $social = Social::findOrFail($id);
        $social->delete();

        return back()->with('success', 'Social handle deleted successfully!');
    }

    // Cart Enquiry ===========================================================>
    public function cartEnquiryView()
    {
        $cartEnquiries = CartEnquiry::with('customer')->latest()->get();

        return view('admin.admin-cart-enquiry', compact('cartEnquiries'));
    }

    public function deleteCartEnquiry($id)
    {
        $cartEnquiry = CartEnquiry::findOrFail($id);
        $cartEnquiry->delete();

        return redirect()->back()->with('success', 'Cart enquiry deleted successfully.');
    }

    // Product Enquiry ===========================================================>
    public function productEnquiryView()
    {
        $enquiries = ProductEnquiry::latest()->get();
        return view('admin.admin-product-enquiry', compact('enquiries'));
    }

    public function deleteProductEnquiry($id)
    {
        $cartEnquiry = ProductEnquiry::findOrFail($id);
        $cartEnquiry->delete();

        return redirect()->back()->with('success', 'Product enquiry deleted successfully.');
    }

    // Custom Product Enquiry ===========================================================>
    public function customProductEnquiryView()
    {

        $enquiries = CustomEnquiry::latest()->get();

        return view('admin.admin-custom-product-enquiry', compact('enquiries'));
    }

    public function deleteCustomEnquiry($id)
    {
        $enquiry = CustomEnquiry::findOrFail($id);

        // Optionally delete image files
        if ($enquiry->company_logo && Storage::disk('public')->exists($enquiry->company_logo)) {
            Storage::disk('public')->delete($enquiry->company_logo);
        }
        if ($enquiry->product_customize_image && Storage::disk('public')->exists($enquiry->product_customize_image)) {
            Storage::disk('public')->delete($enquiry->product_customize_image);
        }

        $enquiry->delete();

        return redirect()->back()->with('success', 'Custom enquiry deleted successfully.');
    }

    // Contact Us ===========================================================>
    public function contactEnquiryView()
    {

        $enquiries = Contact::latest()->get();
        return view('admin.admin-contact-enquiry', compact('enquiries'));
    }

    public function deleteContact($id)
    {
        $enquiry = Contact::findOrFail($id);
        $enquiry->delete();

        return redirect()->back()->with('success', 'Enquiry deleted successfully.');
    }
}
