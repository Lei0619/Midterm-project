<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
    <link rel="stylesheet" href="{{ asset('csstyles/view.css') }}">
    <script src="https://kit.fontawesome.com/4443926359.js" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this note?')) {
                event.preventDefault(); // Prevent form submission if user cancels
            }
        }
    </script>
</head>
<body>
    <div id="main-container">
        <div id="left-column">
            <a id="home" href="homepage" class="fa-solid fa-house-chimney fa-flip-horizontal fa-xl"></a><br><br>
            <form method="POST" action="{{ route('notepads.store') }}">
                @csrf
                @method('POST')
                <div>
                    @if($errors->any())
                    <ul>
                        @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </form>
        </div>
        <div id="right-column">
            <header id="notes">
                <div class="table-container">
                    <h1>Your Notes</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Note Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notepads as $notepad)
                            <tr>
                                <td>{{ $notepad->id }}</td>
                                <td>{{ $notepad->notename }}</td>
                                <td>{{ $notepad->description }}</td>
                                <td class="actions">
                                    <a class="fa-regular fa-pen-to-square fa-xl" href="{{ route('notepads.edit', ['notepad' => $notepad]) }}"></a>
                                    <a class="fa-regular fa-eye fa-xl" href="{{ route('notepads.show', ['notepad' => $notepad]) }}"></a>
                                    <form action="{{ route('notepads.destroy', $notepad->id) }}" method="POST" onsubmit="confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button id="myButton" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </header>
        </div>
        <footer id="add">
            <a class="fa-solid fa-circle-plus fa-bounce fa-2xl" style="color: #B197FC" href="{{ route('notepads.create') }}"></a><br><br>
        </footer>
    </div>
</body>
</html>
