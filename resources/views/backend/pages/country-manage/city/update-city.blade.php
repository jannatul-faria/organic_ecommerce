@extends('backend.layout.master')

@section('content')
{{-- @dd($city) --}}
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Add city</h5>
                        <a href="{{ route('admin.all.cities') }}" class="btn btn-light" >Back</a>
                       
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.update.city', $city->id) }}" method="POST" id="updateCity"> 
                            @csrf
                            @method('PUT')
                            {{-- @dd($city); --}}
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label">City Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name') ?? $city->name }}" placeholder="Enter city name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="country_name" class="form-label">Country Name</label>
                                        <select class="form-select mb-3" aria-label="country_name" name="country_name" id='country_name'>
                                             {{-- <option value="">Select one</option> --}}
                                            @foreach ($countries as $key=>$value)
                                                <option value="{{ $value->id }}" @selected(old('country_name' , $city->country_id ) === $value->id ? 'selected' :''  )>{{ $value->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="state_name" class="form-label">State Name</label>
                                        <select class="form-select mb-3" aria-label="state_name" name="state_name" id="state_name">
                                             {{-- <option value="">Select one</option> --}}
                                            @foreach ($states as $key=>$value)
                                                <option value="{{ $value->id }}" @selected(old('state_name' , $city->state_id ) === $value->id ? 'selected' :''  )>{{ $value->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div><!--end col-->
                                
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" aria-label="status" name="status">
                                            <option value="1" @selected(old('status',  $city->status) == 1 ? 'selected' :'' )>Active</option>
                                            {{-- <option value="1">Active</option> --}}
                                            <option value="0" @selected(old('status',  $city->status) == 0 ? 'selected' :'' )>Inactive</option>
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
            $('#country_name').on('change', function(){
                var country_id = this.value;

                $('#state_name').html('<option value = "" > Loading... </option>');

                $.ajax({
                    url: '/admin/get-states',
                    type: 'GET',
                    data: { country_id: country_id },
                    success: function(states){
                        $('#state_name').html('<option value = "" > Select one </option>');
                        $.each(states, function(key, value){
                            $('#state_name').append('<option value = "'+ key +'" >'+ value +' </option>');
                        });
                    }
                })
            });

            $('#updateCity').on('submit', function(e) {
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
                        toastr.success('city updated successfully!');
                    },
                    error: function(xhr) {
                        toastr.error('city updated Failed!');
                        let errors = xhr.responseJSON.errors;
                        $('.text-danger').remove();

                        $.each(errors, function(key, value) {
                            let input = $('[name="' + key + '"]');
                            input.after('<p class="text-danger">' + value[0] + '</p>');
                        });
                    }
                });
            });
        })
        

    </script>
@endpush
   