@extends('backend.layout.master')

@section('content')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Upadate child category</h5>
                        <a href="{{ route('admin.all.child.categories') }}" class="btn btn-light" >Back</a>
                       
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.update.child.category', $childCategory->id) }}" method="POST" id="updateChildCategory"> 
                            @csrf
                            @method('PUT')
                            {{-- @dd($childCategory); --}}
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label">Child Category Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name') ?? $childCategory->name }}" placeholder="Enter child category name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="category_name" class="form-label">Category Name</label>
                                        <select class="form-select mb-3" aria-label="category_name" name="category_name" id="category_name">
                                            @foreach ($categories as $key=>$value)
                                                <option value="{{ $value->id }}" @selected(old('category_name' , $childCategory->category_id ?? '') === $value->id ? 'selected' : '' )>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="sub_category_name" class="form-label">Sub Category Name</label>
                                        <select class="form-select mb-3" aria-label="sub_category_name" name="sub_category_name"
                                        id="sub_category_name">
                                            @foreach ($subCategories as $key=>$value)
                                                <option value="{{ $value->id }}" @selected(old('sub_category_name' , $childCategory->sub_category_id ?? '') === $value->id ? 'selected' : '' )>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control"   placeholder="Write description...."rows="1"
                                        value ="">{{  old('description') ??  $childCategory->description   }}</textarea>
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
                                            <option value="1" @selected(old('status',  $childCategory->status) == 1 ? 'selected' :'' )>Active</option>
                                            {{-- <option value="1">Active</option> --}}
                                            <option value="0" @selected(old('status',  $childCategory->status) == 0 ? 'selected' :'' )>Inactive</option>
                                            {{-- <option value="2">Inactive</option> --}}
                                        </select>
                                    </div>
                                </div><!--end col-->
                        
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                    
                                        <button type="submit" class="submitBtn btn btn-primary">Submit</button>
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


            $('#updateChildCategory').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let actionUrl = form.attr('action');
                let formData = form.serialize();

                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {
                        $('.submitBtn').prop('disabled', true).text('Updating...');
                        },
                    complete: function() {
                        $('.submitBtn').prop('disabled', false).text('Submit');
                    },

                    success: function(response) {
                        toastr.success('Child category updated successfully!');
                    },
                    error: function(xhr) {
                        // console.log(xhr);
                        toastr.error('Child category updated Failed!');
                        let errors = xhr.responseJSON.errors;
                        $('.text-danger').remove();

                        $.each(errors, function(key, value) {
                            let input = $('[name="' + key + '"]');
                            input.after('<p class="text-danger">' + value[0] + '</p>');
                        });
                    }
                });
            });
        });

    </script>
@endpush
   