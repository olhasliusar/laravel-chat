<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Socket.io</title>
</head>
<body>

<ul class="chat"></ul>
<hr>


<form action="">
    <textarea name="content" style="width:100%;height:50px"></textarea>
    <input type="submit" value="submit">
</form>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>

<script>
    function appendMessage(data){
        $('.chat').append(
            $('<li/>').text(data.message)
        )
    }

    var socket = io(':6001');

    socket.on('message', function (data) {
        appendMessage(data);
    });

    $('form').on('submit', function(){
        var text = $('textarea').val(),
            msg = {message: text};

        socket.send(msg);
        appendMessage(msg);

        $('textarea').val('');
        return false;
    });
</script>
</body>
</html>