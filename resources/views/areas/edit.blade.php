@extends('layouts.app')

@section('title', 'Edit a area')



@section('content')
<section>
    <div class="container">
        <h1>Edit a area | {{$area->name}}</h1>
        <div class="mb-3">
        <form action="{{ route('areas.update' , $area) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="form-group">
                <label for="name_en" class="form-label">Name in English</label>
                <input type="text" class="form-control" value={{old('name_en', $name['en'])}} id="name_en" name="name_en">
              </div>

              <div class="form-group">
                <label for="name_ar" class="form-label">Name in Arabic</label>
                <input type="text" class="form-control" value={{old('name_ar', $name['ar'])}} id="name_ar" name="name_ar">
              </div>

            <div class="mb-3">
                <label class="form-label" for="country">Country</label>
                <select class="form-control" name="country">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}"  @if ($country->id==$area->country_id)
                        selected
                    @endif>{{ $country->name }}</option>
                @endforeach
                </select>
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <div class="mb-3">
   </div>
</section>
@endsection


