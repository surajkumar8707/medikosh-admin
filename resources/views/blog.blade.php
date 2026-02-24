@extends('layouts.app')
@section('title', getSettings()->app_name . ':: Blog Page')
@push('styles')
<style>
    .text-purple {
        color: #6f42c1;
    }
</style>
@endpush
@section('content')
    <section></section>
    <br><br>
    <br><br>
    <section class="about-header-box">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-header-content text-center">
                        <h1 class="about-header-title">Blog</h1>
                        <p class="about-header-text">Stay updated with our latest news and insights.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="blog-content">
                        @if ($blog)
                            <h2>{{ $blog->title }}</h2>
                            <p>{!! $blog->content !!}</p>
                        @else
                            <p>No blog content available.</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container-xl">
                        <p class="text-center">Recent Blogs</p>
                        @if (count($blogs) > 0)
                            <ul class="recent-blogs">
                                @foreach ($blogs as $b)
                                    <li><a class="{{ (@$blog->id == @$b->id) ? 'text-purple' : '' }}" href="{{ route('front.blogs', $b->id) }}">{{ $b->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
