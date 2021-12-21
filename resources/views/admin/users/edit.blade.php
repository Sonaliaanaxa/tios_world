@include("admin.layouts.app")

@include("admin.layouts.sidebar")
@include("admin.layouts.navbar")
<div class="wrapper ">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
      
        <form method='post'  action="{{ route('users.update',$user->id) }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

            <div class="card ">
              <div class="card-header card-header-default" >
                <h4 class="card-title">{{ __($title) }}
                <a href="{{route('users.list')}}"  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-arrow-left' style='font-size:12px;'>  {{ __('Back') }}</i> </a>
                  
                </h4>
               
              
                   
              </div>

              
              <div class="card-body ">
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Employee Name') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name}}" id="input-name" type="text" placeholder="{{ __('Name') }}"  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Employee ID') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('employee_id') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" value="{{ $user->employee_id}}" id="input-employee_id" type="text" placeholder="{{ __('Employee ID') }}"  aria-required="true"/>
                      @if ($errors->has('employee_id'))
                        <span id="employee_id-error" class="error text-danger" for="input-employee_id">{{ $errors->first('employee_id') }}</span>
                      @endif
                    </div>
                  </div>

                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ $user->email}}" id="input-email" type="text" placeholder="{{ __('Email') }}"  aria-required="true"/>
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $user->mobile}}" id="input-mobile" type="number" placeholder="{{ __('Mobile') }}"  aria-required="true"/>
                      @if ($errors->has('mobile'))
                        <span id="mobile-error" class="error text-danger" for="input-mobile">{{ $errors->first('mobile') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $user->password}}" id="input-password" type="password" placeholder="{{ __('Password') }}"  aria-required="true"/>
                      <input  name="old_password"  type="hidden" />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>


                  <label class="col-sm-2 col-form-label">{{ __('City') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $user->city}}" id="input-city" type="text" placeholder="{{ __('City') }}"  aria-required="true"/>
                      @if ($errors->has('city'))
                        <span id="city-error" class="error text-danger" for="input-city">{{ $errors->first('city') }}</span>
                      @endif
                    </div>
                  </div>


                  <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $user->country}}" id="input-country" type="text" placeholder="{{ __('country') }}"  aria-required="true"/>
                      @if ($errors->has('country'))
                        <span id="country-error" class="error text-danger" for="input-country">{{ $errors->first('country') }}</span>
                      @endif
                    </div>
                  </div>


                  <label class="col-sm-2 col-form-label">{{ __('Zip Code') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="{{ $user->zip_code}}" id="input-zip_code" type="number" placeholder="{{ __('Zip Code') }}"  aria-required="true"/>
                      @if ($errors->has('zip_code'))
                        <span id="zip_code-error" class="error text-danger" for="input-zip_code">{{ $errors->first('zip_code') }}</span>
                      @endif
                    </div>
                  </div>

                </div>
               

                <div class="row">

                  <label class="col-sm-2 col-form-label">{{ __('Department')  }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('department_id') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('department_id') ? ' is-invalid' : '' }}" name='department_id' id="input-department_id"   >
                            <option value=''>Select Department</option>
                            @foreach($departments as $d)
                            <option value='{{ $d->id}}' {{($user->department_id==$d->id)?'selected':''}} > {{ $d->name}} </option> 
                            @endforeach </select>
                           @if ($errors->has('department_id'))
                        <span id="department_id-error" class="error text-danger" for="input-department_id">{{ $errors->first('department_id') }}</span>
                      @endif
                    </div>
                  </div>


                  <label class="col-sm-2 col-form-label">{{ __('Post')  }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('post_id') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('post_id') ? ' is-invalid' : '' }}" name='post_id' id="input-post_id"   >
                            <option value=''>Select Post of Employee</option>
                            @foreach($posts as $d)
                            <option value='{{ $d->id}}' {{($user->post_id==$d->id)?'selected':''}}> {{ $d->name}} </option> 
                            @endforeach </select>
                           @if ($errors->has('post_id'))
                        <span id="post_id-error" class="error text-danger" for="input-post_id">{{ $errors->first('post_id') }}</span>
                      @endif
                    </div>
                  </div>


                 
          
                  <label class="col-sm-2 col-form-label">{{ __('Status')  }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status"   >
                            <option value=''>Do you want to activate the user?</option>
                            <option value='1' {{($user->status=='1')?'selected':''}} > Activate </option>  
                            <option value='0' {{($user->status=='0')?'selected':''}}> Deactivate</option>
                       </select>
               
              @if ($errors->has('status'))
                        <span id="status-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                  <br>

                <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload Profile Image')}}</label>
                          <div class="col-sm-9">
                          <label htmlFor="myImage" > 
                          <input type="file" name="myImage" 
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
