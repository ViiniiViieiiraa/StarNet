# StarNet

# 🚀 Starnet

> **Sistema de automação para configuração remota, diagnóstico de roteadores e suporte à operação de campo.**

O **Starnet** foi desenvolvido para apoiar uma operação realizada em parceria com a **Caixa Econômica Federal (CEF)**, permitindo a configuração e validação remota de roteadores distribuídos por diferentes regiões do Brasil, com suporte aos técnicos responsáveis pelas atividades em campo.

A aplicação foi criada com o objetivo de **automatizar processos que anteriormente dependiam de planilhas do Excel e da criação manual de scripts**, centralizando as etapas em um único sistema.

### 📊 Resultado

**Mais de 50% de redução no tempo de atendimento.**

O sistema automatizou a criação dos scripts de configuração, eliminou boa parte da preparação manual realizada anteriormente e permitiu que os usuários definissem as configurações necessárias simplesmente selecionando as opções disponíveis no sistema.

---

## 🎯 Objetivo

O principal objetivo do Starnet foi **reduzir o tempo e a complexidade envolvidos na configuração e no atendimento de roteadores remotamente**, proporcionando uma ferramenta centralizada para as equipes responsáveis pela operação.

Antes da implementação, parte significativa do processo dependia de:

- Planilhas do Excel;
- Criação manual de scripts;
- Preparação de configurações;
- Execução de testes individualmente;
- Comunicação e abertura de chamados para técnicos de campo.

O Starnet transformou esse processo em um fluxo mais automatizado e padronizado.

---

## 💡 Solução

O sistema permite que o operador selecione as características e configurações necessárias por meio da interface da aplicação.

A partir dessas escolhas, o Starnet:

```text
Usuário
   │
   ▼
Seleciona as configurações necessárias
   │
   ▼
Starnet interpreta as opções
   │
   ▼
Geração automática do script
   │
   ▼
Configuração / validação do roteador
   │
   ▼
Testes remotos via SNMP
   │
   ▼
Diagnóstico

```

Dessa forma, o usuário deixou de precisar montar manualmente cada script com base em planilhas e passou a utilizar um processo padronizado e automatizado.

---

## ⚙️ Principais funcionalidades

### 🔧 Geração automática de scripts

Uma das principais funcionalidades do Starnet é a geração automática dos scripts utilizados para configuração dos roteadores.

Em vez de criar manualmente cada script utilizando planilhas e informações espalhadas, o operador seleciona as opções necessárias diretamente na aplicação.

O sistema utiliza essas escolhas para gerar automaticamente o conteúdo correspondente.

Isso possibilitou:

- Redução de tarefas repetitivas;
- Padronização das configurações;
- Diminuição de erros manuais;
- Maior velocidade no atendimento;
- Facilidade para operadores sem necessidade de montar scripts manualmente.

---

### 🌐 Configuração remota de roteadores

O Starnet foi desenvolvido para auxiliar na configuração remota de roteadores presentes em diferentes localidades do Brasil.

A aplicação centraliza as informações necessárias para o processo e permite que a equipe responsável conduza as etapas remotamente.

---

### 📡 Testes via SNMP

O sistema também realiza **testes remotos utilizando SNMP**, permitindo consultar informações do equipamento e verificar o comportamento do roteador sem a necessidade de acesso físico imediato ao local.

Essa capacidade foi importante para apoiar o diagnóstico remoto e identificar situações que poderiam exigir atuação de um técnico em campo.

---

### 👨‍🔧 Suporte aos técnicos de campo

Quando uma atividade dependia de intervenção presencial, o sistema também auxiliava no processo de atendimento dos técnicos de campo.

O Starnet permitia a **abertura de fichas de chamado**, concentrando as informações necessárias para direcionar a atividade.

Isso ajudou a conectar o processo de diagnóstico remoto com a execução presencial.

---

## 🔄 Antes x Depois

### Antes do Starnet

```text
Planilha
   ↓
Interpretar informações
   ↓
Criar script manualmente
   ↓
Revisar configuração
   ↓
Executar testes
   ↓
Identificar necessidade de campo
   ↓
Abrir chamado
```

### Com o Starnet

```text
Selecionar opções
   ↓
Script gerado automaticamente
   ↓
Testes remotos via SNMP
   ↓
Diagnóstico
```

O resultado foi um processo mais rápido, padronizado e menos dependente de atividades manuais.

---

## 📈 Impacto na operação

O desenvolvimento do Starnet trouxe um impacto direto no processo operacional.

### ⏱️ Redução de mais de 50% no tempo de atendimento

A automação da criação dos scripts e a centralização das atividades reduziram significativamente o tempo necessário para realizar os atendimentos.

Além da economia de tempo, a solução também contribuiu para:

- Redução de tarefas manuais;
- Maior padronização;
- Menor dependência de planilhas;
- Redução da possibilidade de erros durante a preparação dos scripts;
- Agilidade no diagnóstico remoto;
- Melhor organização do atendimento de campo.

---

## 🧠 Desafio

O principal desafio do projeto era transformar um processo operacional que dependia de **informações espalhadas e criação manual de scripts** em uma ferramenta capaz de gerar essas configurações automaticamente.

Cada atendimento poderia exigir diferentes combinações de configurações.

A solução adotada foi transformar essas possibilidades em opções dentro da própria aplicação.

Em vez de o operador precisar saber exatamente como montar cada script, ele apenas selecionava as configurações necessárias.

O sistema ficava responsável por interpretar essas escolhas e montar o resultado correspondente.

---

## 🏗️ Desenvolvimento

O Starnet foi desenvolvido **individualmente**, desde a concepção da solução até sua implementação.

O projeto envolveu principalmente:

- Análise do processo operacional;
- Identificação de tarefas repetitivas;
- Modelagem da lógica necessária para geração dos scripts;
- Desenvolvimento da interface;
- Automação do processo de configuração;
- Implementação dos testes remotos;
- Integração do diagnóstico com o fluxo de atendimento;
- Criação do fluxo de abertura de chamados;
- Validação da solução no processo operacional.

---

## 📚 Aprendizados

O desenvolvimento do Starnet proporcionou experiência prática principalmente em:

**Automação de processos**

Transformação de atividades manuais em fluxos automatizados e padronizados.

**Integração com infraestrutura de redes**

Interação com equipamentos de rede e realização de diagnósticos remotos utilizando SNMP.

**Desenvolvimento de sistemas para operações reais**

Construção de uma solução orientada a uma necessidade operacional real, considerando velocidade, confiabilidade e facilidade de utilização.

**Análise de processos**

Identificação de gargalos e oportunidades de automação dentro de um fluxo de trabalho existente.

**Resolução de problemas**

Desenvolvimento de uma solução própria para substituir um processo baseado em planilhas e atividades manuais.

---

## 🛠️ Tecnologias e componentes

O projeto utiliza tecnologias voltadas para desenvolvimento web, automação e comunicação com infraestrutura de rede.

Entre os principais componentes envolvidos estão:

- Aplicação web;
- Automação de geração de scripts;
- Comunicação via SNMP;
- Processamento de dados de configuração;
- Interface para seleção de parâmetros;
- Sistema de abertura de chamados.

> Detalhes específicos de infraestrutura, endpoints, credenciais, endereços de equipamentos e demais informações operacionais não são disponibilizados neste repositório por questões de segurança e confidencialidade.

---

## 🌎 Contexto do projeto

O Starnet foi desenvolvido para uma operação com equipamentos distribuídos **por todo o Brasil**, onde a velocidade no atendimento e a capacidade de realizar diagnósticos remotamente eram fatores importantes.

A possibilidade de automatizar a preparação das configurações e realizar testes remotamente permitiu reduzir a necessidade de atividades manuais e tornar o processo de atendimento mais eficiente.

---

## 👨‍💻 Desenvolvimento

**Desenvolvimento individual**

O sistema foi idealizado e desenvolvido por um único desenvolvedor, incluindo a construção da solução, implementação da automação e adequação do fluxo às necessidades da operação.

---

## 📈 Evolução

O conceito desenvolvido no Starnet demonstra como processos operacionais repetitivos podem ser transformados em ferramentas de automação.

A ideia central do projeto foi substituir um fluxo baseado em:

> **Planilhas + processos manuais + criação manual de scripts**

por:

> **Interface + automação + diagnóstico remoto + atendimento estruturado**

Essa abordagem permitiu entregar uma solução mais rápida, padronizada e escalável para a operação.

---

## ⭐ Destaques do projeto

| Indicador | Resultado |
|---|---|
| Desenvolvimento | Individual |
| Abrangência | Brasil |
| Configuração | Remota |
| Diagnóstico | SNMP |
| Geração de scripts | Automatizada |
| Suporte de campo | Integrado ao fluxo |
| Redução no tempo de atendimento | **Mais de 50%** |

---

<p align="center">
  Desenvolvido com foco em <strong>automação, eficiência e solução de problemas reais</strong>.
</p>