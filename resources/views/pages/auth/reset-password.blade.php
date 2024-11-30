<x-layouts.auth title="Reset Password" description="Reset password page for GetSetGo task manager.">
    <h1 class="text-xl font-bold underline text-center">Reset Password</h1>
    <form action="{{ route('password.update') }}" method="post" class="flex flex-col items-center gap-2">
        @csrf
        <x-form-input type="hidden" name="token" value="{{ $token }}" label="" placeholder="" autocomplete="no" />
        <x-form-input type="email" name="email" placeholder="" label="Email" autocomplete="email" />
        <x-form-input type="password" name="password" placeholder="" label="Password" autocomplete="password" />
        <x-form-input type="password" name="password_confirmation" placeholder="" label="Confirm Password" autocomplete="password" />
        <button type="submit" class="btn btn-primary w-full">
            Reset Password
            <x-icon name="lock_reset" />
        </button>
    </form>
</x-layouts.auth>
