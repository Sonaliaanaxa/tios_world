
@include("admin.layouts.sidebar")
@include("admin.layouts.flash_msg")

<div class="page-wrapper">
            <div class="content container-fluid">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
 
              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
      
        <form method='post'  action="{{ route('pincode.create') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

            <div class="card ">
              <div class="card-header card-header-default" >
                <h4 class="card-title">{{ __($title) }}
                <a href="{{route('pincode.list')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-arrow-left' style='font-size:12px;'>  {{ __('Back') }}</i> </a>
                  
                </h4>
               
                   
              </div>

              
              <div class="card-body ">

               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Area Name') }}</label>
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{old('name')}}" id="input-name" type="text" placeholder="{{ __('Name') }}"  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">Area Name is empty!</span>
                      @endif
                    </div>
                  </div>
    
                <label class="col-sm-2 col-form-label">{{ __('Pincode') }}</label>
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('pincode') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('pincode') ? ' is-invalid' : '' }}" name="pincode" value="{{old('pincode')}}" id="input-pincode" type="text" placeholder="{{ __('Pincode') }}"  aria-required="true"/>
                      @if ($errors->has('pincode'))
                        <span id="pincode-error" class="error text-danger" for="input-pincode">Please Enter max 6 digits!</span>
                      @endif
                    </div>
                  </div>

                    

                </div>

      

                  <br>

                <div class="row"  id="file-content" >
                          
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