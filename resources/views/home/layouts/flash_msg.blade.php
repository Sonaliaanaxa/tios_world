@if (session('success'))
<div class="row" >
                    <div class="col-sm-12">
                      <div class="alert alert-success" style='background-color:#6e7170;color:white;'>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="fa fa-remove"></i>
                        </button>
                        <span>{{ __(session('success')) }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                @if (session('error'))
                <div class="row" >
                    <div class="col-sm-12">
                      <div class="alert alert-danger" style='background-color:#6e7170;color:white;'>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa fa-remove"></i>
                        </button>
                        <span>{{ __(session('error')) }}</span>
                      </div>
                    </div>
                  </div>
                @endif