<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário com FullCalendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <style>
        /* Adicione seus estilos personalizados aqui */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #calendar {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 10px;
        }
    </style>
</head>
<body>
    <div id="calendar"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: function(start, end, timezone, callback) {
                    $.ajax({
                        url: 'calendar.php?action=list',
                        type: 'GET',
                        success: function(data) {
                            var events = JSON.parse(data).map(event => {
                                return {
                                    id: event.id,
                                    title: event.title,
                                    start: event.start,
                                    end: event.end
                                };
                            });
                            callback(events);
                        }
                    });
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    Swal.fire({
                        title: 'Novo Evento',
                        input: 'text',
                        inputLabel: 'Nome do evento',
                        showCancelButton: true,
                        confirmButtonText: 'Salvar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var title = result.value;
                            if (title) {
                                var eventData = {
                                    title: title,
                                    start: start.format(),
                                    end: end.format()
                                };
                                $.ajax({
                                    url: 'calendar.php?action=add',
                                    type: 'POST',
                                    data: eventData,
                                    success: function() {
                                        $('#calendar').fullCalendar('refetchEvents');
                                        Swal.fire('Salvo!', 'Seu evento foi salvo com sucesso.', 'success');
                                    }
                                });
                            }
                        }
                    });
                    $('#calendar').fullCalendar('unselect');
                }
            });
        });
    </script>
</body>
</html>

<?php
// Verificar a ação do AJAX
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'list') {
        // Listar eventos
        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        echo json_encode($events);
        exit; // Adicione esta linha para garantir que o script PHP não continue a gerar saída HTML indesejada.
    } elseif ($_GET['action'] == 'add') {
        // Adicionar evento
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $sql = "INSERT INTO events (title, start, end) VALUES ('$title', '$start', '$end')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
