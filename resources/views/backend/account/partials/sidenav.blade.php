<div class="list-group tw-shadow mb-4">
    <a href="{{ route('profile.settings') }}" class="list-group-item list-group-item-action">
        <i class="fe fe-user mr-1"></i> Information
    </a>
    <a href="{{ route('profile.settings', ['type' => 'security']) }}" class="list-group-item list-group-item-action">
        <i class="fe fe-shield mr-1"></i> Security
    </a>
    <a href="{{ route('profile.settings', ['type' => 'api-tokens']) }}" class="list-group-item list-group-item-action">
        <i class="fe fe-terminal mr-1"></i> API tokens
    </a>
</div>

<div class="list-group tw-shadow">
    <a href="#" class="list-group-item list-group-item-action list-group-item-danger">
        <i class="fe fe-x-circle mr-1"></i> Delete your account
    </a>
</div>