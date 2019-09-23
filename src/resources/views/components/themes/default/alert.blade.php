<div
    class="alert alert-{{$type}} alert-dismissible fade show text-center border-left-0 border-bottom-0 border-right-0 border-{{$type}} border-top mb-0"
    role="alert">
    {!! $slot !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('.alert').animate({
                marginTop: "+=50px"
            }, 500, '', function () {
                $(this).delay(3000).animate({marginTop: "-=50px"}, 500, 'linear', function () {
                    $(this).hide();
                });
            });
        })
    </script>
@endpush
