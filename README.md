# Prova backend ERP

* O teste consiste em construir novos módulos e realizar manutenção em um sistema que possui módulos legados.
 
 ## Módulo de Cliente
 
* O cadastro do cliente foi desenvolvido sem observar padrões de projeto e boas práticas de programação. 
Por se tratar de uma implementação antiga, podem existir bugs que devem ser corrigidos nesse fluxo.

  * Obs: O módulo de clientes não deve ser refatorado, apenas corrigido. 
 
* Fluxo do cliente
  * Buscar 
  * Cadastrar
  * Editar
  * Listar
 
* Dados do cliente
  * Nome
  * Idade
  * Telefone 

 ## Módulo de Venda
 
* A venda deverá ser implementada utilizando o framework Laravel pré configurado no diretório ``api``. 
Deverá ser implementada uma API Rest para atender o fluxo da venda. O frontend que se encontra na pasta ``front/venda`` 
deve ser utilizado como base para desenvolvimento do módulo.
  * Obs: No formulário de cadastro de venda, o campo ``Recarga`` deve possuir os valores: 10, 20, 30, 40 e 50 reais.

* Fluxo da venda
  * Cadastrar
  * Editar
  * Excluir
  * Listar 
 
* Dados da venda
  * Nome do cliente
  * Valor da recarga
  * Telefone
  
## O que será avaliado

* A prova possui um critério mínimo de requisitos que devem ser entregues, que são:
  * Correção do bug de Cliente
  * Crud da Venda

* A partir do momento que foi atingido o critério mínimo o candidato tem direito de submeter a prova, porém caso o candidato queira adicionar funcionalidades, modificações, arquitetura da aplicação e etc. Isso será avaliado também.

## Itens obrigatórios
- Utilização de Framework PHP Laravel

## Itens Adicionais
* Caso o candidato utilize algum dos itens a seguir conseguirá pontos adicionais na prova:

  * Utilização de Padrões de Projetos;
  * Utilização de Testes unitários de código;
  * Utilização de boas práticas de desenvolvimento (DRY, KISS e SOLID);
  * Funcionálidades não solicitadas (relatório de vendas realizadas, autenticação).
    * Obs: Os itens adicionais serão avaliados e podem resultar em perda de pontos em caso de erro.

## Itens Eliminatórios
* Utilização de ferramentas de geração automáticas de código

## bugs encontrados

### legado

* Os arquivos de font e css não estavam sendo carregado devido a estrutura do projeto dessa forma para que pudesse carregá-los foi alterado de ../assets/font-awesome/all.min.css para ./assets/font-awesome/all.min.css por exemplo;

* O redirecionamento de todas as urls estavam apontando para o diretorios errado pelo menos na estrutura em que foi disponibilizado o projeto. Dessa forma foi apenas acrescentado as url's ../ para que olhem uma pasta acima.
*