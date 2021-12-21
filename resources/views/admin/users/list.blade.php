@include("admin.layouts.app")


@include("admin.layouts.sidebar")
@include("admin.layouts.navbar")
<div class="wrapper ">
           
              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-default" >
                <h4 class="card-title" >{{ __($title) }}
                <a href="{{route('users.create')}}"  class="btn btn-sm  float-right"><i class='fa fa-plus-circle' style='font-size:13px; background-color:white;color:#0099cc;padding:10px 15px;'>  {{ __('Add New Employee') }}</i> </a>
                
                </h4>
                <p class="card-category" > {{ __('Here you can manage Users') }}</p>

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                    </div>
                  
                </div>


                <div class="table-responsive">
                      <table class="table text-center" >
                    <thead class=" text-default" style='color:whitesmoke;'>
                    <th>
                         
                          @sortablelink('id',__('S No')) 
                      </th>
                      <th>
                        {{ __('Profile Image') }}
                      </th>
                       <th>
                       @sortablelink('name',__('Name'))  
                      </th>
                      <th>
                      @sortablelink('email',__('email'))  
                      </th>
                      <th>
                      @sortablelink('department_id',__('Department'))  
                      </th>
                      <th>
                      @sortablelink('post_id',__('Post'))  
                      </th>
                     
                      <th>
                      @sortablelink('status',__('Status')) 
                    
                      </th>
                      <th>
                      @sortablelink('created_at',__('Added At'))  
                      
                      </th>
                    
                      <th>
                        {{ __('Action') }}
                      </th>
                    
                     
                    </thead>
                    <tbody id="myTable"> 
                    <?php $i=0; ?>
                      @foreach($users as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                          <td>
                         
                          @if($r->profile_img)
                          yes
                              <img src="{{ asset('uploads/profile_img') }}/{{ $r->profile_img }}" style='height:60px;width:60px;border-radius:50%;'/>
                            @else
                            <p class='text-center' style='padding-top:15px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                            {{ substr($r->name,0,1) }}
                            </p>
                              @endif 
                          
                          </td>
                          <td>
                            
                          <a href="{{route('users.view',$r->id)}}" style='color:orange;' target='_blank'  title="View Employee's Profile">
                          <b><u>{{ $r->name }}  </u></b><br>            </a>
                            
                            ID : {{ $r->employee_id }}<br>
                          </td>
                          <td>
                          {{ $r->email }}<br>
                          {{ $r->mobile }}
                          </td>

                          <td>
                          {{ $r->department_name }}
                          </td>
                          <td>
                          {{ $r->post_name }}
                          </td>
                          
                         
                          <td>
                          @if($r->status==1)
                          
                          <i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }}  </i>
                          @else
                           <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Inactive') }} </i> 
                           @endif
                         
                          </td>
                          <td style='font-size:12px;'>
                          {{ $r->created_at->format('Y-m-d') }}<br>
                          {{ $r->created_at->format('H:i:s') }}
                          </td>
                         
                          <td>
                          <a href="{{route('users.view',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="View" data-id="{{$r->id}}">
                         <i class="fa fa-eye"></i></a>

                           <a href="{{route('users.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>

                         <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-user' title="Delete" data-id="{{$r->id}}">
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

            {!! $users->appends(request()->except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>




  <script>
        $(document).ready(function() {
            $('.delete-user').on('click', function (e) {
                if (!confirm("Are you sure? It can't be undone.")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('users.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "User Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>


<script>
// $(document).ready(function(){
//   $("#myInput").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("#myTable tr").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });
</script>