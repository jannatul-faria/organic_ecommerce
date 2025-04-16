@extends('backend.layout.master')

@section('content')
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
                        <form action="{{ route('admin.store.city') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label">city Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter city name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="country_name" class="form-label">Country Name</label>
                                        <select class="form-select mb-3" aria-label="country_name"
                                        id="country_name"
                                        name="country_name">
                                             <option value="">Select one</option>
                                            @foreach ($countries as $key=>$value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="state_name" class="form-label">State Name</label>
                                        <select class="form-select mb-3" aria-label="state_name"
                                        id="state_name"
                                         name="state_name">
                                             <option value="">Select one</option>
                                            @foreach ($states as $key=>$value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" aria-label="status" name="status">
                                             <option value="">Select one</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
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
            })
        })
    </script>
@endpush
   