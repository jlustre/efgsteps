<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                title: {
                    required : true,
                },
                nthDayTarget: {
                    required : true,
                    digits : true,
                    min: 0,
                    max: 90
                },

            },
            messages :{
                title: {
                    required : 'Please Enter A Title',
                },
                nthDayTarget: {
                    required : 'Please Enter A Target Nth Day',
                    number : 'Please Enter A valid Number or Integer Only',
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
