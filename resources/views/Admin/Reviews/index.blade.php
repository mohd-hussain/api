@extends('layouts.master')

@section('title')
    Dashboard: All Reviews 
@endsection

@section('content')
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/store-review" method="POST" > 
          
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Customer:</label>
                    <input type="text" name="customer" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Product Review:</label>
                    <textarea  name="review" class="form-control" id="message-text"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Rating:</label>
                    <input type="integer" name="star" class="form-control" id="recipient-name">
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

            <!-- Delete Modal -->  

<div class="modal fade" id="deletemodelpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="delete_modal_Form" method="POST">

          {{ csrf_field() }}
          {{ method_field('DELETE') }}

        <div class="modal-body">
            <input type="hidden" id="delete_aboutus_id">
            <h4>Are You Sure..? you want to delete it..?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes.delete it</button>
        </div>
      </form>
    </div>
  </div>
</div>

       <!-- End Delete Modal --> 

  <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title ">Product & Reviews
              <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal" >Add</button>
              </h4>
            </div>

           @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="datatable">
                  <thead class=" text-primary">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Edit</th>
                        <th>Delete</th>
                  </thead>
                  <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>                
                        <td>{{ $review->customer }}</td>
                        <td>{{ $review->review }}</td>
                        <td>{{ $review->star }}</td> 
                        <td> 
                            <a href="/edit-review/{{$review->id}}" class="btn btn-success">Edit</a>
                        </td>
                        <td> 
                            <a href="javascript:void(0)" class="btn btn-danger deletebtn"  data-toggle="modal" data-target="#deletemodelpop">Delete</a>                                                              
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


@section('script')
   <script>
      $(document).ready( function () {
        $('#datatable').DataTable();

            $('#datatable').on('click','.deletebtn',function(){
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                  return $(this).text();
                }).get();

                $('#delete_aboutus_id').val(data[0]);

                $('#delete_modal_Form').attr('action','delete-review/'+data[0]);

                $('#delete_modalpop').modal('show');
            });

        });
   </script> 

@endsection 