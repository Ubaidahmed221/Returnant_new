@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Whu Choose Us</h1>
        </div>
        <div class="card">
          <div class="card-body">
            <div id="accordion">
              <div class="accordion">
                <div class="accordion-header bg-primary text-light p-3" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                  <h4>Why Choose Us Titles</h4>
                </div>
                <div class="accordion-body collapse " id="panel-body-1" data-parent="#accordion">
                  <form action="{{ route('admin.why-choose-us-title.update') }}" method="Post">
                    @csrf
                    @method('PUT')
                 <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="top_title" class="form-control" value="{{ @$titles['Why_chosse_us_top_title'] }}" />
                 </div>
                 <div class="form-group">
                  <label>Main Title</label>
                  <input type="text" name="main_title" class="form-control" value="{{ @$titles['Why_chosse_us_Mian_title'] }}" />
                 </div>
                 <div class="form-group">
                  <label>Sub Title</label>
                  <input type="text" name="sub_title" class="form-control" value="{{ @$titles['Why_chosse_us_Sub_title'] }}" />
                 </div>
                 <button class="btn btn-primary" type="submit">Save</button>
                </form>
                </div>
              </div>

            </div>
          </div>
        </div>

    </section>
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
              <h4>All Item</h4>
              <div class="card-header-action">
                <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">
                  Create New
                </a>
              </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
          </div>
    </section>
@endsection
@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
