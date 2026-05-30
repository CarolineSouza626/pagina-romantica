<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-paper-100">
<div class="flex min-h-screen items-center justify-center px-4">
    <form method="POST" action="{{ route('admin.login.store') }}" class="glass-panel w-full max-w-md p-8">
        @csrf
        <p class="text-xs uppercase tracking-[0.35em] text-rosewood/60">acesso admin</p>
        <h1 class="mt-3 text-3xl font-serif">Entrar no arquivo</h1>
        <div class="mt-6">
            <label class="admin-label">E-mail</label>
            <input class="admin-input" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="mt-4">
            <label class="admin-label">Senha</label>
            <input class="admin-input" type="password" name="password" required>
        </div>
        <label class="mt-4 flex items-center gap-2 text-sm text-ink/70">
            <input type="checkbox" name="remember" class="rounded border-paper-300 text-rosewood focus:ring-rosewood">
            lembrar sessão
        </label>
        <button class="emotional-btn mt-6 w-full" type="submit">entrar</button>
    </form>
</div>
</body>
</html>
