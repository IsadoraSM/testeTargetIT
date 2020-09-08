# TargetIT - Reuniões 

## Preparação do ambiente

- 1) Renomeie o arquivo ".env.example" para ".env" e configure o MYSQL com os dados corretos.
- 2) No terminal, execute o comando (sem aspas): "composer install" - Assim, será instalada as dependências do laravel.
- 3) Após instalar as dependências do LARAVEL, execute no terminal (sem aspas): "php artisan key:generate" - Para gerar sua chave de aplicação parar encriptar seus dados.
- 4) No terminal, execute o comando (sem aspas): "npm install" - Assim, será instalada as demais dependências.
- 5) No terminal, execute o comando (sem aspas): "php artisan migrate --seed" - Para gerar tabelas e alimentar o banco de dados.

Obs.: É necessário que o seu ambiente de produção tenha o PHP 7.2+ configurado. (Para usuários Windows, utilize o Wamp.)

## Formas de uso
### Login Master
- Email: admin@gmail.com
- Senha: admin123456

O sistema inicia na tela de visualização de agendamentos. O Topbar possui as seguintes opções: 
- Agendar uma reunião;
- Registrar, que, ao clicar, te dará opção "Usuário" e "Setor";
- Seu nome de usuário, que, ao clicar, te dará opção de sair do sistema.
#### Registrar só está disponível para o usuário Master!

### Tela para Agendar uma reunião
Clicando em "Agendar uma reunião", você irá para a tela que te permite visualizar as salas disponíveis para agendamento.
- Primeiro, você precisará preencher os dados do filtro ( Local da reunião, Data da reunião, Horário de início e término), e clicar na Lupa para aplicar o filtro;
- Após aplicar o filtro, aparecerão as salas disponíveis para agendar. Para agendar, basta clicar em "Agendar";
- Após clicar em "Agendar", surgirá uma tela para visualizar as informações do agendamento, com opções de "Confirmar" e "Cancelar";
- Se confirmado, o agendamento será salvo no banco de dados e você será redirecionado para a tela inicial, onde constará o seu agendamento;
- Se cancelado, nada ocorrerá e será cancelada a operação.

Há regras para agendamento:
- Você só pode agendar uma sala por dia. Caso tente filtrar novamente com uma data que já possui agendamento, aparecerá uma mensagem "Você já possui uma sala de reunião agendada no dia informado (xx/xx/xxxx)";
- O agendamento não pode ser superior a 1h (uma hora).

### Tela de Registro de Usuário e Setor
- Tela de Registro de Usuário:
Clicando em "Registrar" e selecionando "Usuário", você será redirecionado para a tela de registro de usuário.

As informações necessárias para registro são:
- Nome Completo;
- Email;
- Telefone;
- Perfil;
- Setor;
- Senha (de 8 (oito) caracteres);
- Confirmação de senha.

Após inserir corretamente cada campo, basta clicar em "Registrar" para concluir a operação. Após isso, já será possível logar com o novo usuário.

- Tela de Registro de Setor:
Clicando em "Registrar" e selecionando "Setor", você será redirecionado para a tela de registro de setor.

Nela, é necessário informar o nome do Setor. Inserido o nome, clique em "Registrar" para concluir a operação. Após isso, já será possível selecionar o setor ao cadastrar um novo Usuário.


## Questões

### Requisitos Funcionais:
- São as exigências e funções que o software deve atender e realizar.
Exemplos:
- 1) O sistema deve gerenciar as salas de reuniões;
- 2) O sistema deve permitir que o usuário faça login;
- 3) O sistema deve permitir que o usuário master faça cadastro de novos setores.

### Requisitos Não Funcionais:
- São os requisitos relacionados a como as funcionalidades serão entregues ao usuário.
- 1) O sistema deve se comunicar com o banco MySQL;
- 2) O sistema deve ser desenvolvido utilizando as linguagens PHP e JavaScript;
- 3) O sistema deve ser desenvolvido seguindo o conceito S.O.L.I.D.