
@include("admin.layouts.sidebar")

<div class="page-wrapper">
            <div class="content container-fluid">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
 
              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
      
        <form method='post'  action="{{ route('home.slide.create') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

            <div class="card ">
              <div class="card-header card-header-default" >
                <h4 class="card-title">{{ __($title) }}
                <a href="{{route('home.slide.list')}}"  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-arrow-left' style='font-size:12px;'>  {{ __('Back') }}</i> </a>
                  
                </h4>
               
              
                   
              </div>

              
              <div class="card-body ">

               
                <div class="row">
        

                <label class="col-sm-2 col-form-label">{{ __('Title :') }}</label>
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{old('title')}}" id="input-title" type="text" placeholder="{{ __('Title') }}"  aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">Title is empty!</span>
                      @endif
                    </div>
                  </div>

    

                  <label class="col-sm-2 col-form-label">{{ __('Details :') }}</label>
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" value="{{old('details')}}" id="input-details" type="details" placeholder="{{ __('Details') }}"  aria-required="true"/>
                      <input  name="old_details"  type="hidden" />
                      @if ($errors->has('details'))
                        <span id="details-error" class="error text-danger" for="input-details">Details is Empty!</span>
                      @endif
                    </div>
                  </div>

                </div>

      

                  <br>

                <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload  Image')}}</label>
                          <div class="col-sm-10">
                          <label htmlFor="myImage" > 
                          <input type="file" name="myImage" required
                          style="background-color:#0099cc;color:white;width:100%;padding:6px;"

                              class="form-control-file" 
                              accept="image/x-png,image/gif,image/jpeg,image/jpg" 
                              id="myImage"
                          /></label>
                             </div>
                      

                             <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
              </div>

              </div>
            
            </div>

        </div>
	          </form>
     
    </div>
  </div>

  </div>
  </div>
  </div>