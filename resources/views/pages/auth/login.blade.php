<x-layouts.auth title="Login" description="Login page for GetSetGo task manager.">
    <h1 class="text-xl font-bold underline text-center">Login</h1>
    <form action="{{url('authenticate')}}" method="post" class="flex flex-col items-center gap-2">
        @csrf
        <x-form-input type="email" name="email" placeholder="" label="Email" autocomplete="email"/>
        <x-form-input type="password" name="password" placeholder="" label="Password" />
        <x-form-checkbox name="remember" label="Remember Me" />
        <button type="submit" class="btn btn-primary w-full">
            Login
            <x-icon name="login" />
        </button>
        <x-link href="{{route('password.request')}}" text="Forgot Password" />
        <span class="label-text-alt text-xs text-info">{{ session('status') }}</span>
    </form>
</x-layouts.auth>