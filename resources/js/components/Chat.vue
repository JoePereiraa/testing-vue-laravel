<template>
    <div class="chat-container" @scroll.passive="handleScroll" ref="chatContainer">
      <div v-for="message in visibleMessages" :key="message.id" class="message">
        <Card :content="message.content" />
      </div>
    </div>
  </template>
  
  <script>
  import Card from './Drag/Card.vue';
  
  export default {
    components: {
      Card,
    },
    props: {
      initialMessages: {
        type: Array,
        required: true,
      },
      totalMessages: {
        type: Number,
        required: true,
      },
      perPage: {
        type: Number,
        default: 10,
      }
    },
    data() {
      return {
        messages: this.initialMessages,
        page: 1,
        isLoading: false,
      };
    },
    computed: {
      visibleMessages() {
        return this.messages.slice(-this.perPage);
      },
    },
    methods: {
      async loadMoreMessages() {
        if (this.isLoading) return;
  
        this.isLoading = true;
        this.page += 1;
  
        try {
          const response = await fetch(`/api/messages?page=${this.page}`);
          const newMessages = await response.json();
  
          this.messages.unshift(...newMessages);
        } finally {
          this.isLoading = false;
        }
      },
      handleScroll() {
        const { scrollTop } = this.$refs.chatContainer;
  
        if (scrollTop === 0 && this.messages.length < this.totalMessages) {
          this.loadMoreMessages();
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .chat-container {
    height: 500px;
    overflow-y: auto;
    display: flex;
    flex-direction: column-reverse;
  }
  .message {
    margin-bottom: 8px;
  }
  </style>
  