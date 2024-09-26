@extends('admin.layouts.app')

@section('content')

<div class="mx-4 content-p-mobile">
    <div class="page-header-tp">
        <h3>Edit Membership</h3>
           
        <div class="top-bntspg-hdr">
            <a href="{{ route('membership.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
    </div>
    <div class="body-content-new">
        <form action="{{ route('membership.update', $membership->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{isset($membership->id) ? $membership->id :''}}">

            <div class="mb-3 row">
                <label for="category" class="col-md-4 col-form-label text-md-end text-start">Select Category</label>
                <div class="col-md-8">
                    
                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', isset($membership->category) ? $membership->category :'') }}">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$membership->category_id == $category->id ? "selected" : ""}}>{{$category->name}} </option>
                    @endforeach
                </select> 
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', isset($membership->name) ? $membership->name :'') }}">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                <div class="col-md-8">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', isset($membership->description) ? $membership->description :'') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
           
            
            <div class="mb-3 row">
                <label for="price" class="col-md-4 col-form-label text-md-end text-start">price</label>
                <div class="col-md-8">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', isset($membership->price) ? $membership->price :'') }}">
                    @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
            </div>
              
            <div class="mb-3 row">
                <input type="submit" class="col-md-4 offset-md-6 btn btn-primary" value="Update Membership">
            </div>

        </form>
    </div>
</div>

@endsection