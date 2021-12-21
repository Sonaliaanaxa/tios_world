

@include("admin.layouts.sidebar")

<div class="page-wrapper">
            <div class="content container-fluid">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
      
        <form method='post'  action="{{route('side.slider.update',$id)}}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

            <div class="card ">
              <div class="card-header card-header-default" >
                <h4 class="card-title">{{ __($title) }}
                  <a href="{{route('side.slider.list')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-arrow-left' style='font-size:12px;'>  {{ __('Back') }}</i> </a>
                
                  
                </h4>  </div>

              
              <div class="card-body ">
               <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $homeslides->title}}" id="input-title" type="text" placeholder="{{ __('Title') }}"  aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">Title is empty!</span>
                      @endif
                    </div>
                  </div>
               

                     <label class="col-sm-2 col-form-label">{{ __('Status*') }}</label>
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status"   >
                            <option value='{{ $homeslides->status }}'>{{ $homeslides->status }}</option>
                            <option value='1' {{ ('1'==$homeslides->status)?'selected':''}}> Activate </option>  
                            <option value='0' {{ ('0'==$homeslides->status)?'selected':''}}> Deactivate</option>
                       </select>  @if ($errors->has('status'))
                        <span id="status-error" class="error text-danger" for="input-status"> Status</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload  Image')}}</label>
                          <div class="col-sm-10">
                          <label htmlFor="myImage" > 
                          <input type="file" name="myImage" 
                          style="background-color:#0099cc;color:white;width:100%;padding:6px;"

                              class="form-control-file" 
                              accept="image/x-png,image/gif,image/jpeg,image/jpg" 
                              id="myImage"
                          /></label>
                          <br>
                          <img src="{{ asset('/uploads/homeslider') }}/{{ $homeslides->img }}" style='margin-bottom:30px;height:200px;width:450px;'/>
                                <br>
                             </div>
                        

                             <div class="card-footer ml-auto mr-auto" align='right'>
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