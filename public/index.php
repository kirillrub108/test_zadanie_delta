<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Metrics Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 w-25">
    <h1 class="mb-4">Get Metrics Data</h1>
    <form id="dataForm">
        <div class="form-group mb-2">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="mt-4" id="result"></div>
</div>

<!-- Подключение jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('#dataForm').on('submit', function(e) {
        e.preventDefault();
        var date = $('#date').val();
        console.log("Date to be sent: " + date); // Проверка формата даты
        $.ajax({
            url: 'getMetrics.php',
            type: 'GET',
            data: { date: date },
            success: function(response) {
                $('#result').html('<pre>' + JSON.stringify(response, null, 2) + '</pre>');
            },
            error: function(xhr, status, error) {
                console.error(xhr); // Добавленная строка для отладки
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                $('#result').html('<div class="alert alert-danger">Error: ' + errorMessage + '</div>');
            }
        });
    });
</script>
</body>
</html>
