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
                
                <li><a href="/posts">Posts</a></li>
                <li><a href="/posts/create">Create</a></li>
                <li><a href="/posts/manage">Manage</a></li>
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
            <h1>One student needs your assistance!</h1>
            <p><strong>Call or directly message using the contact info to confirm their ride!</strong></p>
        </section>
    </main>

    <main>
        <section class="post">

            <p><strong>Pick Up Address: {{$post['source']}}</strong></p>
            <p><strong>Drop Address: {{$post['destination']}}</strong></p>
            <p><strong>Day: {{$post['date']}}</strong></p>
            <p><strong>Time: {{$post['time']}}</strong></p>
            <p><strong>Contact No: {{$post['contact']}} </strong></p>
            <p>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/1{{$post['contact']}}"> Chat on WhatsApp </a>           
            </p>

        </section>
    </main>



    <footer>
        <p>&copy; {{ date('Y') }} Munimul Hasan. All rights reserved.</p>
    </footer>
</body>
</html>