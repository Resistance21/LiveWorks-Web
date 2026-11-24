<x-ui.layout>
    <div class="sign-in-page">
        <x-ui.site-header />

        <main class="sign-in-main">
            <section class="sign-in">
                <p>LIVEWORKS PROJECT UPLOAD &amp; ARCHIVE</p>
                <h1>Sign in to continue</h1>
                <p>Use your TAFE account to access LiveWorks project submissions and archive records.</p>

                <form method="POST" action="{{ route('ui.sign-in.submit') }}">
                    @csrf
                    <label for="email">TAFE email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username"
                        required autofocus>
                    <x-input-error :messages="$errors->get('email')" />
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required>
                    <x-input-error :messages="$errors->get('password')" />
                    <button type="submit">Sign in</button>
                </form>
            </section>
        </main>

        <footer class="site-footer">
            <p>Need help? Contact your lecturer or LiveWorks project coordinator.</p>
        </footer>
    </div>
</x-ui.layout>
