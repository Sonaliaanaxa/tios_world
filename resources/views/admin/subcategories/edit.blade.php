@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{ __($title) }}
                        <a href="{{route('categories.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
                    </h3>

                </div>
            </div>
        </div>

        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body custom-edit-service">


                        <!-- Add Blog -->
                        <form method='post' action="{{route('subcategories.update',$id)}}" enctype="multipart/form-data">
                            @csrf
                            @include('admin.layouts.flash_msg')

                            <div class="service-fields mb-3">
                                <div class="row">

                                    <div class="col-sm-6 col-md-6">
                                        <label class="category">{{ __('Select Category*')  }}</label>
                                        <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                            <select class="custom-select {{ $errors->has('category_id') ? ' is-invalid' : '' }}department" name='category_id' id="input-category_id">
                                                <option value=''>Select Category</option>
                                                @foreach($categories as $c)
                                                <option value='{{ $c->id}}' {{ ($c->id==$subcategories->category_id)?'selected':''}}> {{ $c->name}} </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                            <span id="category_id-error" class="error text-danger" for="input-category_id">Category is Empty!</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="category">Subcategory Name</label>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Subcategory Name') }}" value="{{$subcategories->name}}" aria-required="true" />
                                            @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="category">Subcategory Slug</label>
                                        <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Subcategory Slug') }}" value="{{$subcategories->slug}}" aria-required="true" />
                                            @if ($errors->has('slug'))
                                            <span id="slug-error" class="error text-danger" for="input-slug">Slug is Empty!</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Regular Details*')  }}</label>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group{{ $errors->has('regular') ? ' has-danger' : '' }}">
                                                <textarea class="form-control{{ $errors->has('regular') ? ' is-invalid' : '' }}" name="regular" id="input-regular" type="regular" value="{{$subcategories->regular}}" placeholder="{{ __('Origin Details') }}" />
                                                {{$subcategories->regular}}
                                                </textarea>

                                                @if ($errors->has('regular'))
                                                <span id="regular-error" class="error text-danger" for="input-regular">Regular Details is Empty!</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">{{ __('Organic Subcategory Details*')  }}</label>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group{{ $errors->has('organic') ? ' has-danger' : '' }}">
                                                <textarea class="form-control{{ $errors->has('organic') ? ' is-invalid' : '' }}" name="organic" id="input-organic" type="organic" value="{{$subcategories->organic}}" placeholder="{{ __('Origin Details') }}" />
                                                {{$subcategories->organic}}
                                                </textarea>

                                                @if ($errors->has('organic'))
                                                <span id="organic-error" class="error text-danger" for="input-organic">Organic Details is Empty!</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="category">{{ __('Upload Subcategory Logo')}}</label>
                                        <div class="upload-img">
                                            <div class="change-photo-btn">

                                                <label htmlFor="myImage">
                                                    <input type="file" class="upload" name="myImage" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage" /></label>
                                                <br>
                                                <img src="{{ asset('/uploads/categories') }}/{{ $subcategories->img }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
                                                <br>
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="category">{{ __('Upload Banner')}}</label>
                                        <div class="upload-img">
                                            <div class="change-photo-btn">
                                                <label htmlFor="myBanner">
                                                    <input type="file" class="upload" name="myBanner" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myBanner" /></label>
                                                <br>
                                                <img src="{{ asset('/uploads/subcategory-banner') }}/{{ $subcategories->banner }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
                                                <br>
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <label class="category">{{ __('Status*') }}</label>
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status">
                                                <option value='{{ $subcategories->status }}'>{{ $subcategories->status }}</option>
                                                <option value='1' {{ ('1'==$subcategories->status)?'selected':''}}> Active </option>
                                                <option value='0' {{ ('0'==$subcategories->status)?'selected':''}}> Inactive</option>

                                            </select> @if ($errors->has('status'))
                                            <span id="status-error" class="error text-danger" for="input-status">Please Select Status!</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>




                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                            </div>
                        </form>
                        <!-- /Add Blog -->


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->
<!-- /Main Wrapper -->