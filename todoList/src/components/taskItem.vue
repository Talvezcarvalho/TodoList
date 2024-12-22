<script setup>
import { ref } from 'vue'
import CheckedIcon from './icons/checkedIcon.vue'
import DeleteIcon from './icons/deleteIcon.vue'
import EditIcon from './icons/editIcon.vue'

const props = defineProps({
  task: {
    type: Object,
    required: true,
  },
})

const emit = defineEmits('deleteTask', 'saveEdit', 'enableEdit', 'concludeTask')

const newTask = ref(props.task.title)

const isDisabled = ref(true)

const deleteTask = () => {}

const saveEdit = () => {
  isDisabled.value = !isDisabled.value
  console.log(newTask)
}
const enableEdit = () => {
  isDisabled.value = !isDisabled.value
  console.log(newTask)
}

const concludeTask = () => {
  console.log('Task concluded')
}
</script>

<template>
  <div class="row q-pa-xs listItem">
    <q-input
      filled
      outlined
      v-model="newTask"
      :placeholder="task.name"
      :disable="isDisabled"
      class="col custom-placeholder"
    />

    <div class="q-gutter-sm" style="display: flex; align-items: stretch">
      <q-btn
        v-if="isDisabled"
        square
        @click="enableEdit"
        padding="none md"
        class="botao"
        color="primary"
      >
        <EditIcon />
      </q-btn>
      <q-btn v-else square @click="saveEdit" padding="none md" class="botao" color="primary">
        Save Edit
      </q-btn>

      <!-- Botão Excluir -->
      <q-btn square @click="deleteTask" padding="none md" class="botao" color="negative">
        <DeleteIcon />
      </q-btn>
      <!-- Botão Concluir -->
      <q-btn square @click="concludeTask" padding="none md" class="botao" color="green">
        <CheckedIcon />
      </q-btn>
    </div>
  </div>
</template>

<style scoped>
.listItem {
  width: 70vw;
}

.custom-placeholder ::placeholder {
  font-weight: bold;
}
</style>
