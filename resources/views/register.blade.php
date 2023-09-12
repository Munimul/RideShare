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
                <li><a href="/login">Login</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero">
            <h1>Welcome to RideShare!</h1>
            <p><strong>Simply create an account for your next ride!
            </strong>
            </p>
        </section>
    </main>

    <main>
        <div class="form-container">
            <form method="POST" action="/users">
                @csrf
    
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-input" placeholder="Example: Hasan" value="{{old('name')}}"/>
                    @error('name')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-input" placeholder="Example: mpranto@lamar.edu" value="{{old('email')}}"/>
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
                <div class="form-group">
                    <label for="password" class="form-label">Re-enter Password:</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Example:fkseoh09087!" value="{{old('password')}}"/>
                    @error('password_confirmation')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
    
                <button type="submit" class="form-button">Register</button>
            </form>
        </div>
        </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your Laravel Project. All rights reserved.</p>
    </footer>
</body>
</html>
