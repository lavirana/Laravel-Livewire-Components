<div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dummyUsers as $dummyUser)
                <tr>
                    <td>{{$dummyUser->name}}</td>
                    <td>{{$dummyUser->email}}</td>
                    <td>@livewire('toggle-switch-alert', [
                        'model' => $dummyUser,
                        'field' => 'isActive',
                        'status' => [
                            'off' => "User {$dummyUser->name} is disabled",
                            'on' => "User {$dummyUser->name} is enabled"
                        ]
                    ])</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
