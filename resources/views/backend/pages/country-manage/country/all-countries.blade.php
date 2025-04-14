@extends('backend.layout.master')

@section('content')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">All Countries</h5>
                        <div class="add-country ">
                            <!-- Grids in modals -->
                            <a href="{{ route('admin.add.country') }}" class="btn btn-primary waves-effect waves-light">
                                Add new country
                            </a>
                            {{-- <button type="button"class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                               Add new country
                            </button> --}}
                            <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalgridLabel">Add Country</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="javascript:void(0);">
                                                <div class="row g-3">
                                                    <div class="col-xxl-6">
                                                        <div>
                                                            <label for="firstName" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" id="firstName" placeholder="Enter firstname">
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-xxl-6">
                                                        <div>
                                                            <label for="lastName" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" id="lastName" placeholder="Enter lastname">
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-lg-12">
                                                        <label for="genderInput" class="form-label">Gender</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                                <label class="form-check-label" for="inlineRadio3">Others</label>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-xxl-6">
                                                        <div>
                                                            <label for="emailInput" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-xxl-6">
                                                        <div>
                                                            <label for="passwordInput" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="passwordInput" value="451326546">
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <th>Name</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $key=>$value)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <td>{{  $key+1 }}</td>
                                    <td><a href="#!">{{ $value->name }}</a></td>
                                    @if ($value->status == 1)
                                    
                                        <td><span class="badge rounded-pill bg-success">{{ __('Active') }}</span></td>
                                    @else
                                        <td><span class="badge rounded-pill bg-danger">{{ __('Inactive') }}</span>
                                    @endif
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="javascript:void(0);" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                            <a href="javascript:void(0);"data-id="{{ $value->id }}" class="delete-btn link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
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
@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-btn', function(){
        // $('.delete-btn').on('click', function() {
            var countryId = $(this).data('id');
            var $row = $(this).closest('tr');
    
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delete-country/' + countryId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The country has been deleted.',
                                'success'
                            );
                            $row.remove();
                            // window.location.reload();
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
    </script>
    
@endpush
   