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
                    <td>@livewire('toggle-switch', [
                        'model' => $dummyUser,
                        'field' => 'isActive'
                    ])</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
