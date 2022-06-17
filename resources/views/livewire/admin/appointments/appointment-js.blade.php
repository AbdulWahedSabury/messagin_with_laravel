@push('js')
    <script>
        $('#colorPicker').colorpicker().on('change', function(event) {
            $('#colorPicker .fa-square').css('color', event.color.toString());
        });
    </script>

    <script>
        ClassicEditor.create(document.querySelector('#note'));
        $('form').submit(function() {
            @this.set('state.members', $('#members').val());
            @this.set('state.text', $('#note').val());
            @this.set('state.color', $('[name=color]').val());
        })
    </script>
    @endpush
