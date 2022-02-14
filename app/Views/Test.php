<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selec box</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
    <h1>Select box using ajax</h1>

    <select name="sl" id="sl" class="selectbox">
        <option value="" hidden>--Select Menu--</option>
    </select>

    <script>
        $(function() {
            let baseURL = '<?= base_url() ?>'
            let url = baseURL + '/menuslist'
            $('.selectbox').select2({
                ajax: {
                    url: url,
                    datatype: 'json',
                    type: 'post',
                    delay: 250,
                    data: function(params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function(res) {
                        return {
                            results: JSON.parse(res),
                            more:false
                        }
                    },
                    cache:true
                }
            });

        });
    </script>
</body>

</html>