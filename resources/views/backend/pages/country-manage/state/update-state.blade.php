@extends('backend.layout.master')

@section('content')
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Add state</h5>
                        <a href="{{ route('admin.all.states') }}" class="btn btn-light" >Back</a>
                       
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.update.state', $state->id) }}" method="POST" id="updateState"> 
                            @csrf
                            @method('PUT')
                            {{-- @dd($state); --}}
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label">state Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name') ?? $state->name }}" placeholder="Enter state name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="country_name" class="form-label">Country Name</label>
                                        <select class="form-select mb-3" aria-label="country_name" name="country_name">
                                             {{-- <option value="">Select one</option> --}}
                                            @foreach ($countries as $key=>$value)
                                                <option value="{{ $value->id }}" @selected(old('country_name' , $state->country_id ) === $value->id ? 'selected' :''  )>{{ $value->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div><!--end col-->
                                
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" aria-label="status" name="status">
                                            <option value="1" @selected(old('status',  $state->status) == 1 ? 'selected' :'' )>Active</option>
                                            {{-- <option value="1">Active</option> --}}
                                            <option value="0" @selected(old('status',  $state->status) == 0 ? 'selected' :'' )>Inactive</option>
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
        $('#updateState').on('submit', function(e) {
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
                toastr.success('state updated successfully!');
            },
            error: function(xhr) {
                toastr.error('state updated Failed!');
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
   