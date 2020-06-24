@extends('layouts.master')

@section('title')
home | asif
@endsection

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add About us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
        </div>
        <form action="/save" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
         
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" required class="form-control" name="title" minlength="2" id="recipient-name">
            </div>
             <div class="form-group">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="email" required name="subtitle" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Phone:</label>
              <input type="text" class="form-control" required name="description" id="message-text" minlength="10">
            </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Table</h4>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add</button>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Email
                </th>
                <th>
                  Phone
                </th>
                <th >
                  Edit
                </th>
                <th>Delete</th>
              </thead>
              <tbody>
                @foreach ($abouts as $a)
                <tr>
                  <td>
                    {{$a->title}}
                  </td>
                  <td>
                    {{$a->subtitle}}
                  </td>
                  <td>
                    {{$a->description}}
                  </td>
               
                  <td> <a href="{{ url('abouts/'.$a->id) }}" class="btn btn-success">Edit</a></td>
                  <td >
                    <form action="/delete2/{{ $a->id }}" method="post">
                      {{csrf_field()}}
                        {{ method_field ('DELETE') }}
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"> Delete</button>
                    </form>
                   </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection

@section('scripts')
<script>
  $(document).ready( function () {
    $('#datatable').DataTable();
  
    $('input[name="description"]').keyup(function(e)
                                  {
    if (/\D/g.test(this.value))
    {
     
      this.value = this.value.replace(/\D/g, '');
    }
  });
  } );
  </script>
@endsection