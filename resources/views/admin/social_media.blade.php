@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Social Media Links</h3>
            </div>
            <div class="card-body">
                <div class="container">

                    <form action="{{ route('admin.social.media.update', $social_media->id) }}" method="post">
                        @csrf

                        <div class="form-group my-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="form-group my-3">
                            <label for="youTube">YouTube :</label>
                            <input class="form-control" type="url" placeholder="Enter YouTube link" name="youTube"
                                value="{{ old('youTube', $social_media->youTube ?? '') }}" />
                            @error('youTube')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="youTube_show" name="youTube_show"
                                       {{ $social_media->youTube_show ? 'checked' : '' }}>
                                <label class="form-check-label" for="youTube_show">Show on Frontend</label>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="instagram">Instagram :</label>
                            <input class="form-control" type="url" placeholder="Enter Instagram link" name="instagram"
                                value="{{ old('instagram', $social_media->instagram ?? '') }}" />
                            @error('instagram')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="instagram_show" name="instagram_show"
                                       {{ $social_media->instagram_show ? 'checked' : '' }}>
                                <label class="form-check-label" for="instagram_show">Show on Frontend</label>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="facebook">Facebook :</label>
                            <input class="form-control" type="url" placeholder="Enter Facebook link" name="facebook"
                                value="{{ old('facebook', $social_media->facebook ?? '') }}" />
                            @error('facebook')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="facebook_show" name="facebook_show"
                                       {{ $social_media->facebook_show ? 'checked' : '' }}>
                                <label class="form-check-label" for="facebook_show">Show on Frontend</label>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="linkedin">LinkedIn :</label>
                            <input class="form-control" type="url" placeholder="Enter LinkedIn link" name="linkedin"
                                value="{{ old('linkedin', $social_media->linkedin ?? '') }}" />
                            @error('linkedin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="linkedin_show" name="linkedin_show"
                                       {{ $social_media->linkedin_show ? 'checked' : '' }}>
                                <label class="form-check-label" for="linkedin_show">Show on Frontend</label>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="linkedin">Twitter :</label>
                            <input class="form-control" type="url" placeholder="Enter twitter link" name="twitter"
                                value="{{ old('twitter', $social_media->twitter ?? '') }}" />
                            @error('twitter')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="twitter_show" name="twitter_show"
                                       {{ $social_media->twitter_show ? 'checked' : '' }}>
                                <label class="form-check-label" for="twitter_show">Show on Frontend</label>
                            </div>
                        </div>

                        <!-- Add more fields for other social media platforms here -->

                        <button class="btn btn-primary my-2" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
