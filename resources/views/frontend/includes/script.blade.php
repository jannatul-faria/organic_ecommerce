    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('assets') }}/frontend/js/jquery-3.3.1.min.js"></script> --}}
    <script src="{{ asset('assets') }}/frontend/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/jquery-ui.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/jquery.slicknav.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/mixitup.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/main.js"></script>
    {{-- <script>
        $.(document).ready(function(){
            $.('.subscriber').on('submit', function(e){
                e.preventDefault();

                let email = $(this).find('input[name="email"]').val();

                $.ajax({
                    url: ,
                    type: 'POST',
                    data : { 
                        _token : "{{ csrf_token() }}",
                        email : email,
                     },
                    success: function(response){

                    },
                    error()
                })
            })
        })
    </script> --}}
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
        
