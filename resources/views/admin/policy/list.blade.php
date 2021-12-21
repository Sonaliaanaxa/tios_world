@include("admin.layouts.sidebar")
    <!-- Page Wrapper --> 
    <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">{{ __($title) }}
                            <a href="{{route('policy.create')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
                            </h3>
                         
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Total Policies -  {{ $tCount}}</li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                @include('admin.layouts.flash_msg')
                <div class="row">
              
                  
              <div class="col-sm-3">
                <div class="form-group">
                  <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                </div>
              
            </div>
            </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                    <thead class=" text-default" style='color:whitesmoke;'>
                                            <tr>
                                            <th>
                         
                                                @sortablelink('id',__('S No')) 
                                            </th>
                                            <th>
                                            @sortablelink('title',__('Title'))  
                                            </th>
                                            <th>
                                            @sortablelink('details',__('Details'))  
                                            </th>
                                            <th>
                                                @sortablelink('created_at',__('Added At'))  
                                                
                                                </th>
                                                <th> @sortablelink('action',__('Action')) </th>
                                               
                                               

                                            </tr>
                                        </thead>
                                        <tbody id="myTable"> 
                                        <?php $i=0; ?>
                                        @foreach($policies as $r)
                                        <?php $i++; ?>
                                            
                                            <tr>

                                            <td>
                                            <?php echo $i; ?>
                                            </td>
                                          
                                                <td>
                                                 
                                                    {{$r->title}}
                                               
                                                </td>
                                                <td>
                            {!! substr($r->details,0,50) !!}
                          </td>
                                                </td>
                                            
                          
                          <td>{{ $r->created_at->format('Y-m-d') }} </td>
                            
                        
                          <td>
                           
                         
                 
                           <a href="{{route('policy.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>
                   
                        <!--  <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-policy' title="Delete" data-id="{{$r->id}}">
                         <i class="fa fa-trash"></i>
                         </a> -->
                          </td>
                                               
                                             
                                            </tr>
                                        
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $policies->appends(request()->except('page'))->render() !!}
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    
  <script>
        $(document).ready(function() {
            $('.delete-policy').on('click', function (e) {
                if (!confirm("Are you sure to Delete?")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('policy.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Policy Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });

</script>







