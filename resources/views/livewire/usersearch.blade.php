<div>
    <input wire:model="search" type="text" placeholder="Search users..."/>

    <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item">{{ "✔" .$user->name }}</li>
        @endforeach
    </ul>
</div>
