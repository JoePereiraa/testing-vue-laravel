<template>
    <div class="column">
      <h2>{{ title }}</h2>
      <slot></slot>
    </div>
</template>
<script>
  export default {
    props: {
      title: {
        type: String,
        required: true
      }
    }
  }
</script>
  <style scoped>
    .column {
        border: 1px solid #ddd;
        padding: 16px;
        margin: 8px;
        border-radius: 4px;
        width: 250px;
        min-height: 300px;
    }
  </style>