@extends('layout.app')

@section('content')
<div class="container">
    @if(session('successMsg'))

    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> {{session('successMsg')}}
   </div> 
    @endif
</div>
<table class="table table-bordered table-striped table-hover ">
  <thead>
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gmail</th>
    <th>Phone No</th>
    <th class="text-center">Action</th>
  </tr>
  </thead>

  <tbody>
     @php $i=0; @endphp
     @foreach($students as $student)
     @php $i++; @endphp
        <tr>
            <td>{{$i}}</td>
            <td>{{$student->first_name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td class="text-center"><a class="btn btn-raised btn-primary btn-sm" href="{{route('edit',$student->id)}}">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            
            <!-- create from for delete part -->
            <form method="post" id="delete-form-{{$student->id}}" 
            action="{{route('delete',$student->id)}}" style="display:none;">
              
            {{ csrf_field() }}
            {{ method_field('delete') }}
            </form>

              <!-- create java script alert method for confirmation to delete item -->
            <button onclick="if(confirm('Are you sure!,you want to delete this?')){
                 event.preventDefault(); 
                 document.getElementById('delete-form-{{$student->id}}').submit(); 
            }
            else{
                event.preventDefault();
             }" 
             class="btn btn-raised btn-danger btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i>
            </button>
            </td>
        </tr>
 @endforeach
</table>
<div class="text-center">
{{$students->links()}}
</div>
@endsection