@extends('admin.layout.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Why Choose Us</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h4>Create Why Choose Us</h4>
          <div class="card-header-action">
            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
              Create New
            </a>
          </div>
        </div>
        <div class="card-body">
           <form action="{{ route('admin.why-choose-us.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Icon</label> <br>
                <button class="btn btn-primary" role="iconpicker" name="icon"></button>
              </div>
            <div class="form-group">
                <label>Title </label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
              </div>

              <div class="form-group">
                  <label>Short Description </label>
                  <textarea name="short_description"  class="form-control">{{ old('short_description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status </label>
                    <select  name="status" class="form-control" value="{{ old('status') }}">
                        <option value="1">Show</option>
                        <option value="0">Hide</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary" >Create</button>

           </form>
        </div>
      </div>
</section>

@endsection
