<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogCarouselController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
        // $carousels = Blog::paginate(10);
        // return view('admin.blog.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        try {
            $data['status'] = ($request->status) ? true : false;

            Blog::create($data);

            return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // $carousels = Blog::where('status', 1)->paginate(10);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        try {
            $data['status'] = ($request->status) ? true : false;

            $blog->update($data);

            return redirect()->route('admin.blog.index')->with('success', 'Blog update successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changeStatus(Request $request)
    {
        $status = ($request->status) ? true : false;
        $id = $request->id;
        // dd($status, $id);
        $blog = Blog::find($id);
        if ($blog) {
            $blog->update([
                'status' => $status,
            ]);
            return returnWebJsonResponse('Status changed successfully', 'success', $blog);
        } else {
            return returnWebJsonResponse('Carousel not found');
        }
    }
}
