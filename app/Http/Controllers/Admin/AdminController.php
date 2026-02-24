<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactsDataTable;
use App\DataTables\GalleryDataTable;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialMediaLink;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::where('product_type', '0')->get()->count();
        $product_verifications = Product::where('product_type', '1')->get()->count();
        return view('admin.dashboard', compact('products', 'product_verifications'));
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        // dd($admin);
        return view('admin.profile', compact('admin'));
    }

    public function profileUpdate(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $adminValidate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'country' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        try {
            // dd($request->all(), $adminValidate);
            $admin->update($adminValidate);
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changePassword()
    {
        $admin = Auth::guard('admin')->user();
        // dd($admin);
        return view('admin.profile', compact('admin'));
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Validate the request data
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $currentPassword = $request->current_password;

        // Check if the current password matches the one in the database
        if (!Hash::check($currentPassword, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }

        try {
            // Update the password
            $admin->password = $request->password;
            $admin->save();

            return redirect()->back()->with('success', 'Password updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update password. Please try again.');
        }
    }


    public function setting()
    {
        $setting = Setting::first();
        return view('admin.setting', compact('setting'));
    }

    public function settingUpdate(Request $request, $id)
    {
        $settings = Setting::find($id);
        // dd($settings->toArray());
        // Validate incoming request
        $request->validate([
            'app_name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Regular expression to check multiple emails separated by commas
                    if (!preg_match('/^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})(\s*,\s*[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})*$/', $value)) {
                        $fail($attribute . ' must be a valid email address or a list of email addresses separated by commas.');
                    }
                }
            ],
            'whatsapp' => 'nullable|string|max:20',
            'contact' => 'nullable|string|max:20',
            'cin_no' => 'nullable',
            'pan' => 'nullable',
            'tan' => 'nullable',
            'about' => 'nullable',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        try {
            $input = $request->except(['_token', 'header_image']);
            if ($request->hasFile('header_image')) {

                if ($settings->is_fresh == 0) {
                    deletePublicPathFiles(public_path($settings->header_image));
                }
                $image = $request->file('header_image');
                $imageName = $image->hashName(); // Generate a hashed name for the file
                $image->move(public_path('assets/front/images/header'), $imageName); // Move the uploaded file to public directory

                $input['header_image'] = 'assets/front/images/header/' . $imageName;
                $input['is_fresh'] = 0;
            }

            // Use updateOrCreate to update existing record or create a new one
            Setting::updateOrCreate(
                ['id' => 1], // Assuming there's only one record in the settings table
                $input
            );

            return redirect()->route('admin.setting')->with('success', 'Settings updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function contacts(ContactsDataTable $dataTable)
    {
        try {
            // $contacts = Contact::paginate();
            // return view('admin.contacts', compact('contacts'));
            return $dataTable->render('admin.contacts');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function bookings()
    {
        $bookings = Booking::with('room')->orderBy('created_at', 'DESC')->get(); // Assuming each booking has a 'room' relationship
        return view('admin.bookings.index', compact('bookings'));
    }

    public function socialMedia()
    {
        try {
            $social_media = SocialMediaLink::first();
            return view('admin.social_media', compact('social_media'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function socialMediaUpdate(Request $request, $id)
    {
        try {
            // Validate incoming request
            $request->validate([
                'youTube' => 'nullable|url',
                'instagram' => 'nullable|url',
                'facebook' => 'nullable|url',
                'linkedin' => 'nullable|url',
            ]);

            $input = $request->only(['youTube', 'instagram', 'facebook', 'linkedin']);
            $input['youTube_show'] = (isset($request->youTube_show)) ? true : false;
            $input['instagram_show'] = (isset($request->instagram_show)) ? true : false;
            $input['facebook_show'] = (isset($request->facebook_show)) ? true : false;
            $input['linkedin_show'] = (isset($request->linkedin_show)) ? true : false;
            $input['twitter_show'] = (isset($request->twitter_show)) ? true : false;
            // dd($input, $request->all());

            // Find the social media record by ID or create a new one
            $social_media = SocialMediaLink::updateOrCreate(
                ['id' => $id],
                $input
            );

            return redirect()->route('admin.social.media')->with('success', 'Social media links updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function aboutPage()
    {
    }
    public function galleryPage(GalleryDataTable $dataTable)
    {
        try {
            return $dataTable->render('admin.gallery.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changeStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $gallery = Gallery::find($id);
        if ($gallery) {
            $gallery->update([
                'status' => $status,
            ]);
            return returnWebJsonResponse('Status changed successfully', 'success', $gallery);
        } else {
            return returnWebJsonResponse('Carousel not found');
        }
    }

    public function galleryCreate()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|in:mivan,post_tensioning',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/gallery'), $filename);
            $data['image'] = 'uploads/gallery/' . $filename;
        }

        Gallery::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|in:mivan,post_tensioning',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Optionally delete old image
            if (file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/gallery'), $filename);
            $data['image'] = 'uploads/gallery/' . $filename;
        }

        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if (file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted.');
    }
}
