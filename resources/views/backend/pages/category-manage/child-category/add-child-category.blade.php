@extends('backend.layout.master')

@section('content')
    <div class="page-content">
    <div class="container-fluid">
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Add child category</h5>
                        <a href="{{ route('admin.all.child.categories') }}" class="btn btn-light" >Back</a>
                       
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.store.child.category') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label">Child Category Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter child category name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="category_name" class="form-label">Category Name</label>
                                        <select class="form-select mb-3" aria-label="category_name"
                                        id="category_name"
                                        name="category_name">
                                            <option value="">Select one</option>
                                            @foreach ($categories as $key=>$value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="sub_category_name" class="form-label">Sub category Name</label>
                                        <select class="form-select mb-3" aria-label="sub_category_name"
                                        id="sub_category_name"
                                         name="sub_category_name">
                                            <option value="">Select one</option>
                                            @foreach ($subCategories as $key=>$value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_category_name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control"   placeholder="Write description...."rows="1"></textarea>
                                    </div>
                                    @error('description')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="image" class="form-label">Image Upload</label>
                                        <input type="file" name="image" id="" class="form-control">
                                    </div>
                                    @error('image')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" aria-label="status" name="status">
                                             <option value="">Select one</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger" >{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                        
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                    
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
    <!-- container-fluid -->
  </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#category_name').on('change', function(){
                var category_id = this.value;

                $('#sub_category_name').html('<option value = "" > Loading... </option>');

                $.ajax({
                    url: '/admin/get-sub-categories',
                    type: 'GET',
                    data: { category_id: category_id },
                    success: function(subCategory){
                        $('#sub_category_name').html('<option value = "" > Select one </option>');
                        $.each(subCategory, function(key, value){
                            $('#sub_category_name').append('<option value = "'+ key +'" >'+ value +' </option>');
                        });
                    }
                })
            })
        })
    </script>
@endpush
   