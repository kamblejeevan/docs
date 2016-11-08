---

copyright:
  years: 2016

---

{:new_window: target="_blank"}
{:shortdesc: .shortdesc}
{:screen:.screen}
{:codeblock:.codeblock}

# Configurando integrações de ferramenta
{: #integrations}

Última atualização: 13 de setembro de 2016
{: .last-updated}

É possível configurar integrações de ferramenta que suportam tarefas de desenvolvimento, implementação e operações ao criar uma cadeia de ferramentas ou é possível incluir e configurar integrações de ferramenta para customizar uma cadeia de ferramentas existente.  
{:shortdesc}

**Importante**: este recurso é experimental. As cadeias de ferramentas podem não ser estáveis e podem mudar de maneiras incompatíveis com as versões anteriores. Elas não são recomendadas para uso em ambientes de produção. No
{{site.data.keyword.Bluemix_notm}} Public, cadeias de ferramentas estão disponíveis somente na região sul dos EUA.

As integrações de ferramenta que estão disponíveis para incluir e configurar para a sua cadeia de ferramentas são diferentes dependendo se você está usando cadeias de ferramentas no
{{site.data.keyword.Bluemix_notm}} Public ou no {{site.data.keyword.Bluemix_notm}} Dedicated.

*Tabela 1. Integrações de ferramenta disponíveis para cadeias de ferramentas no {{site.data.keyword.Bluemix_notm}} Public e Dedicated*

|Integração de ferramenta |Disponível no {{site.data.keyword.Bluemix_notm}} Public	|Disponível no {{site.data.keyword.Bluemix_notm}} Dedicated|
|:----------|:------------------------------|:------------------|
|{{site.data.keyword.deliverypipeline}} 		|Sim	   	|Sim  		|
|{{site.data.keyword.DRA_short}} 		|Sim		|Não			|
|{{site.data.keyword.webide}} do Eclipse Orion		|Sim		|Sim			|
|GitHub		|Sim		|Não		|
|Dedicated GitHub Enterprise			|Não		|Sim		|
|PagerDuty			|Sim		|Não		|
|Sauce Labs		|Sim		|Não		|
|Slack			|Sim		|Não		|

**Dica**: se você deseja iniciar o desenvolvimento com o seu código de origem no {{site.data.keyword.Bluemix_notm}} Public, configure a integração de ferramenta GitHub antes de configurar o {{site.data.keyword.deliverypipeline}}. Se você deseja iniciar o desenvolvimento com o seu código no {{site.data.keyword.Bluemix_notm}} Dedicated, configure a integração de ferramenta {{site.data.keyword.ghe_short}} antes de configurar o {{site.data.keyword.deliverypipeline}}. 


## Configurando o pipeline de entrega
{: #deliverypipeline}

O {{site.data.keyword.deliverypipeline}} automatiza a implementação contínua de seus projetos por meio de sequências de estágios que
recuperam tarefas de entrada e de execução, como construções, testes e implementações. 

Configure o {{site.data.keyword.deliverypipeline}} para automatizar a construção, o teste e a implementação contínuos de seus apps: 

1. Se estiver configurando essa integração de ferramenta conforme estiver criando a cadeia de ferramentas, na seção Integrações
configuráveis, clique em **Pipeline de entrega**. Dependendo do modelo que usar, campos diferentes poderão estar disponíveis. Revise
os valores de campo padrão e, se necessário, mude essas configurações.
1. Se você tiver uma cadeia de ferramentas no {{site.data.keyword.Bluemix_notm}} Public e estiver incluindo essa integração de ferramenta nele, no painel do DevOps, na guia **Cadeias de ferramentas**, clique na cadeia de ferramentas para abrir a sua página Integrações de ferramenta. Como alternativa, em sua página Visão geral do aplicativo, no ladrilho Entrega contínua, clique em **Visualizar cadeia de ferramentas**. Em seguida, clique em **Integrações de ferramenta**. Se você estiver usando uma cadeia de ferramentas no {{site.data.keyword.Bluemix_notm}} Dedicated, no Painel, na guia
**DEVOPS**, clique na cadeia de ferramentas para abrir a sua página Integrações de ferramenta. Como alternativa, no canto superior direito da página Visão geral do aplicativo, clique em
**Visualizar cadeia de ferramentas**. Em seguida, clique em **Integrações de ferramenta**. 
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **Pipeline de entrega**.
1. Especifique um nome para seu novo pipeline.
1. Se planejar usar seu pipeline para implementar uma interface com o usuário, selecione a caixa de seleção **App visualizável**. Todos os apps que seu pipeline criar serão mostrados na lista **VISUALIZAR APP** na página Integrações de ferramenta da cadeia de ferramentas.
1. Clique em **Criar integração** para incluir o {{site.data.keyword.deliverypipeline}} em sua cadeia de ferramentas.
1. Clique no ladrilho para {{site.data.keyword.deliverypipeline}} para visualizar o pipeline e configurá-lo. Para aprender os fundamentos da configuração de um pipeline, consulte [Construindo e implementando pipelines](../services/DeliveryPipeline/build_deploy.html){: new_window}.

  **Dica**: se você quiser acionar o pipeline quando enviar mudanças por push ao seu repositório (repo) GitHub ou {{site.data.keyword.ghe_short}}, deve-se configurar GitHub ou {{site.data.keyword.ghe_short}} para a sua cadeia de ferramentas antes de definir os estágios para o seu pipeline. Os estágios de pipeline precisam das URLs Git para os seus repositórios. Cada estágio de pipeline pode referir-se a apenas um dos repositórios GitHub ou {{site.data.keyword.ghe_short}} que está associado com a sua cadeia de ferramentas. Para obter instruções para configurar GitHub, consulte a seção [GitHub](#github). Para obter instruções para configurar o Dedicated GitHub Enterprise, consulte [Introdução ao {{site.data.keyword.ghe_long}}](../services/ghededicated/index.html){: new_window}.
  
1. Opcional: se você estiver usando uma cadeia de ferramentas no {{site.data.keyword.Bluemix_notm}} Public e deseja que os Sauce Labs executem testes em seu aplicativo, configure o {{site.data.keyword.deliverypipeline}} para incluir uma tarefa de teste dos Sauce Labs. Para obter instruções para configurar a tarefa de teste, consulte a seção [Configurando uma tarefa de teste Sauce Labs em seu pipeline](#config_saucelabs).

### Configurando uma tarefa de teste Sauce Labs em seu pipeline
{: #config_saucelabs}

Antes de configurar uma tarefa de teste Sauce Labs em seu pipeline, será necessário um pipeline em funcionamento que possua estágios para construir e implementar seu app e deve-se configurar o Sauce Labs para sua cadeia de ferramentas. Para obter instruções para configurar o Sauce Labs, consulte a seção [Sauce Labs](#saucelabs).

Configure o {{site.data.keyword.deliverypipeline}} para incluir uma tarefa de teste Sauce Labs:

1. Se você não tiver um estágio que implemente uma versão de teste de seu app, crie um.
1. No estágio, inclua uma tarefa de teste após a tarefa de implementação. Ao colocar essas tarefas no mesmo estágio, elas poderão acessar o mesmo conjunto de propriedades do ambiente.
  ![Tarefa de Teste ](images/toolchain_test_job.png) 

1. Configure o estágio: 

  a. Na guia **PROPRIEDADES DO AMBIENTE**, crie três propriedades: CF_APP_NAME, SAUCE_USERNAME e SAUCE_ACCESS_KEY.
  
  b. Insira seu nome de usuário e chave de acesso do Sauce Labs. Ao fazer isso, você externaliza esses valores para que possa usá-los em seus testes.
  
1. Configure a tarefa de implementação. No campo **Implementar script**, inclua esse comando: `export CF_APP_NAME="$CF_APP"`. Esse comando exporta o nome do app como uma propriedade do ambiente.
1. Configure a tarefa de teste. Os valores na imagem a seguir são exemplos. Os campos **Instância de serviço**, **Destino**, **Organização** e **Espaço** são preenchidos com o nome do usuário, a região, a organização e o espaço dos Sauce Labs que você está usando. ![Configurar tarefa](images/toolchain_configure_job.png)

  a. Para o tipo de testador, selecione **Sauce Labs**.
  
  b. Para a instância de serviço, selecione o nome de usuário Sauce Labs que usou quando configurou o Sauce Labs para sua cadeia de ferramentas. 
  
   **Dica**: para ver o nome de usuário e chave de acesso que usou quando configurou o Sauce Labs para sua cadeia de ferramentas, clique em **Configurar**. 
  
  c. No campo **Comando de execução de teste**, insira os comandos que instalam as dependências necessárias por seus testes e, em seguida, execute os testes. Por exemplo, para um aplicativo Node.js, você pode inserir esses comandos:
     ```
     npm install
     node_modules/grunt-cli/bin/grunt test:sauce:parallel
     ```
  
    d. Se desejar ver seus relatórios de teste nos logs de tarefa de teste, selecione a caixa de seleção **Ativar relatório de teste** e configure o Padrão de arquivo de resultado de teste como `test/*.xml`.
  
1. Clique em **SALVAR**. Sempre que o pipeline for executado, os seus testes dos Sauce Labs serão executados.

Para aprender mais, consulte [Pipeline de entrega](https://www.ibm.com/devops/method/content/deliver/tool_build_and_deploy/){: new_window}.


## Incluindo {{site.data.keyword.DRA_short}}
{: #dra}

{{site.data.keyword.DRA_full}} coleta e analisa os resultados dos testes de unidade, testes funcionais e ferramentas de cobertura de código para determinar se seu código atende a critérios predefinidos em gates especificados em seu processo de implementação. Se seu código não atender ou exceder os critérios, a implementação será interrompida para evitar riscos de serem liberados. É possível usar {{site.data.keyword.DRA_short}} como uma rede de segurança para o seu ambiente de entrega contínua ou como uma maneira de implementar e melhorar os padrões de qualidade. 

 **Nota**: essa integração de ferramenta é pré-configurada. Ela não requer nenhum parâmetro de configuração e não é possível reconfigurá-la.
 
Inclua {{site.data.keyword.DRA_short}} para manter e melhorar a qualidade do seu código no {{site.data.keyword.Bluemix_notm}} monitorando as suas implementações para identificar riscos antes que elas sejam liberadas.

1. Se você tiver uma cadeia de ferramentas e estiver incluindo essa integração de ferramenta nela, no painel DevOps, na guia **Cadeias de ferramentas**, clique na cadeia de ferramentas para abrir sua página Integrações de ferramenta. Como alternativa, na página Visão geral do app, no ladrilho Entrega contínua, clique em **Visualizar cadeia de ferramentas**. Em seguida, clique em **Integrações de ferramenta**. 
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **Deployment Risk Analytics**. 
1. Clique em
**Criar integração**.
1. Clique no ladrilho para {{site.data.keyword.DRA_short}} e, em seguida, conclua as etapas de introdução: criar critérios, conectar os critérios no pipeline e executar o pipeline. Para obter informações adicionais, consulte [{{site.data.keyword.DRA_short}}](https://www.ibm.com/devops/method/content/deliver/tool_deployment_risk_analytics/){: new_window}.


## Incluindo o Eclipse Orion {{site.data.keyword.webide}}
{: #webide}

O Eclipse Orion {{site.data.keyword.webide}} é um ambiente baseado na web integrado em que é possível criar, editar, executar, depurar e concluir tarefas de controle de fonte. É possível mover perfeitamente da edição para execução, do envio para implementação. 

 **Nota**: essa integração de ferramenta é pré-configurada. Ela não requer nenhum parâmetro de configuração e não é possível reconfigurá-la.
 
Para concluir tarefas de controle de origem, inclua a integração de ferramenta do {{site.data.keyword.webide}} do Eclipse Orion:

1. Se você tiver uma cadeia de ferramentas no {{site.data.keyword.Bluemix_notm}} Public e estiver incluindo essa integração de ferramenta nele, no painel do DevOps, na guia **Cadeias de ferramentas**, clique na cadeia de ferramentas para abrir a sua página Integrações de ferramenta. Como alternativa, na página Visão geral do app, no ladrilho Entrega contínua, clique em **Visualizar cadeia de ferramentas**. Em seguida, clique em **Integrações de ferramenta**. Se você estiver usando uma cadeia de ferramentas no {{site.data.keyword.Bluemix_notm}} Dedicated, no Painel, na guia **DEVOPS**, clique na cadeia de ferramentas para abrir a sua página Integrações de ferramenta. Como alternativa, no canto superior direito da página Visão geral do aplicativo, clique em **Visualizar cadeia de ferramentas**. Em seguida, clique em **Integrações de ferramenta**.
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **Eclipse Orion Web IDE**. 
1. Clique em
**Criar integração**.
1. Clique no ladrilho para o novo {{site.data.keyword.webide}} do Eclipse Orion. A sua área de trabalho é previamente preenchida com os seus repositórios GitHub ou {{site.data.keyword.ghe_short}}. Os repos associados a sua cadeia de ferramentas atual são destacados.

Para saber mais, consulte [Editando código com o {{site.data.keyword.webide}} do Eclipse Orion](../toolchains/web_ide.html){: new_window}.


## Configurando GitHub
{: #github}

O GitHub é um serviço de hospedagem baseado na web para
repos Git. É possível ter ambas as cópias local e remota de
seus repos, o que
facilita a colaboração. 

O GitHub Issues é uma ferramenta de controle que mantém seu trabalho e seus planos todos em um lugar. Ele
é integrado a seu repo de
desenvolvimento para que possa focar em tarefas importantes.

Configure GitHub para gerenciar o seu código-fonte na nuvem:

1. Se estiver configurando esta integração de ferramenta conforme estiver criando a cadeia de ferramentas, siga estas etapas:

 a. Na seção Integrações configuráveis, clique em **GitHub**. Se você não autorizou o {{site.data.keyword.Bluemix_notm}} a acessar o GitHub, clique em
**Autorizar** para acessar o website do GitHub. Se você não
tiver uma sessão GitHub ativa, será solicitado que efetue login. Clique em **Autorizar aplicativo** para permitir que o {{site.data.keyword.Bluemix_notm}} acesse a sua conta do GitHub. Se
você tiver uma sessão GitHub ativa, mas não tiver inserido sua senha recentemente, poderá ser solicitado que insira sua senha GitHub para
confirmar.
 
 b. Revise os locais de repo de destino padrão para os
repos GitHub. Esses repos são clonados a partir dos mesmos
repos de amostra. Se
necessário, mude os nomes dos repos de destino.
 ![Locais de repo de destino padrão](images/toolchain_github_config.png)
   
1. Se você tiver uma cadeia de ferramentas e estiver incluindo essa integração de ferramenta nela, no painel DevOps, na guia
**Cadeias de ferramentas**, clique na cadeia de ferramentas para abrir sua página Integrações de ferramenta. Como
alternativa, na página Visão geral do app, no ladrilho Entrega contínua, clique em **Visualizar cadeia de ferramentas**. Em
seguida, clique em **Integrações de ferramenta**. 
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **GitHub**.
1. Se você tiver um repo GitHub e desejar usá-lo, digite
a
URL. Para o tipo de repositório, clique em **Link**.
1. Se desejar usar um novo repo GitHub, digite um nome
para o repo GitHub, digite a URL para o repo que estiver
clonando ou bifurcando e
selecione o tipo de repositório: 

 a. Para criar um repositório vazio, clique em **Novo**. 
 
 b. Para criar uma cópia de um repositório GitHub, clique em **Clonar**.
 
 c. Para bifurcar um repositório GitHub para que você possa contribuir com as mudanças por meio de solicitações de pull, clique em **Bifurcar**.
 
1. Se desejar usar o GitHub Issues para o controle de emissões, selecione a caixa de seleção **Ativar GitHub Issues**.
1. Clique em
**Criar integração**.
1. Clique no ladrilho para o repositório GitHub com o qual você deseja trabalhar. O website do GitHub é aberto, no qual é possível visualizar os conteúdos do repositório.
 
  **Dica**: é possível usar as ferramentas de gerenciamento de código-fonte integrado no {{site.data.keyword.webide}} do Eclipse Orion para editar o repositório GitHub e
implementar um aplicativo a partir de sua área de trabalho.

1. Se você ativou o GitHub Issues, clique no ladrilho para o GitHub Issues para abri-lo.

Para obter mais informações, consulte [GitHub](https://www.ibm.com/devops/method/content/code/tool_github/){: new_window} e
[GitHub
Issues](https://www.ibm.com/devops/method/content/think/tool_github_issues/){: new_window}.


## Configurando o Dedicated GitHub Enterprise
{: #configghe}

O {{site.data.keyword.ghe_long}} é um serviço de hospedagem no local, baseado na web para repositórios Git. O Dedicated GitHub Enterprise destina-se apenas a clientes do
{{site.data.keyword.Bluemix_notm}} Dedicated. O GitHub Issues é uma ferramenta de controle que mantém o seu trabalho e os seus planos todos em um local. Ele
é integrado a seu repo de
desenvolvimento para que possa focar em tarefas importantes. Para obter mais informações sobre o Dedicated GitHub Enterprise e o GitHub Issues, consulte
[Usando o Dedicated GitHub
Enterprise](../services/ghededicated/index.html){: new_window} e o [GitHub Issues](https://www.ibm.com/devops/method/content/think/tool_github_issues/){: new_window}.

É possível configurar o {{site.data.keyword.ghe_short}} como uma integração de ferramenta em sua cadeia de ferramentas para que você possa gerenciar o código-fonte em sua instância do
[{{site.data.keyword.Bluemix_notm}} Dedicated](../dedicated/index.html#dedicated){: new_window} de sua empresa.

1. Se estiver configurando esta integração de ferramenta conforme estiver criando a cadeia de ferramentas, siga estas etapas:

 a. Antes de efetuar login no Dedicated GitHub Enterprise pela primeira vez, peça ao administrador da região de sua empresa para incluir o seu ID do usuário em sua instância do
{{site.data.keyword.Bluemix_notm}} Dedicated a partir de seu registro do usuário de sua empresa usando o LDAP. Para obter informações sobre como configurar a sua conta do
{{site.data.keyword.ghe_short}}, consulte [Usando o Dedicated GitHub Enterprise](../services/ghededicated/index.html){: new_window}.
 
 b. Na seção Integrações configuráveis, clique em **{{site.data.keyword.ghe_short}}**.    
 
 c. Revise o nome padrão para o novo repositório {{site.data.keyword.ghe_short}}. Se necessário, mude o nome do novo repositório. A imagem a seguir mostra um exemplo de um repositório que é
clonado a partir de um repositório de amostra. É possível usar um repositório existente ou um novo repositório. Para usar um novo repositório, é possível criar um repositório vazio, clonar um repositório ou
bifurcar um repositório.
 ![Locais de repositório padrão](images/toolchain_ghe_config.png)
   
1. Se você tiver uma cadeia de ferramentas no {{site.data.keyword.Bluemix_notm}} Public e estiver incluindo essa integração de ferramenta nele, no painel do DevOps, na guia **Cadeias
de ferramentas**, clique na cadeia de ferramentas para abrir a sua página Integrações de ferramenta. Como alternativa, em sua página Visão geral do aplicativo, no ladrilho Entrega contínua, clique
em **Visualizar cadeia de ferramentas**. Em
seguida, clique em **Integrações de ferramenta**. Se você estiver usando uma cadeia de ferramentas no {{site.data.keyword.Bluemix_notm}} Dedicated, no Painel, na guia
**DEVOPS**, clique na cadeia de ferramentas para abrir a sua página Integrações de ferramenta. Como alternativa, no canto superior direito da página Visão geral do aplicativo, clique em
**Visualizar cadeia de ferramentas**. Em
seguida, clique em **Integrações de ferramenta**.
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **{{site.data.keyword.ghe_short}}**.
1. Se você tiver um repositório {{site.data.keyword.ghe_short}} que deseja usar, digite a URL para o repositório. Para o tipo de repositório, clique em **Existente**.
1. Se você deseja usar um novo repositório {{site.data.keyword.ghe_short}}, digite um nome para o repositório, digite a URL para o repositório que estiver clonando ou bifurcando e selecione
o tipo de repositório: 

 a. Para criar um repositório vazio, clique em **Novo**. 
 
 b. Para criar uma cópia de um repositório, clique em **Clonar**.
 
 c. Para bifurcar um repositório para que você possa contribuir com as mudanças por meio de solicitações de pull, clique em **Bifurcar**.
 
1. Para usar o GitHub Issues para o rastreamento de problema, marque a caixa de seleção **Ativar o GitHub Issues**.
1. Clique em
**Criar integração**.
1. Clique no ladrilho para o repositório {{site.data.keyword.ghe_short}} com o qual você deseja trabalhar. A instância do
[{{site.data.keyword.Bluemix_notm}} Dedicated](../dedicated/index.html#dedicated){: new_window} de sua empresa é aberta, na qual é possível visualizar os conteúdos do repositório.
 
  **Dica**: é possível usar as ferramentas de gerenciamento de código-fonte integrado no {{site.data.keyword.webide}} do Eclipse Orion para editar o repositório {{site.data.keyword.ghe_short}}
e implementar um aplicativo a partir de sua área de trabalho.

1. Se você ativou o GitHub Issues, clique no ladrilho para o GitHub Issues.

<!-- 8/23/2016: The GHE Dedicated content has been moved to docs-staging/services/ghededicated/index.md -->

## Configurando o PagerDuty
{: #pagerduty}

O PagerDuty integra dados de diversos sistemas de monitoramento em uma única visualização. Quando um problema ocorre, o PagerDuty
assegura que o membro da equipe que melhor se adapta para corrigi-lo no momento seja notificado. Se o membro da equipe não responder ao problema, as escaladas poderão ser configuradas para roteá-lo para engenheiros secundários ou gerenciadores de operações.

Configure o PagerDuty para enviar notificações quando as falhas de estágio de pipeline ocorrerem para que você possa corrigir problemas mais rapidamente e reduzir o tempo de inatividade:

1. Se você estiver configurando esta integração de ferramenta conforme estiver criando a cadeia de ferramentas, na seção Integrações configuráveis, clique em **PagerDuty**.
1. Se você tiver uma cadeia de ferramentas e estiver incluindo essa integração de ferramenta nela, no painel DevOps, na guia
**Cadeias de ferramentas**, clique na cadeia de ferramentas para abrir sua página Integrações de ferramenta. Como
alternativa, na página Visão geral do app, no ladrilho Entrega contínua, clique em **Visualizar cadeia de ferramentas**. Em
seguida, clique em **Integrações de ferramenta**. 
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **PagerDuty**
1. Digite o nome do site PagerDuty associado à sua conta PagerDuty. Se você não tiver uma conta PagerDuty,
[registre uma](https://signup.pagerduty.com/accounts/new){: new_window}.
1. Digite a chave de acesso API para sua conta PagerDuty. Para obter instruções para localizar a chave, consulte
[Autenticação de API](https://signup.pagerduty.com/accounts/new){: new_window}.
1. Digite o nome de seu serviço PagerDuty.
1. Digite o endereço de e-mail para o contato PagerDuty primário.
1. Digite o número do telefone para o contato PagerDuty primário.
1. Clique em
**Criar integração**.
1. Clique no ladrilho para o PagerDuty para acessar o pagerduty.com. É possível visualizar os eventos associados ao serviço PagerDuty
que você especificou quando configurou esta integração de ferramenta para sua cadeia de ferramentas. 

Para aprender mais, consulte [PagerDuty](https://www.ibm.com/devops/method/content/manage/tool_pagerduty/){: new_window}.


## Configurando o Sauce Labs
{: #saucelabs}

O Sauce Labs executa testes de unidade funcional. Quando o suíte de testes do Sauce Labs é configurado como uma tarefa de teste no
{{site.data.keyword.deliverypipeline}}, o suíte de testes pode executar testes em relação a seu app da web ou móvel como parte de seu
processo de entrega contínua. Esses testes podem fornecer um controle de fluxo valioso para seus projetos, atuando como gates para impedir a
implementação de um código ruim.

Configure o Sauce Labs para executar testes funcionais automatizados em múltiplos sistemas operacionais e navegadores para que possa emular a
forma que um usuário pode usar um website ou um aplicativo:

1. Se você estiver configurando esta integração de ferramenta conforme estiver criando a cadeia de ferramentas, na seção Integrações configuráveis, clique em **Sauce Labs**.
1. Se você tiver uma cadeia de ferramentas e estiver incluindo essa integração de ferramenta nela, no painel DevOps, na guia
**Cadeias de ferramentas**, clique na cadeia de ferramentas para abrir sua página Integrações de ferramenta. Como
alternativa, na página Visão geral do app, no ladrilho Entrega contínua, clique em **Visualizar cadeia de ferramentas**. Em
seguida, clique em **Integrações de ferramenta**. 
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **Sauce Labs**.
1. Digite o nome de usuário associado à sua conta Sauce Labs. É possível [localizar seu nome de
usuário na mensagem de boas-vindas na parte superior da página da sua conta Sauce Labs](https://saucelabs.com/account){: new_window}.
1. Digite a chave de acesso para sua conta Sauce Labs. É possível [localizar a chave no
canto inferior esquerdo da página da sua conta Sauce Labs](https://saucelabs.com/account){: new_window}.
1. Clique em
**Criar integração**.
1. Clique no ladrilho para o Sauce Labs para acessar saucelabs.com e visualizar a atividade de teste para a cadeia de ferramentas.

 **Dica**: se você incluiu uma tarefa de teste Sauce Labs no {{site.data.keyword.deliverypipeline}}, é possível selecionar a instância de serviço.

Para aprender mais, consulte [Sauce Labs](https://www.ibm.com/devops/method/content/code/tool_sauce_labs/){: new_window}.


## Configurando o Slack
{: #slack}

**Importante**: as notificações que são postadas nos canais públicos Slack estão visíveis a todos na equipe. Lembre-se
que você é responsável pelo conteúdo que postar.

O Slack é um sistema de mensagens e um sistema de notificação tempo real baseados na nuvem. O Slack fornece o bate-papo persistente, que é uma alternativa interativa ao e-mail para a colaboração da equipe. É
possível se comunicar com sua equipe em um canal dedicado ou em um conjunto de canais diretamente relacionado ao seu trabalho. Também é possível
compartilhar arquivos e imagens por meio dos canais ou em mensagens diretas entre duas ou mais pessoas. As comunicações nas mensagens diretas e nos
canais são retidas para que seja possível procurá-las. 

Configure o Slack para recuperar notificações sobre sua cadeia de ferramentas a partir das integrações de ferramenta, como atividades de
teste e de implementação:

1. Se você estiver configurando esta integração de ferramenta conforme estiver criando a cadeia de ferramentas, na seção Integrações
configuráveis, clique em **Slack**.
1. Se você tiver uma cadeia de ferramentas e estiver incluindo essa integração de ferramenta nela, no painel DevOps, na guia
**Cadeias de ferramentas**, clique na cadeia de ferramentas para abrir sua página Integrações de ferramenta. Como
alternativa, na página Visão geral do app, no ladrilho Entrega contínua, clique em **Visualizar cadeia de ferramentas**. Em
seguida, clique em **Integrações de ferramenta**.
1. Clique no botão de inclusão (+).
1. Na seção Integrações de ferramenta, clique em **Slack**.
1. Digite o token de autenticação API para sua conta Slack. Deve-se usar um token de acesso total gerado para se autenticar com o Slack. Para
obter instruções para localizar o token, consulte [Autenticação de Slack](https://api.slack.com/web#authentication){: new_window}.
1. Digite o nome do canal Slack para o qual deseja que as notificações sejam enviadas. Se o canal que especificar não existir, ele será criado. Se o canal foi arquivado, ele será reativado.
1. Clique em
**Criar integração**.
1. Clique no ladrilho para o Slack. É possível visualizar todas as atividades para sua cadeia de ferramentas no canal Slack configurado.

Para aprender mais, consulte [Slack](https://www.ibm.com/devops/method/content/culture/tool_slack/){: new_window}.