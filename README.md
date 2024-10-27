# T
<div>
    <img src='https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white'>
    <img src='https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white'>
    <img src='https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white'>
    <img src='https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white'>
    <img src='https://img.shields.io/badge/CSS-FF9633?&style=for-the-badge&logo=css3&logoColor=white'>
    <img src='https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white'>
</div>
<br>

Descubra o WesFlix e prepare a pipoca! Com um catálogo completo de filmes, você encontra tudo o que precisa para maratonar suas séries favoritas ou alugar aos lançamentos mais recentes. Alugue online e aproveite o cinema no conforto do seu lar.
<br>

## CREDENCIAIL ADM:

Email:
```admin@example.com```
Senha:
```administrador123456789```

## CREDENCIAIL USUARIO COMUM:

Email:
```rodrigo.noescobar@gmail.com```
Senha:
```professor123456789```

Email:
```wesleysantosramos16@gmail.com```
Senha:
```wesleyy123456789```

### Pré-requisitos:

Certifique-se de ter os seguintes softwares instalados:

- [PHP](https://www.php.net/) >= 8.3
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) 

## Ações comuns a todos os usuários
Login
O acesso ao sistema é feito a partir do fornecimento do e-mail e senha, previamente cadastrados, na tela inicial da aplicação.

Recuperação de senha
Ao acessar o link "Esqueceu a senha?" na página inicial, o usuário poderá redefinir sua senha. Basta fornecer o e-mail associado à conta e clicar no botão "Enviar código". Um código de verificação será enviado para o e-mail fornecido, permitindo a confirmação da identidade e a criação de uma nova senha.

Edição de conta
Após o usuário ser devidamente cadastrado e logado no sistema, será possível ele mudar suas informações como nome e e-mail, clicando no seu nome previamente cadastrado que aparece na header da aplicação.

Deleção de conta
Após o usuário ser devidamente cadastrado e logado no sistema, será possível excluir permanentemente sua conta na tela de edição. Ao realizar essa ação, ele será redirecionado para a tela de login, onde poderá posteriormente realizar um novo cadastro.

Visualizar filmes cadastrados
Na tela inicial, após a realização do login, será possível ao usuário visualizar todos os filmes cadastrados na aplicação e suas informações de capa, nome, gênero e sinopse.

Ações do usuário comum
Cadastro de conta
Após se cadastrar, o usuário terá acesso à plataforma. Para isso, basta clicar no link "Cadastre-se" disponível na página inicial. O processo é simples e requer apenas o fornecimento do nome, e-mail e uma senha, que será criptografada no banco de dados.

Alugar filme
Após o usuário cadastrado e logado na aplicação, será exibido para ele os filmes cadastrados com um botão de alugar. Ao clicá-lo, o filme será associado ao usuário e aparecerá na sessão de “Filmes Alugados”.

Devolver filme
Na página inicial do usuário será possível acessar a sessão de “Filmes Alugados”, onde aparecerão os filmes previamente locado pelo cliente, nele aparecerá as informações do filme e um botão de “Devolver”. Ao clicá-lo, o filme sairá da lista do usuário.

Ações do usuário administrador
Cadastrar filmes
Ao acessar a página inicial, o administrador poderá cadastrar um novo filme no sistema clicando no botão de “Adicionar Filme”. O usuário será redirecionado para uma página específica onde fornecerá o título, capa, descrição e selecionará o gênero do filme.

Editar filmes
Ao acessar a página inicial, no card de cada filme previamente cadastrado, o administrador terá a opção de editar as informações de capa, título, descrição e gênero dos mesmos.

Remover filmes
Ao acessar a página inicial, no card de cada filme previamente cadastrado, o administrador terá a opção de excluí-lo. Ao clicar no botão, será exibido um modal para a confirmação da ação selecionada.