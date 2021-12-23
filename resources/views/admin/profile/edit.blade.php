@include("admin.layouts.sidebar")

< <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
        <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">
                            {{ __($title) }}
                        </h3>

                        <a href="{{ route('my.profile.view')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
                    </div>
                </div>

            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        @include('admin.layouts.flash_msg')

                        <div class="col-md-12 my-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Update My Profile</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                        <li class="nav-item"><a class="nav-link active" href="#solid-rounded-justified-tab1" data-toggle="tab">Profile Img</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab2" data-toggle="tab">Basic</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                            <div class="card-body">
                                                <h4 class="card-title">Profile Image</h4>
                                                <form method='post' action="{{ route('img.my.profile.update') }}" enctype="multipart/form-data">
                                                    @csrf


                                                    <div class="row form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="change-avatar">
                                                                    <div class="profile-img">

                                                                        <img src="{{ asset('/uploads/profile_img') }}/{{ $user->image }}" style='height:130px;width:130px;border-radius:5%;' />
                                                                    </div>
                                                                    <br>
                                                                    <div class="upload-img">
                                                                        <div class="change-photo-btn">

                                                                            <label htmlFor="myImage">
                                                                                <input type="file" class="upload" name="myImage" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage" /></label>
                                                                        </div>
                                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="submit-section mt-4">
                                                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="solid-rounded-justified-tab2">

                                            <!-- Basic Information -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Basic Information</h4>
                                                    <form method='post' action="{{ route('basic.my.profile.update') }}" enctype="multipart/form-data">
                                                        @csrf


                                                        <div class="row form-row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Name <span class="text-danger">*</span></label>
                                                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name}}" id="input-name" type="text" placeholder="{{ __('Name') }}" aria-required="true" />
                                                                        @if ($errors->has('name'))
                                                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Email <span class="text-danger">*</span></label>
                                                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" readonly name="email" value="{{ $user->email}}" id="input-email" type="text" placeholder="{{ __('Email') }}" aria-required="true" style='background-color:#fafafa;' />
                                                                        @if ($errors->has('email'))
                                                                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone}}" id="input-phone" type="number" placeholder="{{ __('Phone Number') }}" aria-required="true" />
                                                                        @if ($errors->has('phone'))
                                                                        <span id="phone-error" class="error text-danger" for="input-phone">{{ $errors->first('phone') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <!-- /Basic Information -->
                                                        <div class="card contact-card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Business Details</h4>
                                                                <div class="row form-row">


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Business Title</label>
                                                                            <div class="form-group{{ $errors->has('business_title') ? ' has-danger' : '' }}">
                                                                                <input class="form-control{{ $errors->has('business_title') ? ' is-invalid' : '' }}" name="business_title" id="input-business_title" type="text" placeholder="{{ __('Business Title') }}" value="{{ $user->business_title}}" aria-required="true" />
                                                                                @if ($errors->has('business_title'))
                                                                                <span id="business_title-error" class="error text-danger" for="input-business_title">Business Title is Empty!</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Tag Line</label>
                                                                            <div class="form-group{{ $errors->has('tag_line') ? ' has-danger' : '' }}">
                                                                                <input class="form-control{{ $errors->has('tag_line') ? ' is-invalid' : '' }}" name="tag_line" id="input-tag_line" type="text" placeholder="{{ __('Tag Line') }}" value="{{ $user->tag_line}}" aria-required="true" />
                                                                                @if ($errors->has('tag_line'))
                                                                                <span id="tag_line-error" class="error text-danger" for="input-tag_line">Tag Line is Empty!</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- Payment End -->

                                                        <!-- About Me -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">About Business</h4>
                                                                <div class="form-group mb-0">
                                                                    <label>Business</label>
                                                                    <div class="form-group{{ $errors->has('about_business') ? ' has-danger' : '' }}">
                                                                        <textarea class="form-control{{ $errors->has('about_business') ? ' is-invalid' : '' }}" name="about_business" id="input-about_business" type="about_business" value="{{ $user->about_business}}" placeholder="{{ __('About Business') }}" />
                                                                        {{ $user->about_business }}
                                                                        </textarea>
                                                                        <script>
                                                                            CKEDITOR.replace('input-about_business');
                                                                        </script>
                                                                        @if ($errors->has('about_business'))
                                                                        <span id="about_business-error" class="error text-danger" for="input-about_business">Product Details is Empty!</span>
                                                                        @endif
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="submit-section mt-4">
                                                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                        </div>
                                                        <!-- /About Me -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="solid-rounded-justified-tab3">
                                            <div class="card contact-card">
                                                <div class="card-body">
                                                    <h4 class="card-title">General Information </h4>
                                                    <form method='post' action="{{ route('general.my.profile.update') }}" enctype="multipart/form-data">
                                                        @csrf


                                                        <div class="row form-row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                                                        <select class="custom-select {{ $errors->has('gender') ? ' is-invalid' : '' }}" name='gender' id="input-gender">
                                                                            <option value='{{ $user->gender}}'>Select Gender</< /option>

                                                                            <option value="male" {{ ('male'==$user->gender)?'selected':''}}>Male</option>
                                                                            <option value="female" {{ ('female'==$user->gender)?'selected':''}}>Female</option>
                                                                            <option value="other" {{ ('other'==$user->gender)?'selected':''}}>Other</option>
                                                                        </select> @if ($errors->has('gender'))
                                                                        <span id="gender-error" class="error text-danger" for="input-gender">Gender is Empty!</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label>Date of Birth</label>
                                                                    <div class="form-group{{ $errors->has('dbd') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('dbd') ? ' is-invalid' : '' }}" name="dbd" id="input-dbd" type="date" placeholder="{{ __('Date of Birth') }}" value="{{ $user->dbd}}" aria-required="true" />
                                                                        @if ($errors->has('dbd'))
                                                                        <span id="dbd-error" class="error text-danger" for="input-dbd">Date of Birth is Empty!</span>
                                                                        @endif
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="submit-section mt-4">
                                                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="solid-rounded-justified-tab4">
                                            <div class="card contact-card">
                                                <div class="card-body">
                                                    <div class="payment-widget">
                                                        <h4 class="card-title">Payment Information</h4>
                                                        <form method='post' action="{{ route('acc.my.profile.update') }}" enctype="multipart/form-data">
                                                            @csrf


                                                            <!-- Credit Card Payment -->
                                                            <div class="payment-list">
                                                                <label for="card-title">Account Details :</label>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group card-label">
                                                                            <label for="card_name">Account Holder's Name</label>
                                                                            <div class="form-group{{ $errors->has('acc_holder_name') ? ' has-danger' : '' }}">
                                                                                <input class="form-control{{ $errors->has('acc_holder_name') ? ' is-invalid' : '' }}" name="acc_holder_name" id="input-acc_holder_name" type="text" placeholder="{{ __('Account Holder Name') }}" value="{{ $user->acc_holder_name}}" aria-required="true" />
                                                                                @if ($errors->has('acc_holder_name'))
                                                                                <span id="acc_holder_name-error" class="error text-danger" for="input-acc_holder_name">Account Holder's Name is Empty!</span>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group card-label">
                                                                            <label for="card_number">Account Number</label>
                                                                            <div class="form-group{{ $errors->has('acc_number') ? ' has-danger' : '' }}">
                                                                                <input class="form-control{{ $errors->has('acc_number') ? ' is-invalid' : '' }}" name="acc_number" id="input-acc_number" type="number" placeholder="{{ __('1234  5678  9876  5432') }}" value="{{ $user->acc_number}}" aria-required="true" />
                                                                                @if ($errors->has('acc_number'))
                                                                                <span id="acc_number-error" class="error text-danger" for="input-acc_number">Account Number is Empty!</span>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group card-label">
                                                                            <label for="expiry_month">IFSC Code</label>
                                                                            <div class="form-group{{ $errors->has('ifsc_code') ? ' has-danger' : '' }}">
                                                                                <input class="form-control{{ $errors->has('ifsc_code') ? ' is-invalid' : '' }}" name="ifsc_code" id="input-ifsc_code" type="text" placeholder="{{ __('ABCD1234') }}" value="{{ $user->ifsc_code}}" aria-required="true" />
                                                                                @if ($errors->has('ifsc_code'))
                                                                                <span id="ifsc_code-error" class="error text-danger" for="input-ifsc_code">IFSC Code is Empty!</span>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group card-label">
                                                                            <label for="expiry_year">UPI ID</label>
                                                                            <div class="form-group{{ $errors->has('upi_id') ? ' has-danger' : '' }}">
                                                                                <input class="form-control{{ $errors->has('upi_id') ? ' is-invalid' : '' }}" name="upi_id" id="input-upi_id" type="text" placeholder="{{ __('UPI ID') }}" value="{{ $user->upi_id}}" aria-required="true" />
                                                                                @if ($errors->has('upi_id'))
                                                                                <span id="upi_id-error" class="error text-danger" for="input-upi_id">UPI ID is Empty!</span>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="submit-section mt-4">
                                                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                                </div>

                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="solid-rounded-justified-tab5">

                                            <!-- Clinic Info -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Hospital/Clinic Information</h4>
                                                    <form method='post' action="{{ route('hospital.my.profile.update') }}" enctype="multipart/form-data">
                                                        @csrf


                                                        <div class="row form-row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Price/Charge</label>
                                                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="number" placeholder="{{ __('Price/Charge') }}" value="{{ $user->price}}" aria-required="true" />
                                                                        @if ($errors->has('price'))
                                                                        <span id="price-error" class="error text-danger" for="input-price">Price/Charge is Empty!</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Price Unit</label>
                                                                    <div class="form-group{{ $errors->has('unit') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" id="input-unit" type="text" placeholder="{{ __('Price Unit') }}" value="{{ $user->unit}}" aria-required="true" />
                                                                        @if ($errors->has('unit'))
                                                                        <span id="unit-error" class="error text-danger" for="input-unit">Price Unit is Empty!</span>
                                                                        @endif
                                                                    </div>
                                                                    <small class="form-text text-muted">eg. per 1hr, per appoinments,consultation fee</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Hospital/Clinic Name</label>
                                                                    <div class="form-group{{ $errors->has('hospital_name') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('hospital_name') ? ' is-invalid' : '' }}" name="hospital_name" id="input-hospital_name" type="text" placeholder="{{ __('Hospital/Clinic Name') }}" value="{{ $user->hospital_name}}" aria-required="true" />
                                                                        @if ($errors->has('hospital_name'))
                                                                        <span id="hospital_name-error" class="error text-danger" for="input-hospital_name">Hospital/Clinic Name is Empty!</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label>Hospital/Clinic Address</label>
                                                                    <div class="form-group{{ $errors->has('hospital_address') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('hospital_address') ? ' is-invalid' : '' }}" name="hospital_address" id="input-hospital_address" type="text" placeholder="{{ __('Hospital/Clinic Address') }}" value="{{ $user->hospital_address}}" aria-required="true" />
                                                                        @if ($errors->has('hospital_address'))
                                                                        <span id="hospital_address-error" class="error text-danger" for="input-hospital_address">Hospital/Clinic Address is Empty!</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="col-md-12">

                                                                <h4>Registrations</h4>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label>Hospital/Clinic Registrations</label>
                                                                    <div class="form-group{{ $errors->has('hospital_reg') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('hospital_reg') ? ' is-invalid' : '' }}" name="hospital_reg" id="input-hospital_reg" type="text" placeholder="{{ __('Hospital/Clinic Registrations') }}" value="{{ $user->hospital_reg}}" aria-required="true" />
                                                                        @if ($errors->has('hospital_reg'))
                                                                        <span id="hospital_reg-error" class="error text-danger" for="input-hospital_reg">Hospital/Clinic Registrations is Empty!</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label>Registrations Year</label>
                                                                    <div class="form-group{{ $errors->has('hospital_reg_year') ? ' has-danger' : '' }}">
                                                                        <input class="form-control{{ $errors->has('hospital_reg_year') ? ' is-invalid' : '' }}" name="hospital_reg_year" id="input-hospital_reg_year" type="text" placeholder="{{ __('Registrations Year') }}" value="{{ $user->hospital_reg_year}}" aria-required="true" />
                                                                        @if ($errors->has('hospital_reg_year'))
                                                                        <span id="hospital_reg_year-error" class="error text-danger" for="input-hospital_reg_year">Registrations Year is Empty!</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="submit-section mt-4">
                                                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>

                                            <!-- /Clinic Info -->

                                        </div>
                                        <div class="tab-pane" id="solid-rounded-justified-tab6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Document & Hospital Image</h4>
                                                    <form method='post' action="{{ route('img.document.profile.update') }}" enctype="multipart/form-data">
                                                        @csrf



                                                        <div class="row" id="file-content">
                                                            <label class="col-sm-2 col-form-label">{{ __('Upload Document*')}}</label>
                                                            <div class="col-sm-4">
                                                                <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->dec_img1 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
                                                                <br>
                                                                <label htmlFor="myImage">

                                                                    <input type="file" name="myImage" class="form-control-file" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage" /></label>
                                                                <br>
                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                                <br>
                                                            </div>


                                                            <div class="col-sm-4">
                                                                <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->dec_img2 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
                                                                <br>
                                                                <label htmlFor="myImage1">

                                                                    <input type="file" name="myImage1" class="form-control-file" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage1" /></label>
                                                                <br>
                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                                <br>

                                                            </div>
                                                        </div>
                                                        <div class="row" id="file-content">
                                                            <label class="col-sm-2 col-form-label">Hospital Image*</label>
                                                            <div class="col-sm-4">
                                                                <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->hospital_img1 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
                                                                <br>
                                                                <label htmlFor="myImage2">

                                                                    <input type="file" name="myImage2" class="form-control-file" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage2" /></label>
                                                                <br>
                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                                <br>

                                                            </div>

                                                            <div class="col-sm-4">
                                                                <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->hospital_img2 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
                                                                <br>
                                                                <label htmlFor="myImage3">

                                                                    <input type="file" name="myImage3" class="form-control-file" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage3" /></label>
                                                                <br>
                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                                <br>

                                                            </div>
                                                        </div>
                                                        <div class="submit-section mt-4">
                                                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="solid-rounded-justified-tab7">
                                            <!-- Education -->

                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Education</h4>
                                                    <form method='post' action="{{ route('education.my.profile.update') }}" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="education-info">
                                                            <div class="row form-row education-cont">
                                                                <div class="col-12 col-md-10 col-lg-11">
                                                                    <div class="row form-row">
                                                                        <div class="col-12 col-md-6 col-lg-4">
                                                                            <div class="form-group">
                                                                                <label>Highest Degree</label>
                                                                                <div class="form-group{{ $errors->has('degree') ? ' has-danger' : '' }}">
                                                                                    <input class="form-control{{ $errors->has('degree') ? ' is-invalid' : '' }}" name="degree" id="input-degree" type="text" placeholder="{{ __('Degree') }}" value="{{ $user->degree}}" aria-required="true" />
                                                                                    @if ($errors->has('degree'))
                                                                                    <span id="degree-error" class="error text-danger" for="input-degree">Highest Degree is Empty!</span>
                                                                                    @endif
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6 col-lg-4">
                                                                            <div class="form-group">
                                                                                <label>College/Institute</label>
                                                                                <div class="form-group{{ $errors->has('collage') ? ' has-danger' : '' }}">
                                                                                    <input class="form-control{{ $errors->has('collage') ? ' is-invalid' : '' }}" name="collage" id="input-collage" type="text" placeholder="{{ __('College/Institute') }}" value="{{ $user->collage}}" aria-required="true" />
                                                                                    @if ($errors->has('collage'))
                                                                                    <span id="collage-error" class="error text-danger" for="input-collage">College/Institute is Empty!</span>
                                                                                    @endif
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6 col-lg-4">
                                                                            <div class="form-group">
                                                                                <label>Year of Completion</label>
                                                                                <div class="form-group{{ $errors->has('ed_year') ? ' has-danger' : '' }}">
                                                                                    <input class="form-control{{ $errors->has('ed_year') ? ' is-invalid' : '' }}" name="ed_year" id="input-ed_year" type="text" placeholder="{{ __('year') }}" value="{{ $user->ed_year}}" aria-required="true" />
                                                                                    @if ($errors->has('ed_year'))
                                                                                    <span id="ed_year-error" class="error text-danger" for="input-ed_year">Biography is Empty!</span>
                                                                                    @endif
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="submit-section mt-4">
                                                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="tab-pane" id="solid-rounded-justified-tab8">
                                            <!-- Services and Specialization -->
                                            <div class="card services-card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Services and Specialization</h4>
                                                    <form method='post' action="{{ route('services.my.profile.update') }}" enctype="multipart/form-data">
                                                        @csrf


                                                        <div class="form-group">
                                                            <label>Services</label>
                                                            <div class="form-group{{ $errors->has('services') ? ' has-danger' : '' }}">


                                                                <input class="form-control{{ $errors->has('services') ? ' is-invalid' : '' }}" name="services" id="input-services" type="text" placeholder="{{ __('Services') }}" value="{{ $user->services}}" aria-required="true" />


                                                                @if ($errors->has('services'))
                                                                <span id="services-error" class="error text-danger" for="input-services">Services is Empty!</span>
                                                                @endif
                                                            </div>

                                                            <small class="form-text text-muted">Note : Enter multiple services</small>
                                                        </div>


                                                        <div class="form-group mb-0">
                                                            <label>Specialization </label>
                                                            <div class="form-group{{ $errors->has('specialization') ? ' has-danger' : '' }}">
                                                                <!--<select class="form-control{{ $errors->has('specialization') ? ' is-invalid' : '' }}" name="specialization" id="input-specialization" >-->
                                                                <!--    @foreach(getSpecialities() as $r)-->
                                                                <!--    <option> {{$r->name}}</option>-->
                                                                <!--      @endforeach-->
                                                                <!--</select>-->
                                                                @foreach(getSpecialities() as $r)
                                                                <input type="checkbox" name="specialization[]" value="{{$r->name}}" /> {{$r->name}}:
                                                                @endforeach


                                                                <!--  <input class="form-control{{ $errors->has('specialization') ? ' is-invalid' : '' }}" name="specialization" id="input-specialization" type="text" placeholder="{{ __('Specialization') }}"  value="{{ $user->specialization}}"  aria-required="true"/>
                           -->
                                                                @if ($errors->has('specialization'))
                                                                <span id="specialization-error" class="error text-danger" for="input-specialization">Specialization is Empty!</span>
                                                                @endif

                                                            </div>
                                                            <?php

                                                            $arr = json_decode($user->specialization, true);

                                                            if (isset($arr)) {
                                                                foreach ($arr as $key => $value) {
                                                                    echo "Youre Choice: ";
                                                                    echo  $value . ",";
                                                                }
                                                            }
                                                            ?>


                                                            <small class="form-text text-muted">Note : Choice multiple specialization</small>
                                                        </div>
                                                        <br><br>
                                                        <!-- Experience -->
                                                        <div class="col-12">
                                                            <h4>Experience</h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Total Experience</label>
                                                            <div class="form-group{{ $errors->has('total_experience') ? ' has-danger' : '' }}">
                                                                <input class="form-control{{ $errors->has('total_experience') ? ' is-invalid' : '' }}" name="total_experience" id="input-total_experience" type="text" placeholder="{{ __('Total Experience') }}" value="{{ $user->total_experience}}" aria-required="true" />
                                                                @if ($errors->has('total_experience'))
                                                                <span id="total_experience-error" class="error text-danger" for="input-total_experience">Total Experience is Empty!</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Designation</label>
                                                            <div class="form-group{{ $errors->has('designation') ? ' has-danger' : '' }}">
                                                                <input class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" id="input-designation" type="text" placeholder="{{ __('Designation') }}" value="{{ $user->designation}}" aria-required="true" />
                                                                @if ($errors->has('designation'))
                                                                <span id="designation-error" class="error text-danger" for="input-designation">Designation is Empty!</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="submit-section mt-4">
                                                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                        </div>



                                                        <!-- /Services and Specialization -->
                                                    </form>

                                                </div>

                                            </div>
                                            <!-- /Experience -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
















                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>
    </div>
    <!-- /Page Wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
    <style>
        #GFG_UP {
            font-size: 17px;
            font-weight: bold;
        }

        #GFG_DOWN {
            color: green;
            font-size: 24px;
            font-weight: bold;
        }

        button {
            margin-top: 20px;
        }
    </style>
    <p id="GFG_DOWN">
    </p>
    <script>
        $('#GFG_UP')
            .text('First check few elements then click on the button.');
        $('button').on('click', function() {
            var array = [];
            $("input:checkbox[name=specialization]:checked").each(function() {
                array.push($(this).val());
            });
            $('#GFG_DOWN').text(array);
        });
    </script>