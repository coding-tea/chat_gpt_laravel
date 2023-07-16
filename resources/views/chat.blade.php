<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>open ai api</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
    <section class="main">
        <h1 class="title">openai chat using api</h1>
        <div class="chat">
            @isset($chat)
                @foreach ($chat as $item)
                    <div class="{{ $item->role }}"> {{ $item->content }} </div>
                @endforeach
            @endisset
        </div>
        <div class="cta">
            <form action="{{ route('action.chat') }}" method="post">
                @csrf
                <input type="text" name="message" placeholder="send message">
                <button type="submit">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </section>
</body>
</html>