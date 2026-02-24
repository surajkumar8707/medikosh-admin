@extends('admin.layout.app')
@section('title', 'App Settings Page')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Settings</h3>
        </div>
        <div class="card-body">
            <form class="mb-5" action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="app_name">App Name:</label>
                            <input type="text" name="app_name" class="form-control" placeholder="Enter App Name"
                            value="{{ old('app_name', $setting->app_name ?? '') }}" />
                            @error('app_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="email">Email <small class="text-danger"><b>(Multiple email addresses separated by
                                        commas)</b></small>:</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email"
                                value="{{ old('email', $setting->email ?? '') }}" />
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="whatsapp">WhatsApp:</label>
                            <input type="text" name="whatsapp" class="form-control" placeholder="Enter WhatsApp Number"
                                value="{{ old('whatsapp', $setting->whatsapp ?? '') }}" />
                            @error('whatsapp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="contact">Contact:</label>
                            <input type="text" name="contact" class="form-control" placeholder="Enter Contact Number"
                                value="{{ old('contact', $setting->contact ?? '') }}" />
                            @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="cin_no">CIN Number :</label>
                            <input type="text" name="cin_no" class="form-control" placeholder="Enter cin_no Number"
                                value="{{ old('cin_no', $setting->cin_no ?? '') }}" />
                            @error('cin_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="pan">Pan :</label>
                            <input type="text" name="pan" class="form-control" placeholder="Enter pan Number"
                                value="{{ old('pan', $setting->pan ?? '') }}" />
                            @error('pan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="tan">Tan :</label>
                            <input type="text" name="tan" class="form-control" placeholder="Enter tan Number"
                                value="{{ old('tan', $setting->tan ?? '') }}" />
                            @error('tan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="about">About :</label>
                            <textarea name="about" class="form-control" placeholder="Enter about" >{{ old('about', $setting->about ?? '') }}</textarea>
                            @error('about')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-1" for="header_image">Header Image:</label>
                            <input type="file" accept="image/*" name="header_image" class="form-control" placeholder="Choose Header Image" />
                            @error('header_image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if(!empty($setting->header_image))
                            <div class="my-2">
                                <img class="w-75" src="{{ public_asset($setting->header_image) }}" alt="Header Image"
                                    class="img-fluid">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-2">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
