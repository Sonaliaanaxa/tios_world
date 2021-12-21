@if (session('success'))
  <div style="position: fixed;top: 64px;right: 0px;">
    <div class="col-sm-12">
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">&times;</i>
        </button>
        <span>{{ __(session('success')) }}</span>
      </div>
    </div>
  </div>
@endif
@if (session('error'))
<div style="position: fixed;top: 64px;right: 0px;">
    <div class="col-sm-12">
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">&times;</i>
        </button>
        <span>{{ __(session('error')) }}</span>
      </div>
    </div>
</div>
@endif
<script>
    setTimeout(function(){ 
      $('.alert').hide();
    }, 2000);
</script>