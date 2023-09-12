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
                <li><a href="/">Home</a></li>
                <li><a href="/register">Register</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero">
            <h1>Welcome to RideShare!</h1>
            <p><strong>Log in to your account and post for a ride!</strong></p>
        </section>
    </main>

    <main>
        <div class="form-container">
            <form method="POST" action="/users/authenticate">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" name="email" class="form-input" placeholder="Example: mpranto@lamar.edu" value="{{old('email')}}"/>
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="password">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-input" placeholder="Example:fkseoh09087!" value="{{old('password')}}"/>
                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>    
                <button type="submit" class="form-button">Login</button>
            </form>
        </div>
        </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your Laravel Project. All rights reserved.</p>
    </footer>
</body>
</html>
