
# Sistema de Gerenciamento de Tarefas

Este é um sistema web de gerenciamento de tarefas desenvolvido com o framework Laravel, permitindo que usuários admin e comuns gerenciem tarefas de forma eficiente. O projeto conta com funcionalidades de atribuição de tarefas, acompanhamento de status, e geração de relatórios com gráficos em PDF.

## Funcionalidades:

- Cadastro e Login: Sistema de autenticação com dois tipos de usuário: admin e user.
- Gerenciamento de Tarefas:
     - Admin pode criar, editar e excluir tarefas.
     - Admin pode atribuir tarefas a usuários específicos.
     - Usuários podem visualizar, atualizar o status e a descrição das suas tarefas.
- Acompanhamento de Status: As tarefas podem ter 3 status: Concluída, Em andamento e Espera.
- Gráficos: Visualização gráfica das tarefas por status (Concluídas, Em andamento e Espera), com a capacidade de exportar o gráfico em formato PDF.
- Exportação de PDF: Gráficos e informações das tarefas podem ser exportados para PDF.

## Tecnologias Utilizadas

- Laravel: Framework PHP para o desenvolvimento web.
- ChartJS: Biblioteca JavaScript para visualização de gráficos.
- jsPDF : Biblioteca para gerar arquivos PDF no servidor.
- PostgreSQL: Banco de dados relacional para persistência de dados.
- Docker: Ambiente de contêiner para desenvolvimento.

## Pré-requisitos

- PHP >= 8.0
- Composer para gerenciamento de dependências.
- Node.js e npm para gerenciamento de pacotes front-end.
- Docker para um ambiente de desenvolvimento isolado (opcional).

## Como Configurar

- Clone o repositório
- Instale as dependências PHP (composer install)
- Instale as dependências front-end (npm install)
- Configure o arquivo .env
- Execute as migrations para criar o banco de dados
- Popule o banco de dados com dados de exemplo (php artisan db:seed)

## Funcionalidades do Sistema

- Autenticação
     - Admin : O administrador tem acesso completo ao CRUD de tarefas e pode atribuir tarefas a outros usuários.
     - User : O usuário pode visualizar suas tarefas e atualizar o status, descrição e horas gastas nas tarefas atribuídas a ele.
- Gerenciamento de Tarefas : O admin pode criar, editar e excluir tarefas. As tarefas possuem os seguintes campos
- Gráficos de Status das Tarefas : A página de Insights permite que o admin visualize o número de tarefas por status (Concluída, Em andamento e Espera) em um gráfico de barras interativo utilizando a biblioteca ChartJS. Além disso, é possível exportar esse gráfico como um arquivo PDF.
- Exportação para PDF : O gráfico gerado pode ser exportado para PDF, permitindo ao admin gerar relatórios para acompanhar o progresso das tarefas.
  
## Modelo Entidade Relacionamento

- O relacionamento do Banco de Dados foi feito entre a tabela de Users e a de Task .
![Gráfico das Tarefas](https://drive.google.com/uc?export=view&id=1xiffIAUStYidoCB_3BloWnRM84JThwwb)
