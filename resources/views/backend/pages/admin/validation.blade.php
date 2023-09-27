<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                username: {
                    required : true,
                },
                password: {
                    required : true,
                },
                password_confirmation: {
                    required : true,
                },
                sponsor: {
                    required : true,
                },
                email: {
                    required : true,
                    email: true
                },
                phone: {
                    required : true,
                },
                role_id: {
                    required : true,
                },
                city_town: {
                    required : true,
                },
                state_province: {
                    required : true,
                },
                country: {
                    required : true,
                },
                timezone: {
                    required : true,
                },

            },
            messages :{
                name: {
                    required : 'Please Enter An Admin Name',
                },
                username: {
                    required : 'Please Enter An Admin Username',
                },
                email: {
                    required : 'Please Enter An Admin Email',
                    email : 'Please Enter A Valid Admin Email',
                },
                role_id: {
                    required : 'Please Select A Role',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<script>
        // Add an event listener using jQuery
        $('#username,#sponsor').on('input', function() {
            // Get the current value of the input
            const inputValue = $(this).val();

            // Remove spaces and convert to lowercase
            const modifiedValue = inputValue.replace(/\s+/g, '').toLowerCase();

            // Update the input field with the modified value
            $(this).val(modifiedValue);
        });

         $('#phone').on('input', function() {
            // Get the current value of the input
            const inputValue = $(this).val();

            // Remove all non-numeric characters except parentheses, hyphens, and spaces
            const sanitizedValue = inputValue.replace(/[^0-9()\s-]/g, '');

            // Update the input field with the sanitized value
            $(this).val(sanitizedValue);
        });

    </script>
