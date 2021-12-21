@include("admin.layouts.sidebar")




        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">{{ __($title) }}</h3>
                             <ul class="breadcrumb">
                                <li class="breadcrumb-item">Total Blog -  {{ $pCount}}</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">

                        <div class="row mb-5">
                 
                            <div class="col-auto">
                                <a class="btn btn-primary btn-sm" href="{{route('add-blog')}}"><i class="fas fa-plus mr-1"></i> Add Blog</a>
                            </div>
                        </div>
  @include('admin.layouts.flash_msg')
                        <!-- Blog -->
                        <div class="row blog-grid-row">
  @foreach($blogs as $r)
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{url('/blog-details/'.$r->id)}}"><img class="img-fluid" src="{{ asset('public/uploads/blog') }}/{{ $r->image }}" alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{url('/blog-details/'.$r->id)}}"><img src="{{ asset('public/uploads/blog') }}/{{ $r->image }}" alt="Post Author"> <span>{{$r->user_name}}</span></a>
                                                </div>
                                            </li>
                                            <li><i class="far fa-clock"></i> {{ $r->created_at->format('d F, Y') }}</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="#">{{$r->blog_title}}</a></h3>
                                        <p class="mb-0"> {{$r->short_details}}  </p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{url('edit-blog/'.$r->id)}}" class="text-success"><i class="far fa-edit"></i> Edit</a></div>

                                       <div class="col text-right"><a href="#" class="text-danger" onclick="return change_status('{{$r->id}}');" id="status_{{$r->id}}"><i class="far fa-trash-alt"></i> Delete</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                                   @endforeach
                            
                        </div>

                        <!-- Blog Pagination -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog-pagination">
                                        {!! $blogs->appends(request()->except('page'))->render() !!}
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /Blog Pagination -->
                        <!-- /Blog -->
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- Model -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg"></p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Inactive Service?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg">Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Model -->












<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
    
    <script>
        function change_status(id){
alert("ok");
           var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=1;
            if(chk==true){
                value = 1;

            }   
            
            $.ajax({
            url: "{{route('delete-blog')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
              id: id, 
                
            },
            success: function(msg) {

         
                alert('Blog deleted successfully');
             } 
            })           
        }
        </script>

