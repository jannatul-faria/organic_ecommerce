@extends('backend.layout.master')

@section('content')
    <div class="page-content">
    <div class="container-fluid"  id="childCategoryList">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">All child categories</h5>
                        <div class="add-child category ">
                            <!-- Grids in modals -->
                            <a href="{{ route('admin.add.child.category') }}" class="btn btn-primary waves-effect waves-light">
                                Add new child category 
                            </a>
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
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($childCategories as $key=>$value)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <td>{{  $key+1 }}</td>
                                    <td><a href="#!">{{ $value->name }}</a></td>
                                    <td><a href="#!">{{ $value->category->name }}</a></td>
                                    <td><a href="#!">{{ $value->subCategory->name }}</a></td>

                                    @if ($value->status == 1)
                                    
                                        <td><span class="badge rounded-pill bg-success">{{ __('Active') }}</span></td>
                                    @else
                                        <td><span class="badge rounded-pill bg-danger">{{ __('Inactive') }}</span>
                                    @endif
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="javascript:void(0);" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                            <a href="javascript:void(0);" data-id="{{ $value->id }}" id="deleteChildCategory" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
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
        $(document).ready(function(){
            $(document).on('click', '#deleteChildCategory', function(){
                var childCategoryId = $(this).data('id');
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
                            url: 'delete-child-category/'+childCategoryId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The child category has been deleted.',
                                'success'
                            );
                            $row.remove();
                            // if (response.success) {
                            //    $('#childCategoryList').load(location.href + " #childCategoryList > *");
                            // }
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
@endpush