<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>



          $(document).ready(function() {

    $('select').each(function(cSelect) {
        $(this).data('stored-value', $(this).val());

    });

    $('.select2').change(function() {
        var previousVal = $(this).data('stored-value'); //get previous selected value
        var selectedVal = $(this).val(); //get selected dropdown value
        $(this).data('stored-value', selectedVal); //set new selected value
        var eleid = $(this).attr("id");
        $(".select2").each(function() {

            if ($(this).attr("id") !== eleid) {
                $(this).parent().find('option[value="' + selectedVal + '"]:not(:selected)').attr('disabled', 'disabled');
                $("#country option:selected").remove()
            }
        });
    });
});
    </script>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
</head>


<body>
@include ('nav')

  <div class="container">
      @yield('content')
  </div>


</body>

</html>
