<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('csstyles/edit.css') }}">
    <title>Edit</title>
</head>
<body>
    <div>
        <a id="home" href="homepage" class="fa-solid fa-house-chimney fa-flip-horizontal fa-xl"></a><br><br>
    </div>
    <form method="POST" action="{{ route('notepads.update', ['notepad' => $notepad]) }}">
        @csrf
        @method('put')
        <div>
            @if($errors->any())
            <ul>
                @foreach ($errors as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <section class="note">
            <h1>Edit Note</h1>
            <div class="fields">
                <div class="field-group">
                    <label for="notename">Name:</label>
                    <input type="text" name="notename" id="notename" value="{{ $notepad->notename }}">
                </div>
                <div class="field-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" value="{{ $notepad->description }}">
                </div>
            </div>
            <div class="content-area">
                <label for="content">Content:</label>
                <textarea name="content" id="content">{{ $notepad->content }}</textarea>
            </div>
            <div class="note-actions">
                <a id="myButton" href="{{ route('notepads.view') }}" ></a>
                <button type="submit">Update</button>
            </div>
        </section>
    </form>
</body>
</html>