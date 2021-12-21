@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __($title) }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Total Ask Questions -  {{ $aCount}}</li>
                                
                            </ul>
                        </div>
                     
                    </div>
                </div>
                @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                    </div>
                  
                </div>
                </div>
                <!-- /Page Header -->
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
                     @sortablelink('phone',__('User'))  
                     
                     </th>
                      <th>
                      @sortablelink('looking_for',__('Looking For'))  
                     </th>
                     <th>
                      @sortablelink('detail',__('Detail'))  
                     </th>
                    
                     <th>
                     @sortablelink('created_at',__('Added At'))  
                     
                     </th>
                     <th>
                     @sortablelink('action',__('Action'))  
                     
                     </th>
                   
                                            </tr>
                                        </thead>
                     <tbody id="myTable"> 
                    <?php $i=0; ?>
                      @foreach($askquestion as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
       

                                                

                                                <td>{{$r->email}}<br>{{$r->phone}}</td>
                                              
                                                <td>{{$r->looking_for}}</td>
                             <td>
                                                    <h2 class="table-avatar">
                                                    {{$r->detail}}
                                                    </h2>
                                                </td>
                         
               
                          <td style='font-size:12px;'>
                          {{ $r->created_at->format('d F, Y') }}
                       
                          </td>
                         
                          <td>
                    
                         <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-askquestion' title="Delete" data-id="{{$r->id}}">
                         <i class="fa fa-trash"></i>
                         </a>
                          </td>
                        
                        </tr>
                      @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $askquestion->appends(request()->except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->


    

    
    </div>
    <!-- /Main Wrapper -->



  <script>
        $(document).ready(function() {
            $('.delete-askquestion').on('click', function (e) {
                if (!confirm("Are you sure to Delete?")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('ask.question.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Askquestion Type Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>


