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
                        <form action="{{ route('admin.store.country') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label">Country Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Country name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger" >{{ $message }}</p>
                                    @enderror
                                </div><!--end col-->
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" aria-label="status" name="status">
                                             <option value="">Select one</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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
   