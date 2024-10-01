<!-- resources/views/auth/login.blade.php -->
 <h1>login</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
@error('email')
    <p>{{ $message }}</p>
@enderror
