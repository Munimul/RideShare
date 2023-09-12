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
                <li><a href="/posts/manage">Manage</a></li>
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
            <h1></h1>
            <h2> You will find all the posts here!</h2>
            <p><strong>Click on a post that you want to respond to! Help a student out!</strong></p>
        </section>
    </main>

    <main>
        <section class="hero">
            <form>
                <label for="search" class="form-label"></label>
                <input type="text" id="search" name="search" placeholder="Find posts using address" class="form-input">
                <input type="submit" value="Search" class="form-button">
            </form>
        </section>
    </main>



    <main>
                @unless(count($posts)==0)
                
                @foreach ($posts as $post)
                <section class="post">
                    <strong>
                   <a href="/posts/{{$post['id']}}"> {{$post['source']}} To {{$post['destination']}} at {{$post['time']}} on {{$post['date']}}</a>
                    </strong>
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

    <main>
        <section class="page">
            {{$posts->links()}}
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Munimul Hasan. All rights reserved.</p>
    </footer>
</body>
</html>