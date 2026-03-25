# ✈️ Flyway — Sistema de Reserva de Pacotes de Viagem

Sistema web completo de reserva e pagamento de pacotes de viagem, desenvolvido com PHP, HTML, CSS, JavaScript e MySQL.

---

## Funcionalidades

- Cadastro e login de usuários com autenticação via banco de dados
- 4 destinos disponíveis: Recife, Rio de Janeiro, São Paulo e Salvador
- Seleção de quartos e número de pessoas por pacote
- Reserva com simulação de pagamento em 3 modalidades: cartão de crédito, débito e Pix
- Geração de código Pix copia e cola
- Histórico de pacotes reservados por status: aguardando pagamento, pagos e cancelados
- Edição de perfil: nome, email, país, gênero e data de nascimento
- Upload de foto de perfil exibida como ícone durante a navegação
- Logout com persistência dos dados no banco
- Carrossel de avaliações de viajantes

---

## Tecnologias

[![My Skills](https://skillicons.dev/icons?i=php,mysql,js,html,css,apache)](https://skillicons.dev)
![Apache](https://img.shields.io/badge/Apache-D22128?style=flat&logo=apache&logoColor=white)


---

## Estrutura do projeto

```
Vreal/
├── flyway.sql              ← banco de dados para importar
├── header.css
├── reviews.css
├── index/                  ← página inicial
├── login/                  ← autenticação
├── cadastro/               ← cadastro de usuários e conexão com banco
│   └── conexao.php         ← configuração do banco de dados
├── destinos/               ← páginas de cada destino
├── checkout/               ← fluxo de reserva e pagamento
├── pacotes/                ← histórico de pacotes do usuário
├── perfil/                 ← edição de perfil e upload de foto
├── componentes/            ← componentes reutilizáveis
└── assets/                 ← imagens gerais
```

---

## Como rodar localmente

### Pré-requisitos

- [USBWebServer](https://www.usbwebserver.net/) ou qualquer servidor local com Apache + PHP + MySQL (XAMPP, WAMP etc.)

### Passo a passo

**1. Clone o repositório**
```bash
git clone https://github.com/ferreiraxzz/flyway-viagens-php.git
```

**2. Mova a pasta para o diretório do servidor**

Se estiver usando USBWebServer:
```
D:\USBWebserver v10\root\flyway-viagens-php
```

Se estiver usando XAMPP:
```
C:\xampp\htdocs\flyway-viagens-php
```

**3. Importe o banco de dados**

- Inicie o servidor e acesse o phpMyAdmin
- Crie um banco chamado `flyway`
- Clique em **Importar** e selecione o arquivo `flyway.sql`

**4. Verifique a conexão**

Abra `cadastro/conexao.php` e confirme as credenciais:

```php
$servername = "localhost";
$username = "root";
$password = "usbw";     // padrão USBWebServer — ajuste se usar outro servidor
$database = "flyway";
```

| Servidor | Usuário | Senha |
|----------|---------|-------|
| USBWebServer | root | usbw |
| XAMPP | root | *(vazio)* |
| WAMP | root | *(vazio)* |

**5. Acesse no navegador**
```
http://localhost/flyway-viagens-php/index/index.php
```

---

## Telas do sistema

| Tela | Descrição |
|------|-----------|
| Home | Destinos em destaque, carrossel de avaliações |
| Destinos | Detalhes do pacote, seleção de quartos e pessoas |
| Checkout | Simulação de pagamento em crédito, débito ou Pix |
| Meus Pacotes | Histórico de reservas por status |
| Perfil | Edição de dados e foto de perfil |

---

## Observações

- O sistema não está responsivo para dispositivos móveis — melhoria planejada com media queries
- O pagamento é uma simulação educacional, sem integração com gateway real
- As fotos de perfil são salvas localmente em `perfil/upload/`

---

## Autor

Desenvolvido por [Miguel Martins](https://github.com/ferreiraxzz) — projeto acadêmico FATEC Mauá
