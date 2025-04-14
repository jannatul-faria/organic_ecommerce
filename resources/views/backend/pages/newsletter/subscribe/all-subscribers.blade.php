@extends('backend.layout.master')

@section('content')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">All cities</h5>
                        <div class="add-city ">
                            <!-- Grids in modals -->
                            {{-- <a href="{{ route('admin.add.city') }}" class="btn btn-primary waves-effect waves-light">
                                Add new city 
                            </a> --}}
                          
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcribers as $key=>$value)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <td>{{  $key+1 }}</td>
                                    <td><a href="#!">{{ $value->email }}</a></td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="javascript:void(0);" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                            <a href="javascript:void(0);" data-id="{{ $value->id }}" id="deleteCity" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                        </div>
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
    <!-- container-fluid -->
  </div>
@endsection
{{-- @push('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '#deleteCity', function(){
                var cityId = $(this).data('id');
                var $row = $(this).closest('tr');

                Swal.fire({
                    title : 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed){
                        $.ajax({
                            url: 'delete-city/' + cityId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The city has been deleted.',
                                'success'
                            );
                            $row.remove();
                            // window.location.reload();
                        },
                        error: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                        })
                    }
                })
            })
        })    
    </script>    
@endpush --}}