@extends('backend.layout.master')

@section('content')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Add Country</h5>
                        <a href="{{ route('admin.all.countries') }}" class="btn btn-light" >Back</a>
                       
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.update.country', $country->id) }}" method="POST" id="updateCountry"> 
                            @csrf
                            @method('PUT')
                            {{-- @dd($country); --}}
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label">Country Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name') ?? $country->name }}" placeholder="Enter Country name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" aria-label="status" name="status">
                                            <option value="1" @selected(old('status',  $country->status) == 1 ? 'selected' :'' )>Active</option>
                                            {{-- <option value="1">Active</option> --}}
                                            <option value="0" @selected(old('status',  $country->status) == 0 ? 'selected' :'' )>Inactive</option>
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
    <!-- container-fluid -->
  </div>
@endsection
@push('scripts')
    <script>
        // $(document).ready(function(){
        //    $('#updateCountry').on('submit', function(e){
        //     e.preventDefault();
        //     let form = $(this);
        //     let actionUrl = form.attr('action');
        //     let formData = form.serialize();

        //     $.ajax({
        //         url: actionUrl,
        //         type: 'POST',
        //         data: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': $('input[name="_token"]').val(),
        //             'X-HTTP-Method-Override': 'PUT'
        //         },
        //         beforeSend: function(){
        //             $('.submitBtn').html('Updeting..');
        //         }
        //         success: function (response) {
        //             if(response.success){
        //                 alert('Country updated successfully!');
        //             }
        //         },
        //         error: function (xhr) {
        //             // Handle validation errors or server errors
        //             alert('Something went wrong!');
        //             console.log(xhr.responseText);
        //         }
        //     });
        //    })
        // })
        $('#updateCountry').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

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
                toastr.success('Country updated successfully!');
            },
            error: function(xhr) {
                toastr.error('Country updated Failed!');
                let errors = xhr.responseJSON.errors;
                $('.text-danger').remove();

                $.each(errors, function(key, value) {
                    let input = $('[name="' + key + '"]');
                    input.after('<p class="text-danger">' + value[0] + '</p>');
                });
            }
        });
    });

    </script>
@endpush
   