<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // $('#smsCheck').hide();

        $('#send').click(function (e) {
            var code = $("input[name=observation]").val();
            console.log(code)
            $.get('/checkTrackCode',
                { 'code': code }, {
                headers: {
                    'Content-Type': 'application/json',
                }
            })
                .then(function (response) {
                    console.log(response)
                    $('#statusModalBody').text(response.status); // Вставка статуса в модальное окно
                    $('#statusModal').modal('show');
                })
                .catch(function (error) {
                    console.log(error);
                })
        });
    })
</script>