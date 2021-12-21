
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
                 <a href="{{route('all.slider.create')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>

               
                </h4>
                <p class="card-client" >Total Slider -  {{ $tCount}}</p>
               

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
                    <th> @sortablelink('id',__('S No')) </th>        
                     <th>@sortablelink('img',__('Banner Image')) </th>
                     <th>@sortablelink('navbar_id',__('Title'))</th>
                     <th>@sortablelink('Upload Date',__('Date'))</th>
                     <th>@sortablelink('action',__('Action')) </th>  
                    
                     
                    </thead>
                    <tbody id="myTable"> 
                    <?php $i=0; ?>
                      @foreach($allSlider as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                          <td>
                               
                                 @if($r->image)
                                   <a href="{{ asset('/uploads/banner') }}/{{ $r->image }}" target='_blank'> <img src="{{ asset('/uploads/banner') }}/{{ $r->image }}" style='height:50px;width:100px;border-radius:5%;'/></a>
                                  @else
                                  <p class='text-center' style='padding-top:15px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                  {{ substr($r->title,0,1) }}
                                  </p>
                                  @endif 
                             </td>
                             <td>
                              <b> {{$r->title}}</a> </b>
                             </td>

                            
                            
                        
                          <td style='font-size:12px;'>
                          {{ $r->created_at->format('d F, Y') }}
                       
                          </td>
                         
                          <td>
                           <a href="{{route('all.slider.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>
                           <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-slider' title="Delete" data-id="{{$r->id}}">
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

            {!! $allSlider->appends(request()->except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>

  <script>
        $(document).ready(function() {
            $('.delete-slider').on('click', function (e) {
                if (!confirm("Are you sure? It can't be undone.")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('all.slider.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Slider Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>




 


