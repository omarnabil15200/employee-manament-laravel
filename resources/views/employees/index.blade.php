<!-- resources/views/employees/index.blade.php -->
<h1>Your Employees</h1>

<!-- نموذج تسجيل الخروج -->
<form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Logout</button>
</form>

<ul>
    @foreach ($employees as $employee)
        <li>
            {{ $employee->name }} ({{ $employee->email }})
            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <a href="{{ route('employees.edit', $employee) }}">Edit</a>
        </li>
    @endforeach
</ul>

<!-- نموذج إضافة موظف -->
<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    <input type="text" name="name" required placeholder="Employee Name">
    <input type="email" name="email" required placeholder="Employee Email">
    <input type="text" name="phone" required placeholder="Phone">
    <input type="text" name="picture" placeholder="Picture URL">
    <button type="submit">Add Employee</button>
</form>
