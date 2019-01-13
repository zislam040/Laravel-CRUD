@extends('layout.app')

@section('content')

   <div class="container">
     
     @if($errors->any())
     @foreach($errors->all() as $error)    
    <div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Oh snap!</strong>{{ $error }}
    </div>  

    @endforeach
    @endif

      <div class="panel panel-default">
        <div class="panel-heading">
           <p>Add Student</p>
        </div>
        <div class="panel-body">

        <form class="form-horizontal" action="{{route('store')}}" method="post" form data-parsley-validate>
        {{ csrf_field() }}
  <fieldset>
    <legend>Legend</legend>

    <div class="form-group">
      <label for="firstname" class="col-md-2 control-label">First Name</label>

      <div class="col-md-10">
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstname">
      </div>
    </div>

    <div class="form-group">
      <label for="lastname" class="col-md-2 control-label">Last Name</label>

      <div class="col-md-10">
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname">
      </div>
    </div>

    <div class="form-group">
      <label for="email" class="col-md-2 control-label">Email</label>

      <div class="col-md-10">
        <input type="email" class="form-control" name="email" id="email" placeholder="email">
      </div>
    </div>


    <div class="form-group">
      <label for="phone" class="col-md-2 control-label">Phone</label>

      <div class="col-md-10">
        <input type="phone" class="form-control" name="phone" id="phone" placeholder="phone">
      </div>
    </div>


    
    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button type="button" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

    </div>
 </div>
</div>

@endsection