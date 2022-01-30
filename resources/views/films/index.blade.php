
 
@section('content')



    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Welcome to my films Gallery</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('films.create') }}"> Create New Film</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-striped ">
        
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Director</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($films as $film)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $film->name }}</td>
            <td>{{ $film->director }}</td>
            <td>{{ $film->genre }}</td>
            <td>{{ $film->year }}</td>
            <td>{{ $film->description }}</td>
            <td>
                <form action="{{ route('films.destroy',$film->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('films.show',$film->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('films.edit',$film->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $films->links() !!}
      
@endsection


@extends('films.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Film</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('films.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('films.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>

            <div class="form-group">
                <strong>Director:</strong>
                <input type="text" name="director" class="form-control" placeholder="Director">
            </div>

            <div class="form-group">
                <strong>Genre:</strong>
                <input type="text" name="genre" class="form-control" placeholder="Genre">
            </div>

            <div class="form-group">
                <strong>Year:</strong>
                <input type="number" name="year" class="form-control" placeholder="Year">
            </div>


        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection