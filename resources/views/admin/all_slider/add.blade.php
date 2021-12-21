
@include("admin.layouts.sidebar")

<div class="page-wrapper">
            <div class="content container-fluid">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
 
              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
      
        <form method='post'  action="{{ route('all.slider.create') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

            <div class="card ">
              <div class="card-header card-header-default" >
                <h4 class="card-title">{{ __($title) }}
                <a href="{{route('all.slider.list')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-arrow-left' style='font-size:12px;'>  {{ __('Back') }}</i> </a>
                  
                </h4>
               
                   
              </div>

              
              <div class="card-body ">

               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Select Navbar') }}</label>
                   <div class="col-sm-12">
                  <div class="form-group{{ $errors->has('navbar_id') ? ' has-danger' : '' }}">
                        <select class="input w-full border mt-2" class="form-control{{ $errors->has('navbar_id') ? ' is-invalid' : '' }}category" name='navbar_id' id="input-navbar_id"   >
                                <option value=''>Select Navbar</option>
                                @foreach($navBar as $c)
                                <option value='{{ $c->id}}' {{ ($c->id==old('navbar_id'))?'selected':''}} > {{ $c->name}} </option> 
                                @endforeach </select>
                              @if ($errors->has('navbar_id'))
                            <span id="navbar_id-error" class="error text-danger" for="input-navbar_id">Navbar is Empty!</span>
                          @endif
                </div>
              </div> 

                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{old('title')}}" id="input-title" type="text" placeholder="{{ __('Title') }}"  aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">Title is empty!</span>
                      @endif
                    </div>
                  </div>
                </div>

      

                  <br>

            <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload Banner*')}}</label>
                          <div class="col-sm-10">
                            <input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg"  name='myImage' id="myImage" class="form-control"  title="Upload image" class="add-input" onChange="displayImage1(this)" >  </div>
                          <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                </div>
                 </div> 
                  
                  <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                  </div>
	          </form>
     
    </div>
  </div>

  </div>
  </div>
  </div>