

@include("admin.layouts.sidebar")

<div class="page-wrapper">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

<div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="page-title">
                           
                              </h3>
            
            </div>
          </div>
        </div>
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
      
        <form method='post'  action="{{ route('my.user.update.password',$id) }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

            <div class="card ">
              <div class="card-header card-header-default" >
                <h4 class="card-title">{{ __($title) }}
                <a href="#"  class="btn btn-sm btn-default float-right" style='background-color:#a2320f ;color:#fff; text-transform: capitalize;'><i class='fa fa-user-circle' style='font-size:12px;'> 
                {{ $userInfo->user_type }} : {{ $userInfo->name }}<br>
           
                 
                 </i> </a>
                
                </h4>
               
              
                   
              </div>

              
              <div class="card-body ">
               
                <div class="row">
                

                  <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  id="input-password" type="password" placeholder="{{ __('New Password') }}"  aria-required="true"/>
                      <input  name="old_password"  type="hidden" />
                     
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">Please Enter the New Password!</span>
                      @endif
                    </div>
                  </div>
              

                </div>
           
                            
                             <div class="card-footer ml-auto mr-auto col-md-1">
                <button type="submit" class="btn btn-primary" style='float:right;'>{{ __('Save') }}</button>
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
