
<script>
        function getcities(id) {
       $.ajax({
            url: `{{url('ajax/cities/')}}/${id}`,
            method: "GET",
            datatype: "json",
            success: function (data) {
                $('#city_id').html("");
                $('#city_id').append("<option value=''>Select City</option>");
                data.forEach(element => {
                    $('#city_id').append(`<option value="${element.id}">${element.name}</option>`);
                });
            },
       })
        }


</script>
