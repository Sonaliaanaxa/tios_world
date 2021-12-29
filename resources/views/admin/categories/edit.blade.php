@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{ __($title) }}
                        <a href="{{route('categories.list')}}" class="btn btn-primary float-right"><i
                                class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
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
                        <form method='post' action="{{route('categories.update',$id)}}" enctype="multipart/form-data">
                            @csrf
                            @include('admin.layouts.flash_msg')

                            <div class="service-fields mb-3">
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="category">Category Name</label>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text"
                                                placeholder="{{ __('Category Name') }}" value="{{$category->name}}"
                                                aria-required="true" />
                                            @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">Name is
                                                Empty!</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label>Select parent category*</label>
                                        <select type="text" name="parent_id" class="form-control">
                                            <option value="">None</option>
                                            @if($categories)
                                            @foreach($categories as $category)
                                            <?php $dash=''; ?>
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @if(count($category->subcategory))
                                            @include('admin.categories.subCategoryList-option',['subcategories' =>
                                            $category->subcategory])
                                            @endif
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                   
                                </div>

                            </div>




                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" type="submit" name="form_submit"
                                    value="submit">Submit</button>
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