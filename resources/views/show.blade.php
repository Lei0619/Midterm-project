<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
    <link rel="stylesheet" href="{{ asset('csstyles/show.css') }}">
</head>
<body>
    <div class="note-container">
        <div class="note-header">
            <h1 class="note-title">Note Name: {{ $notepad->notename }}</h1>
            <p class="note-description">Description: {{ $notepad->description }}</p>
        </div>
        <div class="note-content">
            <p>{{ $notepad->content }}</p>
        </div>
        <div class="note-actions">
            <a href="{{ route('notepads.view') }}" class="button">Back to Notepad</a>
            <a href="{{ route('notepads.edit', $notepad) }}" class="button">Edit</a>
        </div>
    </div>
</body>
</html>
