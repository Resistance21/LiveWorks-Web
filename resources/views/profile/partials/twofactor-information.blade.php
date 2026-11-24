<section>
    <header>
        <h2 class="text-lg font-medium text-zinc-900">
            {{ __('Two Factor Information') }}
        </h2>

        <p class="mt-1 text-sm text-zinc-600">
            {{ __('Listed below is yout Two Factor information') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- <div>
        {!! $qrCode !!}
    </div>

    <form method="POST" action="{{ route('two-factor.confirm') }}">
        @csrf
        <input type="text" name="code" ...>
        <button type="submit">Confirm</button>
    </form>

    <form method="POST" action="{{ route('two-factor.enable') }}">
        @csrf
        <button type="submit">Enable Two-Factor Authentication</button>
    </form>

    <form method="POST" action="{{ route('two-factor.disable') }}">
        @csrf
        @method('DELETE')
        <button type="submit">Disable Two-Factor Authentication</button>
    </form> --}}

    <div> TESTING</div>

    @if (!$twoFactorEnabled)
        <form method="POST" action="{{ route('two-factor.enable') }}">
            @csrf
            <button type="submit">Enable Two-Factor Authentication</button>
        </form>
    @elseif($twoFactorEnabled && !$twoFactorConfirmed)
        <div>
            {!! $qrCode !!}
        </div>
        <form method="POST" action="{{ route('two-factor.confirm') }}">
            @csrf
            <input type="text" name="code" ...>
            <button type="submit">Confirm</button>
        </form>
    @else
        <form method="POST" action="{{ route('two-factor.disable') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Disable Two-Factor Authentication</button>
        </form>
    @endif
</section>
