@forelse ($users as $key => $user)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>

        <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-xs"><span
                    class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>

            @if (auth()->user()->id != $user->id)
                <a href="javascript:void(0)" data-toggle1="modal" data-target="#delete{{ $key }}"
                    onclick=" Confirm('Confirm', 'Are you sure you want to delete this?', 'Yes', 'Cancel', {{ $user->id }})"
                    data-singleDelete="{{ route('user.destroy', $user->id) }}"
                    class="btn btn-danger btn-xs delete-invoice singleDelete{{ $user->id }}">
                    <i class="fa fa-trash m-r-5"></i>
                </a>
            @endif
        </td>
    </tr>
@empty

@endforelse
