<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('csstyles/create.css') }}">
    <title>Create</title>
</head>
<body>
    <div>
        <a id="home" href="homepage" class="fa-solid fa-house-chimney fa-flip-horizontal fa-xl"></a><br><br>
    </div>
    <form method="POST" action="{{ route('notepads.store') }}">
        @csrf
        @method('post')
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
            <h1>Create Notepad</h1>
            <div class="fields">
                <div class="field-group">
                    <label for="notename">Name:</label>
                    <input type="text" name="notename" id="notename">
                </div>
                <div class="field-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description">
                </div>
            </div>
            <div class="content-area">
                <label for="content">Content:</label>
                <textarea name="content" id="content"></textarea>
            </div>
            <div class="form-actions">
                <button type="submit">Save</button>
                <a href="{{ route('notepads.view') }}" class="button">Back</a>
            </div>
        </section>
    </form>
</body>
</html>