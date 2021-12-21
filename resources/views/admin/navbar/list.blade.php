
@include("admin.layouts.sidebar")

<div class="page-wrapper">
            <div class="content container-fluid">       
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-default" >
                <h4 class="card-title" >{{ __($title) }}
                 <a href="{{route('navbar.create')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>

               
                </h4>
                <p class="card-client" >Total Navbar -  {{ $cCount}}</p>
               

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
                      @sortablelink('link',__('Link'))  
                     </th>
                     
                     <th>
                     @sortablelink('created_at',__('Added At'))  
                     
                     </th>
                     <th>
                     @sortablelink('action',__('Action'))  
                     
                     </th>
                     
                    </thead>
                    <tbody id="myTable"> 
                    <?php $i=0; ?>
                      @foreach($navbars as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                          
                             <td>
                              <b>
                              <a> {{$r->name}}</a> 
                               </b>
                                 
                             </td>
                             <td>
                              <b>
                              <a> {{$r->link}}</a> 
                               </b>
                                 
                             </td>
                         
               
                          <td style='font-size:12px;'>
                          {{ $r->created_at->format('d F, Y') }}
                       
                          </td>
                         
                          <td>
                          
                           <a href="{{route('navbar.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>

                         <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-navbar' title="Delete" data-id="{{$r->id}}">
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

            {!! $navbars->appends(request()->except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>

<script>
        $(document).ready(function() {
            $('.delete-navbar').on('click', function (e) {
                if (!confirm("Are you sure? It can't be undone.")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('navbar.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Navbar Type Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>

 