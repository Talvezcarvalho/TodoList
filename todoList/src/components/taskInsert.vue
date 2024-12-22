<script setup>
import { ref } from 'vue'

const emit = defineEmits('insert-Task')

const newTask = ref('')

const insertTask = () => {
  if (newTask.value.trim() === '') {
    return
  }
  const task = {
    title: newTask.value,
    done: false,
  }
  emit('insert-Task', task)
  newTask.value = ''
}
</script>

<template>
  <div class="row q-pa-md">
    <q-input
      filled=""
      outlined=""
      v-model="newTask"
      placeholder="Adicionar nova tarefa...."
      class="col custom-outlined custom-placeholder"
    />
    <q-btn
      @click="insertTask"
      padding="none lg"
      color="primary"
      text-color="white"
      label="+"
      class="custom-btn"
    />
  </div>
</template>
<style scoped>
.custom-placeholder ::placeholder {
  font-weight: bold;
  font-size: 1.5em;
}

.custom-outlined {
  padding-right: 0 !important;
}

.custom-btn {
  border-radius: 0 3px 3px 0;
  font-size: 2em;
  box-shadow: none !important;
  margin-left: -1px;
}
</style>
