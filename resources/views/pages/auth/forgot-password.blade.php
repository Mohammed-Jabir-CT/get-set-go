<x-layouts.auth title="Forgot Password" description="Forgot password page for GetSetGo task manager.">
    <h1 class="text-xl font-bold underline text-center">Forgot Password</h1>
    <form action="{{ route('password.email') }}" method="post" class="flex flex-col items-center gap-2">
        @csrf
        <x-form-input type="email" name="email" placeholder="" label="Email" autocomplete="email" />
        <button type="submit" class="btn btn-primary w-full">
            Send Email
            <x-icon name="outgoing_mail" />
        </button>
        <x-link href="{{ url('login') }}" text="Back To Login" />
        <span class="label-text-alt text-xs text-info">{{ session('status') }}</span>
    </form>
</x-layouts.auth>
