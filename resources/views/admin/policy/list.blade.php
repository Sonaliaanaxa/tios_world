@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
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
               
                
                </h4>
                <p class="card-client" >Total Policy -  {{ $tCount}}</p>
               

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
              


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
                      @sortablelink('created_at',__('Added At'))  
                      
                      </th>
                    
                      <th>
                        {{ __('Action') }}
                      </th>
                    
                     
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
                              <b> {{$r->title}}</a> </b>
                             </td>
                             <td>
                              <b>   <?php 
                                            $s= $r->details;
                                            $s= htmlspecialchars_decode($s);
                                                    echo $s;
                                ?> </b>
                             </td>
                        
                         
                        
                          <td style='font-size:12px;'>
                          {{ $r->created_at->format('d F, Y') }}
                       
                          </td>
                         
                          <td>
                          
                           <a href="{{route('policy.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>

                   
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
  </div>
  </div>
  </div>




 


