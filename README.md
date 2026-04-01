# 🐘 Sistema de Gestão de Produtos (PHP 5 + PostgreSQL)

Este repositório contém um sistema básico de gerenciamento de produtos desenvolvido em **PHP 5**, utilizando **PostgreSQL** como banco de dados. O projeto foi estruturado de forma modular para facilitar o reuso de código e a manutenção.

---

## 🛠️ Tecnologias e Ferramentas
* **Linguagem:** PHP 5.6+
* **Banco de Dados:** PostgreSQL 9.x ou superior
* **Servidor Web:** Apache (XAMPP / WampServer)
* **Frontend:** HTML5 e CSS3 (Estilização básica)

---

## 🚀 Funcionalidades
- [x] **Grid de Produtos:** Visualização de todos os itens cadastrados com formatação de moeda (R$).
- [x] **Cadastro de Itens:** Formulário dinâmico para inserção de novos produtos no banco.
- [x] **Gerenciamento de Sessão:** Uso de `$_SESSION` para persistência de dados do usuário.
- [x] **Arquitetura Modular:** Separação em `cabecalho`, `rodape` e `config` via `include/require`.

---

## 📋 Configuração do Ambiente

### 1. Habilitar o Driver do PostgreSQL no PHP
Para que o PHP se comunique com o Postgres, você deve editar o arquivo `php.ini` do seu servidor (XAMPP):
1. Procure pela linha `;extension=pgsql`.
2. Remova o `;` (ponto e vírgula) do início.
3. Salve e **reinicie o Apache**.

### 2. Estrutura do Banco de Dados (SQL)
Execute os comandos abaixo no seu terminal SQL ou no **pgAdmin** para criar a estrutura necessária:

```sql
-- Criar Banco de Dados
CREATE DATABASE produtos;

-- Tabela de Produtos
CREATE TABLE public.produto (
    idproduto SERIAL PRIMARY KEY,
    produtonome VARCHAR(100) NOT NULL,
    produtopreco REAL NOT NULL DEFAULT 0,
    produtofoto VARCHAR(150),
    produtostatus BOOLEAN DEFAULT true
);

-- Tabela de Usuários
CREATE TABLE public.usuario (
    idusuario SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(32) NOT NULL,
    status BOOLEAN DEFAULT true
);

-- Inserção inicial para teste
INSERT INTO public.usuario (username, password) VALUES ('admin', '123456');



Arquivo,Descrição
config.php,Configurações de conexão e inicialização de sessão.
index.php,Página principal com a listagem (GRID) de produtos.
cadastro_produto.php,Formulário HTML para entrada de novos produtos.
inserir_produto.php,Lógica PHP que recebe os dados via POST e salva no Banco.
cabecalho.php,"Topo da página, menu e estilos CSS."
rodape.php,Rodapé do site e encerramento de conexões.




⚙️ Ajuste de Conexão
No arquivo config.php, altere os dados abaixo conforme sua configuração local:

PHP
$host = "localhost";
$dbname = "produtos";
$user = "postgres";
$password = "SUA_SENHA_AQUI";



Este projeto foi desenvolvido para fins educacionais.


<img width="1910" height="482" alt="image" src="https://github.com/user-attachments/assets/0d8034d3-334e-48eb-a3ef-6fd909800767" />

