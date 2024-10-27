@component('mail::message')

# Redefinição de Senha

Olá,

Recebemos uma solicitação de redefinição de senha para a sua conta do <span style="color:#4248F2; font-weight: bold;">The Movie Club</span>.

@component('mail::button', ['url' => $url])
Redefinir Senha
@endcomponent

Se você não solicitou uma redefinição de senha, ignore este email.
@endcomponent
