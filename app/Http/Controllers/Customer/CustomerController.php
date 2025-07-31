<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\ContactConfirmationMail;
use App\Mail\WelcomeCustomerMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\MainCategory;
use App\Models\Offer;
use App\Models\Partner;
use App\Models\Product;
use App\Models\About;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\ScrollBanners;
use App\Models\Social;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    // Handles customer login and registration=========================================>
    public function loginView()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();

        return view('login', compact('maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts'));
    }

    public function registerView()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();

        return view('register', compact('maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:customers,email',
            'mobile'   => 'required',
            'password' => 'required|string|min:6',
        ]);

        try {
            $customer = Customer::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'mobile'   => $validated['mobile'],
                'password' => bcrypt($validated['password']),
            ]);

            Mail::to($customer->email)->send(new WelcomeCustomerMail($customer->name));



            return redirect()->route('customer.login')->with('success', 'Registered successfully.');
        } catch (QueryException $e) {

            if ($e->errorInfo[1] == 1062) {
                return back()->withInput()->withErrors(['email' => 'This email is already registered.']);
            }

            return back()->withInput()->withErrors(['general' => 'Something went wrong. Please try again.']);
        }
    }

    public function login(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::guard('customers')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('home'))->with('success', 'Login successful.');
            }

            // If credentials are incorrect
            return back()->withInput()->withErrors([
                'email' => 'Invalid credentials. Please check your email or password.',
            ]);
        } catch (ValidationException $e) {

            throw $e;
        } catch (QueryException $e) {
            return back()->withInput()->withErrors([
                'general' => 'A system error occurred. Please try again later.',
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'general' => 'Unexpected error. Contact support if this continues.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('customers')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
    // Handles customer login and registration=========================================>

    // About Page=======================================================>
    public function aboutView()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();

        $user = Auth::guard('customers')->user();

        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();


        return view('about', compact('maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts', 'user', 'cartCount'));
    }

    public function homeView()
    {
        $scrollingBanners = ScrollBanners::all();
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();


        $products = Product::with('subCategory', 'mainCategory')
            ->inRandomOrder()
            ->take(8)
            ->get();

        foreach ($products as $product) {
            $decoded = json_decode($product->images, true);
            $product->image = isset($decoded[0]) ? str_replace('\\/', '/', $decoded[0]) : null;
        }


        if (Auth::guard('customers')->check()) {
            return view('customer-home', compact('scrollingBanners', 'offers', 'maincategories', 'subCategories', 'products', 'partners', 'socials', 'cartCount'));
        }
        return view('home', compact('scrollingBanners', 'offers', 'maincategories', 'subCategories', 'products', 'partners', 'socials', 'cartCount'));
    }

    public function allProductsView($mainSlug, $subSlug)
    {

        $mainCategory = MainCategory::where('slug', $mainSlug)->first();
        if (!$mainCategory) {
            abort(404, "Main category not found");
        }

        $subCategory = SubCategory::where('slug', $subSlug)
            ->where('main_category_id', $mainCategory->id)
            ->first();

        if (!$subCategory) {
            abort(404, "Sub category not found");
        }

        $products = Product::where('sub_category_id', $subCategory->id)->get();


        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();


        return view('all-products', compact('mainCategory', 'subCategory', 'products', 'offers', 'partners', 'socials', 'maincategories', 'subCategories', 'cartCount'));
    }

    public function productDetailsView($mainSlug, $subSlug, $productSlug)
    {

        $mainCategory = MainCategory::where('slug', $mainSlug)->first();
        if (!$mainCategory) {
            abort(404, "Main category not found");
        }

        $subCategory = SubCategory::where('slug', $subSlug)
            ->where('main_category_id', $mainCategory->id)
            ->first();

        if (!$subCategory) {
            abort(404, "Sub category not found");
        }

        $product = Product::where('slug', $productSlug)
            ->where('sub_category_id', $subCategory->id)
            ->first();

        if (!$product) {
            abort(404, "Product not found");
        }

        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();

        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();

        $allProducts = Product::with('subCategory', 'mainCategory')
            ->inRandomOrder()
            ->get();

        return view('product-details', compact('mainCategory', 'subCategory', 'product', 'offers', 'partners', 'socials', 'maincategories', 'subCategories', 'allProducts', 'cartCount'));
    }

    public function productCategoriesViews()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();

        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();

        return view('products-categories', compact('maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts', 'cartCount'));
    }

    public function blogsView()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();
        $blogs = Blog::all();
        $lastOneBlog = Blog::latest()->first();

        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();

        return view('blogs', compact('maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts', 'blogs', 'lastOneBlog', 'cartCount'));
    }

    public function blogDetailsView($blogSlug)
    {
        $blog = Blog::where('slug', $blogSlug)->first();
        if (!$blog) {
            abort(404, "Blog not found");
        }

        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();
        $blogs = Blog::all();
        $lastOneBlog = Blog::latest()->first();

        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();

        return view('blog-details', compact('blog', 'maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts', 'lastOneBlog', 'blogs', 'cartCount'));
    }

    public function faqView()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();
        $blogs = Blog::all();
        $lastOneBlog = Blog::latest()->first();
        $faqs = Faq::all();

        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();

        return view('faq', compact('maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts', 'lastOneBlog', 'blogs', 'faqs', 'cartCount'));
    }

    public function contactView()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();

        $customerId = Auth::guard('customers')->id();
        $cartCount = Cart::where('customer_id', $customerId)->count();

        return view('contact', compact('maincategories', 'subCategories', 'offers', 'partners', 'socials', 'abouts', 'cartCount'));
    }


    public function contactFormSend(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);

        // Send confirmation mail to user
        Mail::to($validated['email'])->send(new ContactConfirmationMail($validated));

        return redirect()->route('customer.contact')->with('success', 'Your message has been sent successfully.');
    }

    public function cartView()
    {
        $maincategories = MainCategory::with('subCategory')->get();
        $subCategories = SubCategory::with('products', 'mainCategory')->get();
        $offers = Offer::all();
        $partners = Partner::all();
        $socials = Social::all();
        $abouts = About::all();

        $customerId = Auth::guard('customers')->id();
        $customer = Auth::guard('customers')->user();


        $cartItems = Cart::with('product')
            ->where('customer_id', $customerId)
            ->get();

        $totalQuantity = 0;
        $totalRate = 0;
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $qty = $item->quantity;
            $price = $item->product->selling_price ?? 0;

            $totalQuantity += $qty;
            $totalRate += $price;
            $totalAmount += $price * $qty;
        }

        $cartCount = Cart::where('customer_id', $customerId)->count();

        return view('cart', compact(
            'maincategories',
            'subCategories',
            'offers',
            'partners',
            'socials',
            'abouts',
            'cartItems',
            'cartCount',
            'customer',
            'totalQuantity',
            'totalRate',
            'totalAmount'
        ));
    }


    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $customerId = Auth::guard('customers')->id();

        $exists = Cart::where('customer_id', $customerId)
            ->where('product_id', $request->product_id)
            ->where('size', $request->size)
            ->where('color', $request->color)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'This product (same size & color) is already in your cart.');
        }

        Cart::create([
            'customer_id' => $customerId,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'color' => $request->color,
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function removeFromCart(Request $request)
    {
        $customerId = Auth::guard('customers')->id();
        Cart::where('customer_id', $customerId)->where('id', $request->cart_id)->delete();
        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
