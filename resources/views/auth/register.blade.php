<!-- resources/views/auth/register.blade.php -->
 <h1>register</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" required placeholder="Name">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Register</button>
</form>
