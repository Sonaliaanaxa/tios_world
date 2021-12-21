@include("home.layouts.header")


<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
	
			<!-- /Breadcrumb -->
			<!-- Home Banner -->
    <section class="section section-search" style="    background-size: cover;
    width: 100%;
    padding: 20px 0 120px;">
        
        <div class="ask-question-form">
        <div class="container" >
                
            <div class="row">
           	<!-- Add Blog -->
           	<div class="col-md-6">
			<div class="ask-question" style="padding: 40px 30px;margin-top: 18px; border: 1px solid #09dca45e;
    margin: 0 auto; background-color: rgba(255,255,255,0.75);">
							
                        <form method='post'  action="{{route('ask.question')}}"  enctype="multipart/form-data">
                    @csrf
                      @include('home.layouts.flash_msg')
                        <div class="service-fields mb-3">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label>Details <span class="red">*</span></label>
                                 <div class="form-group{{ $errors->has('detail') ? ' has-danger' : '' }}">
                                 <textarea maxlength="5000" rows="5" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" id="input-detail" type="text" placeholder="{{ __('Enter your Requirement') }}"  value="{{ old('detail') }}"  aria-required="true"/></textarea>
                               @if ($errors->has('detail'))
                                 <span id="detail-error" class="error text-danger" for="input-detail">Detail is Empty!</span>
                               @endif
                             </div>

                              
                              </div>
                              <div class="form-group col-md-12">
                                 <div class="lybText--darkest lybText--small lybText--bolder lybMar-top-btm">
                                    I am looking for
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="looking_for"  value="Just information" checked>
                                    <label class="form-check-label" for="just_information">
                                    Just information
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="looking_for" id="exampleRadios2" value="Treatment details">
                                    <label class="form-check-label" for="treatment_details">
                                    Treatment details
                                    </label>
                                 </div>
                              </div>

                              <div class="form-group col-md-6">
                                 <label for="ask-q">Email</label>
                                 <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}"  value="{{ old('email') }}"  aria-required="true"/>
                               @if ($errors->has('email'))
                                 <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                               @endif
                             </div>
                                 
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="ask-q">Phone Number</label>
                                 <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="number" placeholder="{{ __(' Phone No') }}"  value="{{ old('phone') }}"  aria-required="true"/>
                               @if ($errors->has('phone'))
                                 <span id="phone-error" class="error text-danger" for="input-phone">Phone No is Empty!</span>
                               @endif
                             </div>
                                
                              </div>
                              <div class="form-group col-md-12">
                                 <div class="submit-section">
                                    <button class="btn btn-primary submit-btn btn-lg btn-block" type="submit" name="form_submit" value="submit">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
								<!-- /Add Blog -->
  </div>
             </div>
            </div>
        </div>
          </div>
    </section>
    <!-- /Home Banner end -->
		

	</body>
@include("home.layouts.footer")