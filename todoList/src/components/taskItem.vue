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

const emit = defineEmits('delete-Task', 'save-Edit', 'enableEdit', 'changeStatus-Task')

const Task = ref(props.task.title)

const isConcluded = ref(props.task.done)

const isDisabled = ref(true)

const deleteTask = () => {
  emit('deleteTask', props.task.id)
}

const saveEdit = () => {
  const updateTask = {
    id: props.task.id,
    title: Task.value,
    done: props.task.done,
  }

  isDisabled.value = !isDisabled.value
  emit('save-Edit', updateTask)
}
const enableEdit = () => {
  isDisabled.value = !isDisabled.value
  console.log(Task)
}

const changeStatusTask = () => {
  emit('changeStatus-Task', props.task.id)
}
</script>

<template>
  <div class="row q-pa-xs listItem">
    <q-input
      filled
      outlined
      v-model="Task"
      :placeholder="task.name"
      :disable="isDisabled"
      class="col custom-placeholder"
    />

    <div class="q-gutter-sm" style="display: flex; align-items: stretch">
      <q-btn
        v-if="isDisabled && !isConcluded"
        square
        @click="enableEdit"
        padding="none md"
        class="botao"
        color="primary"
      >
        <EditIcon />
      </q-btn>
      <q-btn
        v-else-if="!isConcluded"
        square
        @click="saveEdit"
        padding="none md"
        class="botao"
        color="primary"
      >
        Save Edit
      </q-btn>

      <q-btn
        v-else
        square
        @click="changeStatusTask"
        padding="none md"
        class="botao"
        color="warning"
      >
        Return
      </q-btn>
      <q-btn
        v-if="!isConcluded"
        square
        @click="deleteTask"
        padding="none md"
        class="botao"
        color="negative"
      >
        <DeleteIcon />
      </q-btn>
      <q-btn
        v-if="!isConcluded"
        square
        @click="changeStatusTask"
        padding="none md"
        class="botao"
        color="green"
      >
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
