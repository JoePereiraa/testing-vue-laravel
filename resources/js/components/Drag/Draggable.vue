<template>
  <draggable 
    class="drag"
    @change="onDrag"
    :animation="200"
    :disabled="isDisabled"
    :group="dragGroup"
    @start="onDragStart"
    @end="onDragEnd"
  >
    <slot></slot>
  </draggable>
</template>

<script>
  import { defineComponent } from 'vue';
  import { VueDraggableNext } from 'vue-draggable-next';
  
  export default defineComponent({
    components: {
      draggable: VueDraggableNext,
    },
    props: {
      items: {
        type: Array,
        required: true
      },
      group: {
        type: Object,
        default: () => ({ name: '', put: false, pull: false })
      },
      disabled: {
        type: Boolean,
        default: false
      }
    },
    computed: {
      isDisabled() {
        return this.disabled;
      },
      dragGroup() {
        // Usa os props `group` e as permissões para definir o grupo de arraste
        console.log(this.group.name)
        return {
          name: this.group.name,
          put: this.group.put,
          pull: this.group.pull
        };
      }
    },
    methods: {
      onDrag(event) {
        if (!this.isDisabled) {
          console.log('Items after drag:', this.items);
          this.$emit('update:items', this.items);
        }
      },
      onDragStart(event) {
        if (this.isDisabled) {
          event.preventDefault();
        }
      },
      onDragEnd(event) {
        // Handle drag end if needed
      }
    },
  })
</script>

<style>
  .drag {
    cursor: grab;
  }
</style>