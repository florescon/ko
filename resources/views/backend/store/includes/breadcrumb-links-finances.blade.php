@if ($logged_in_user->hasAllAccess())
    <x-utils.link class="c-subheader-nav-link" :href="route('admin.store.finances.deleted')" :text="__('Show deleted')" />
@endif
