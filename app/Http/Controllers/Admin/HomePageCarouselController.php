<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HomePageCarouselDataTable;
use Illuminate\Http\Request;
use App\Models\HomePageCarousel;
use App\Http\Controllers\Controller;

class HomePageCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomePageCarouselDataTable $dataTable)
    {
        return $dataTable->render('admin.home_page_carousel.index');
        // $carousels = HomePageCarousel::paginate(10);
        // return view('admin.home_page_carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home_page_carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif',
            'status' => 'required',
        ]);

        try {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/front/images/slider'), $filename);

            $data['image'] = 'assets/front/images/slider/' . $filename;
            $data['status'] = ($request->status) ? 1 : 0;

            HomePageCarousel::create($data);

            return redirect()->route('admin.home-page-carousel.index')->with('success', 'HomePageCarousel created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(HomePageCarousel $homePageCarousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomePageCarousel $homePageCarousel)
    {
        // $carousels = HomePageCarousel::where('status', 1)->paginate(10);
        return view('admin.home_page_carousel.edit', compact('homePageCarousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomePageCarousel $homePageCarousel)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif',
            'status' => 'required',
        ]);
        try {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/front/images/slider'), $filename);

            $data['image'] = 'assets/front/images/slider/' . $filename;
            $data['status'] = ($request->status) ? 1 : 0;

            $homePageCarousel->update($data);

            return redirect()->route('admin.home-page-carousel.index')->with('success', 'HomePageCarousel update successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomePageCarousel $homePageCarousel)
    {
        try {
            deletePublicPathFiles(public_path($homePageCarousel->image));
            $homePageCarousel->delete();
            return redirect()->route('admin.home-page-carousel.index')->with('success', 'HomePageCarousel deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changeStatus(Request $request)
    {
        // dd($request->all());
        $status = $request->status;
        $id = $request->id;

        $carousel = HomePageCarousel::find($id);
        if ($carousel) {
            $carousel->update([
                'status' => $status,
            ]);
            return returnWebJsonResponse('Status changed successfully', 'success', $carousel);
        } else {
            return returnWebJsonResponse('Carousel not found');
        }
    }
}
