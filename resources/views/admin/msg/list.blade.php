
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
                   <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:black; margin-left:13px;'><i class='fa fa-envelope' style='font-size:12px;'> Total :  {{ $tmsg }}</i> </button>
                   <button  class="btn btn-sm btn-default float-right" style='background-color:white ;color:green;'><i class='fa fa-envelope' style='font-size:12px;'> New :  {{ $nmsg }}</i> </button>
               
                 </h4>
                <p class="card-category" >
                Message from customers
                 </p>

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
                      <table class="table text-left" >
                    <thead class=" text-default" style='color:whitesmoke;'>
                    
                      <th>  </th>

                       <th> </th>
                      
                      <th> </th>
                      
                      @if(auth()->user()->user_type=='admin')
                      <th> 
                      </th>
                      @endif
                      
                    </thead>
                    <tbody id="myTable"> 
                   
                      @foreach($msg as $r)
                      
                        <tr>
                        
                          <td> 
                            <p class='text-center' style='padding-top:10px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                            {{ substr($r->name,0,1) }}
                            </p>
                           
                            </td>

                            <td> 
                              <a href="{{route('msg.view',$r->id)}}" style='color:black;'>
                              @if($r->view=='0' && auth()->user()->user_type=='admin' )

                               <span style='font-size:16px;font-weight:1000;'> {{ $r->name }}<br>
                               </span>
                               <b style='font-size:13px;font-weight:600;'>
                               
                                     {{ substr($r->subject,0,90) }}
                                  </b><br>
                                  {{ substr($r->msg,0,90) }}...
                              @else
                              <span style='font-size:16px;'> {{ $r->name }}<br>
                              </span>
                              {{ substr($r->subject,0,90) }}.<br>
                              {{ substr($r->msg,0,90) }}...
                              @endif
                              </a>
                          </td>

                          <td style='font-size:12px;'>
                          {{$r->mobile}}<br>
                          {{$r->email}}<br>
                          {{$r->city}}<br>
                         <span style='font-size:9px;color:black;'><b> {{ $r->created_at->format('d, F Y')}}
                           </b></span>
                          </td>

                          @if(auth()->user()->user_type=='admin') 
                          <td>
                            @if($r->view=='0')
                          
                           <i class='fa fa-envelope' style='background-color:green;color:white;padding:3px;border-radius:5px;font-size:12px;'>  {{ __('New') }}</i> 
                           @endif
                          </td>
                          @endif
                          
                        </tr>
                       
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
        </div>
        <span class='float-right' style='font-weight:400;'>
            {!! $msg->appends(request()->except('page'))->render() !!}
            </span>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>


<style>
tr td
{
 font-size:13px;
}
thead th
{
 font-size:14px;
}
</style>