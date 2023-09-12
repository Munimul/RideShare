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
                <li><a href="/posts">Posts</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero">
            <h1>Create your ride request here!</h1>
            <p><strong>Don't forget to put your contact info!</strong></p>
        </section>
    </main>

    <main>
    <div class="form-container">
        <form method="POST" action="/posts">
            @csrf

            <div class="form-group">
                <label for="source" class="form-label">Pick-up Point:</label>
                <input type="text" name="source" class="form-input" placeholder="Example: 755 jim gilligan ave, 77705, beaumont" value="{{old('source')}}"/>
                @error('source')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="destination" class="form-label">Drop off point:</label>
                <input type="text" name="destination" class="form-input" placeholder="Example: 1145 oregon ave, 77705, beaumont" value="{{old('destination')}}"/>
                @error('destination')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="time" class="form-label">Time:</label>
                <input type="text" name="time" class="form-input" placeholder="Example: 10:00 P.M." value="{{old('time')}}"/>
                @error('time')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="contact" class="form-label">Contact:</label>
                <input type="text" name="contact" class="form-input" placeholder="Example: 4098128xxx" value="{{old('contact')}}"/>
                @error('contact')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="date" class="form-label">Date:</label>
                <input type="text" name="date" class="form-input" placeholder="Example: Today" value="{{old('date')}}"/>
                @error('date')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="form-button">Submit</button>
        </form>
    </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Munimul Hasan. All rights reserved.</p>
    </footer>
</body>
</html>