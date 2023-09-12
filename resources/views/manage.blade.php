<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideShare</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                
                @auth
                
                <li>Welcome, {{auth()->user()->name}}!</li>
                <li><a href="/posts">Posts</a></li>
                <li><a href="/posts/create">Create</a></li>
                <li>
                    <form method="POST", action="/logout">
                        @csrf
                        <button class="form-button",type="submit">Logout</button>

                    </form>
                </li>
                @else
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Login</a></li>

                @endauth

            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero">
            <h1>Your Posts!</h1>
        </section>
    </main>


    <main>
                @unless($posts->isEmpty())
                
                @foreach ($posts as $post)
                <section class="post">
                    <strong>
                   <a href="/posts/{{$post['id']}}"> {{$post['source']}} To {{$post['destination']}} at {{$post['time']}} on {{$post['date']}}</a>
                    </strong>
                    <section class="button">
                        <!Edit post>
                        <button><a href="/posts/{{$post->id}}/edit">Edit</a></button>
                        <!Delete post>
                        <form method="POST" action="/posts/{{$post->id}}">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                </section>
                </section>
                @endforeach 
                
                @else
                <section class="post">
                    <strong>
                   No Posts found! 
                    </strong>
                </section>
                @endunless
    </main>



    <footer>
        <p>&copy; {{ date('Y') }} Munimul Hasan. All rights reserved.</p>
    </footer>
</body>
</html>