<template>
  <div ref="chatContainer" class="chat-container" @scroll="handleScroll">
    <div v-if="isLoading" class="loading-indicator">Carregando mensagens...</div>

    <div v-for="message in messages" :key="message.id" class="message">
      <div class="message-content">
        <p>{{ message.content }}</p>
        <small>{{ message.id }}</small>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: [],        // Armazena as mensagens carregadas
      currentPage: 1,      // Página atual
      totalPages: 0,       // Total de páginas
      isLoading: false,    // Flag para evitar múltiplas requisições
    };
  },
  async mounted() {
    await this.fetchMessages(); // Carrega as primeiras mensagens
    this.scrollToBottom();      // Mantém o scroll no fundo ao iniciar
  },
  methods: {
    async fetchMessages() {
      if (this.isLoading || (this.totalPages && this.currentPage > this.totalPages)) return;

      this.isLoading = true;
      try {
        // Requisição à API com paginação
        const response = await fetch(`/api/messages?per_page=5&page=${this.currentPage}`);
        const data = await response.json();

        // Inserir as novas mensagens no início do array
        this.messages = [...data.data.reverse(), ...this.messages];
        this.totalPages = data.last_page;   // Atualiza o total de páginas
        this.currentPage++;                 // Próxima página a ser carregada
        
        // Se for a primeira carga, mantém o scroll no fundo
        if (this.currentPage === 2) {
          this.scrollToBottom();
        }
      } catch (error) {
        console.error("Erro ao buscar mensagens:", error);
      } finally {
        this.isLoading = false;
      }
    },
    scrollToBottom() {
      this.$nextTick(() => {
        const chatContainer = this.$refs.chatContainer;
        chatContainer.scrollTop = chatContainer.scrollHeight;
      });
    },
    async handleScroll() {
      const chatContainer = this.$refs.chatContainer;

      // Carrega mais mensagens se o usuário rolar para o topo
      if (chatContainer.scrollTop === 0 && !this.isLoading) {
        const prevHeight = chatContainer.scrollHeight;
        await this.fetchMessages();
        this.$nextTick(() => {
          chatContainer.scrollTop = chatContainer.scrollHeight - prevHeight;
        });
      }
    }
  }
};
</script>

<style scoped>
.chat-container {
  height: 400px;
  overflow-y: auto;
  border: 1px solid #ccc;
  padding: 10px;
}

.message {
  margin-bottom: 1em;
  padding: 1em;
  border-radius: 5px;
  background-color: #f1f1f1;
}

.loading-indicator {
  text-align: center;
  font-weight: bold;
  margin-bottom: 10px;
  color: #999;
}
</style>
