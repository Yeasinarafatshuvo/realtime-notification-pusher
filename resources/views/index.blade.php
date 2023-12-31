<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')

</head>
<body>
    <input type="hidden" id="previous_message" value="0">
    <p>Total Message: <span id="showMessage"></span> </p>
    <p>{{Auth::id()}}</p>



    <script>
        // setTimeout(() => {
        //     window.Echo.channel('testing')
        //         .listen('.MyWebsocket', (e) => {
        //             console.log(e);
        //         });
        // }, 200);
        let previousMessage = parseInt(document.getElementById('previous_message').value);
        let showMessageElement = document.getElementById('showMessage');
    
        setTimeout(() => {
            window.Echo.private('myPrivateChannel.user.{{Auth::id()}}')
                .listen('.private_msg', (e) => {
                    console.log(e);
    
                    // Update the previous_message value
                    previousMessage += 1;
    
                    // Update the hidden input value
                    document.getElementById('previous_message').value = previousMessage;
    
                    // Update the total message count in the HTML
                    showMessageElement.innerText = previousMessage;
    
                });
        }, 200);
    
    </script>

</body>

</html>