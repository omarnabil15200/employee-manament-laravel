<!-- resources/views/employees/edit.blade.php -->
<form method="POST" action="{{ route('employees.update', $employee) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $employee->name }}" required placeholder="Employee Name">
    <input type="email" name="email" value="{{ $employee->email }}" required placeholder="Employee Email">
    <input type="text" name="phone" value="{{ $employee->phone }}" required placeholder="Phone">
    <input type="text" name="picture" value="{{ $employee->picture }}" placeholder="Picture URL">
    <button type="submit">Update Employee</button>
</form>
