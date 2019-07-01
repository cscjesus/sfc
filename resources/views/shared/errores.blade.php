@if ($errors->any())
       
      
        
    @foreach ($errors->all() as $error)
       <div class="row">
            <div class="col-md-6 col-md-offset-5">
                    <div class="alert alert-danger alert-dimissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cuidado!</strong> {{ $error }}
                    </div>
            </div>
       </div>
    @endforeach
    {{-- <div class="alert alert-danger alert-dimissible">
        
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}
@endif

{{-- <div class="alert alert-success">
        <strong>Success!</strong> Indicates a successful or positive action.
      </div>
      
      <div class="alert alert-info">
        <strong>Info!</strong> Indicates a neutral informative change or action.
      </div>
      
      <div class="alert alert-warning">
        <strong>Warning!</strong> Indicates a warning that might need attention.
      </div>
      
      <div class="alert alert-danger">
        <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
      </div> 
      
      <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
https://codideep.com/serviciopregunta/verporcodigoserviciopregunta/201607140000001
--}}