use App\Models\User;

public function run(): void
{
    User::create(['name' => 'Alice', 'email' => 'alice@example.com']);
    User::create(['name' => 'Bob', 'email' => 'bob@example.com']);
    User::create(['name' => 'Eve', 'email' => 'eve@example.com']);
}
