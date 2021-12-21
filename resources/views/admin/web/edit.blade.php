

@include("admin.layouts.sidebar")

<div class="page-wrapper">
            <div class="content container-fluid">

<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
      
        <form method='post'  action="{{ route('web.info') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

            <div class="card ">
              <div class="card-header card-header-default" >
                <h4 class="card-title">{{ __($title) }}
                  
                </h4>
               
              
                   
              </div>

              
              <div class="card-body ">
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Website  Name') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $web->name}}" id="input-name" type="text" placeholder="{{ __('Name') }}"  aria-required="true"/>
                      <input  name="id" value="{{ $web->id}}" type="hidden" />
                    
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">Company name is empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Website URL') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ $web->url}}" id="input-url" type="text" placeholder="{{ __('url') }}"  aria-required="true"/>
                      @if ($errors->has('url'))
                        <span id="url-error" class="error text-danger" for="input-url">Website URL is empty!</span>
                      @endif
                    </div>
                  </div>

                  
                  <label class="col-sm-2 col-form-label">{{ __('Email 1') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ $web->email}}" id="input-email" type="text" placeholder="{{ __('Email') }}"  aria-required="true"/>
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Email 2') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('email2') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email2') ? ' is-invalid' : '' }}"  name="email2" value="{{ $web->email2}}" id="input-email2" type="text" placeholder="{{ __('Email 2') }}"  aria-required="true"/>
                      @if ($errors->has('email2'))
                        <span id="email2-error" class="error text-danger" for="input-email2">Email is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Mobile 1') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $web->mobile}}" id="input-mobile" type="number" placeholder="{{ __('Mobile') }}"  aria-required="true"/>
                      @if ($errors->has('mobile'))
                        <span id="mobile-error" class="error text-danger" for="input-mobile">Mobile is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Mobile 2') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('mobile2') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('mobile2') ? ' is-invalid' : '' }}" name="mobile2" value="{{ $web->mobile2}}" id="input-mobile" type="number" placeholder="{{ __('Mobile 2') }}"  aria-required="true"/>
                      @if ($errors->has('mobile2'))
                        <span id="mobile2-error" class="error text-danger" for="input-mobile2">Mobile is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Whatsapp Number') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('whatsapp') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('whatsapp') ? ' is-invalid' : '' }}" name="whatsapp" value="{{ $web->whatsapp}}" id="input-whatsapp" type="number" placeholder="{{ __('Whatsapp') }}"  aria-required="true"/>
                      @if ($errors->has('whatsapp'))
                        <span id="whatsapp-error" class="error text-danger" for="input-whatsapp">Whatsapp number is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Facebook Link') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('fb') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fb') ? ' is-invalid' : '' }}" name="fb" value="{{ $web->fb}}" id="input-fb" type="text" placeholder="{{ __('Facebook') }}"  aria-required="true"/>
                      @if ($errors->has('fb'))
                        <span id="fb-error" class="error text-danger" for="input-fb">Facebook Link is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Twitter Link') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ $web->twitter}}" id="input-twitter" type="text" placeholder="{{ __('Twitter') }}"  aria-required="true"/>
                      @if ($errors->has('twitter'))
                        <span id="twitter-error" class="error text-danger" for="input-twitter">Twitter Link is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Linkedin Link') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('linkedin') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" value="{{ $web->linkedin}}" id="input-linkedin" type="text" placeholder="{{ __('Linkedin') }}"  aria-required="true"/>
                      @if ($errors->has('linkedin'))
                        <span id="linkedin-error" class="error text-danger" for="input-linkedin">Linkedin Link is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Instagram Link') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('instagram') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" value="{{ $web->instagram}}" id="input-instagram" type="text" placeholder="{{ __('Instagram') }}"  aria-required="true"/>
                      @if ($errors->has('instagram'))
                        <span id="instagram-error" class="error text-danger" for="input-instagram">Instagram Link is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Skype Id') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('skype') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('skype') ? ' is-invalid' : '' }}" name="skype" value="{{ $web->skype}}" id="input-skype" type="text" placeholder="{{ __('Skype Id') }}"  aria-required="true"/>
                      @if ($errors->has('skype'))
                        <span id="skype-error" class="error text-danger" for="input-skype">Skype id is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Youtube Link') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('youtube') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" name="youtube" value="{{ $web->youtube}}" id="input-youtube" type="text" placeholder="{{ __('youtube') }}"  aria-required="true"/>
                      @if ($errors->has('youtube'))
                        <span id="youtube-error" class="error text-danger" for="input-youtube">Youtube Link is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $web->address}}" id="input-address" type="address" placeholder="{{ __('Address') }}"  aria-required="true"/>
                      <input  name="old_address"  type="hidden" />
                      @if ($errors->has('address'))
                        <span id="address-error" class="error text-danger" for="input-address">Address is Empty!</span>
                      @endif
                    </div>
                  </div>

          <label class="col-sm-2 col-form-label">{{ __('GST No.') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('gst') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('gst') ? ' is-invalid' : '' }}" name="gst" value="{{ $web->gst}}" id="input-gst" type="gst" placeholder="{{ __('GST No.') }}"  aria-required="true"/>
                      
                      @if ($errors->has('gst'))
                        <span id="gst-error" class="error text-danger" for="input-gst">GST No. is Empty!</span>
                      @endif
                    </div>
                  </div>
                            <label class="col-sm-2 col-form-label">{{ __('Fssai No.') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('cin') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('cin') ? ' is-invalid' : '' }}" name="cin" value="{{ $web->cin}}" id="input-cin" type="cin" placeholder="{{ __('Fssai No.') }}"  aria-required="true"/>
                      
                      @if ($errors->has('cin'))
                        <span id="cin-error" class="error text-danger" for="input-cin">Fssai No. is Empty!</span>
                      @endif
                    </div>
                  </div>
                </div>

        

                  <br>

                <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload logo')}}</label>
                          <div class="col-sm-9">
                          <label htmlFor="myImage" > 
                          <input type="file" name="myImage" 
                          style="background-color:#0099cc;color:white;width:100%;padding:6px;"

                              class="form-control-file" 
                              accept="image/x-png,image/gif,image/jpeg,image/jpg" 
                              id="myImage"
                          /></label>
                          <br>
                          <img src="{{ asset('/uploads/logo') }}/{{ $web->logo }}" style='margin-bottom:30px;height:130px;width:300px;border-radius:5%;'/>
                                <br>

                               </div>
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
