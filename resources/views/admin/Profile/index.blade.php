@extends('admin.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                  <h4>Update Profile Setting</h4>
                 
                </div>
                <div class="card-body">
                 <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="avatar" id="image-upload" />
                    </div>
                  </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ auth()->user()->name }}">
                      </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ auth()->user()->email }}">
                      </div>
                      <button class="btn btn-primary" type="submit">Update</button>
                 </form>
                </div>
              </div>
              <div class="card card-primary">
                <div class="card-header">
                  <h4>Update Password</h4>
                 
                </div>
                <div class="card-body">
                 <form action="{{ route('admin.profile.password.update') }}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password">
                      </div>
                      <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
                      </div>
                      <button class="btn btn-primary" type="submit">Update</button>
                 </form>
                </div>
              </div>
        </div>
    </section>
@endsection
@push('script')
<script>
  $(document).ready(function(){
    $('.image-preview').css({
      'background-image' : 'url({{ asset(auth()->user()->avatar) }})',
      'background-size' : 'cover',
      'background-position' : 'center center'
    })
  })
</script>
  
@endpush
