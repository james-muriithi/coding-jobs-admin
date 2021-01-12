<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Unsubscribe From Coding Jobs</title>
    <link rel="stylesheet" href="{{asset('/css/unsubscribe.css')}}" >
</head>
<body>
<div class="container">
    <h2>Oh! You want to unsubscribe?</h2>
    <p>We hate goodbyes, But if you change yor mind, we'll always be here with something fun to share.</p>
    <a href="#" class="btn" id="unsubscribe">Unsubscribe</a>
    <a href="#" class="btn btn-light" id="cancel">Cancel</a>
    <br>
    <br>

    <div class="emoji shocked">
        <figure class="face">
	        <span class="eyes">
	          <span class="eye"></span>
	          <span class="eye"></span>
	        </span>
            <span class="mouth">
	        </span>
        </figure>
    </div>

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('#unsubscribe').on('click', function(e){
        e.preventDefault()
        const title = "We are sad to see you go!"
        const text = "You have been unsubscribed and will no longer hear from us.";
        $('.emoji').addClass('unsubscribed')
        $('.container h2').text(title)
        $('.container p').text(text).css('margin-bottom', '0px')
        $('#unsubscribe').hide('slowly')
        $('#cancel').hide('slowly')
        let url = '{{route('unsubscribe')}}'
        $.ajax({
            headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
            method: 'POST',
            url,
            data: { user: '{{$userId ?? ''}}', _method: 'PUT' }})
            .done(function (data) {
                console.log(data)
            }).
            fail(function (data){
                console.log(data)
            })
        });

    $('#cancel').on('click', function(e){
        e.preventDefault()
        const title = "Thanks for staying with us!"
        const text = "You will continue receiving the jobs. Yay!";
        $('.emoji').addClass('cancelled')
        $('.container h2').text(title)
        $('.container p').text(text).css('margin-bottom', '0px')
        $('#unsubscribe').hide('slowly')
        $('#cancel').hide('slowly')
    });
</script>
</body>
</html>
