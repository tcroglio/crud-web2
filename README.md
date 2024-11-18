
# CRUD Agenda - Sistema em PHP

Este é um projeto de sistema CRUD simples desenvolvido em PHP, utilizando arquivos `.txt` como banco de dados. O objetivo do sistema é gerenciar uma agenda, permitindo o cadastro, edição, visualização e exclusão de contatos.

## 📋 Funcionalidades

- **Cadastrar contato**: Adicione novos contatos à agenda.
- **Editar contato**: Modifique informações de contatos existentes.
- **Excluir contato**: Remova contatos que não são mais necessários.
- **Listar contato**: Visualize todos os contatos cadastrados.

## 🗂️ Estrutura de Dados

Os dados do sistema são armazenados em arquivos de texto:
- **agenda.txt**: Contém os dados dos contatos cadastrados.
- **usuarios.txt**: Contém as informações dos usuários registrados.

Os arquivos são manipulados diretamente pelo código PHP para leitura, escrita, edição e exclusão de dados.

## 🚀 Como Usar

1. **Configuração do Servidor**: Certifique-se de ter um servidor local instalado, como o XAMPP ou WAMP, com suporte para PHP.
2. **Configuração do Projeto**:
   - Extraia os arquivos do projeto na pasta `htdocs` (no XAMPP) ou em uma pasta equivalente do servidor local.
3. **Acesso ao Sistema**:
   - No navegador, acesse `http://localhost/crud`.
   - A interface permitirá gerenciar os compromissos da agenda.

## 🛠️ Requisitos do Sistema

- Servidor web (Apache recomendado).
- PHP 7.0 ou superior.
- Permissões de escrita/leitura nos arquivos `.txt` do projeto.

## 🗒️ Observações

Este projeto utiliza armazenamento em arquivos de texto como forma de simplificar a implementação e evitar a necessidade de um banco de dados mais robusto. Para projetos em produção, recomenda-se migrar para um banco de dados como MySQL.

## 📂 Estrutura do Projeto

```
crud/
├── index.php            # Página inicial com listagem de contatos
├── agendaCadastrar.php  # Página para cadastrar contatos
├── agendaEditar.php     # Página para editar contatos
├── agendaExcluir.php    # Página para excluir contatos
├── alterar.php          # Página para alterar usuários
├── cadastro.php         # Página para cadastrar usuários
├── funcoesAgenda.php    # Funções reutilizáveis da agenda
├── funcoes.php          # Funções reutilizáveis do sistema
├── header.php           # Arquivo de include do cabeçalho
├── loginHeader.php      # Arquivo de include do cabeçalho do login
├── logout.php           # Arquivo que processa o logout do usuário
├── agenda.txt           # Arquivo de dados da agenda
├── usuarios.txt         # Arquivo de dados dos usuários
```

## 📞 Suporte

Em caso de dúvidas ou problemas, sinta-se à vontade para abrir uma *issue* ou enviar um e-mail para o seguinte email: *tiago.roglio2112@gmail.com* .

---

Projeto desenvolvido como exemplo de CRUD com armazenamento em arquivos de texto, feito durante aula de curso técnico.

Desenvolvido por: Tiago Roglio