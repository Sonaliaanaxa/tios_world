

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
               
                <a href="{{route('home.slide.create')}}"  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-plus-circle' style='font-size:12px;'>  {{ __('New') }}</i> </a>
                
                </h4>
                <p class="card-client" >Total Slide -  {{ $tCount}}</p>
               

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
                       @sortablelink('title',__('title'))  
                      </th>
                      <th>
                       @sortablelink('details',__('Details'))  
                      </th>
                      
                      <th>
                      {{__('Slide Image')}}  
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
                      @foreach($home_slides as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                         
                             <td>
                              <b> {{$r->title}}</a> </b>
                             </td>
                             <td>
                              <b> {{$r->details}}</a> </b>
                             </td>
                             <td>
                               
                                 @if($r->img)
                                   <a href="{{ asset('public/uploads/slide') }}/{{ $r->img }}" target='_blank'> <img src="{{ asset('public/uploads/slide') }}/{{ $r->img }}" style='height:200px;width:300px;border-radius:5%;'/></a>
                                  @else
                                  <p class='text-center' style='padding-top:15px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                  {{ substr($r->name,0,1) }}
                                  </p>
                                  @endif 
                             </td>
                         
                        
                          <td style='font-size:12px;'>
                          {{ $r->created_at->format('d F, Y') }}
                       
                          </td>
                         
                          <td>
                          
                           <a href="{{route('home.slide.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>

                   
                          </td>
                        
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            {!! $home_slides->appends(request()->except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>




 


